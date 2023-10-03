<?php
include($_SERVER['DOCUMENT_ROOT'] . "/params.php");
$title = "Résultat de recherche";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function handle_form($type): void
{
    switch($type) {
        case "magie" : print_recherche_magie(); break;
    }
}

function calc_DC($formula,$iterations)
{
    if(str_contains($formula,"+")) {
        $parts1 = explode("+", $formula);
        $a = intval($parts1[0]);
        $parts2 = explode("X", $parts1[1]);
        $b = intval($parts2[0]);
        for ($i = 0; $i < $iterations; $i++) {
            $res[$i] = $a + $b * $i;
        }
        return $res;
    }
    return [$formula];
}

function calc_mag($formula,$iterations)
{
    $time_scale = ["un round", "une minute", "une heure", "une journée", "une semaine", "un mois", "une année", "une décennie", "un siècle", "un millénaire", "permanent"];
    $dist_scale = ["10 mètres", "100 mètres", "1 km", "10 km", "100 km", "1 000 km", "10 000 km", "100 000 km", "1 000 000 km"];
    $dice_scale = ["d2", "d4", "d6", "d8", "d10", "d12", "d12+1", "d12+2",  "d12+3",  "d12+4",  "d12+5"];
    $gabarit_scale = ["I", "Min", "TP", "P", "M", "G", "TG", "Gig", "Col"];
    $exprs = explode("&& ",$formula);
    //res devient un tableau de tableau, l'affichage de la magnitude fait une boucle $iterations sur chaque case de res
    $y=0;
    foreach ($exprs as $expr){
        $types = explode(" ",$expr);
        $type = $types[0];
        $mag = trim(substr($expr,strlen($type)+1));
        switch ($type)
        {
            case "Dice_scale" :
            {
                $mag_index = array_search($mag, $dice_scale);
                for($i=0;$i<$iterations;$i++)
                {
                    $res[$y][$i]= $dice_scale[$mag_index+$i];
                }
                break;
            }

            case "Dice_nb" :
            {
                $mag_parts = explode("d",$mag);
                $nb_dices_start = $mag_parts[0];
                $rest_mag = substr($mag,strlen($nb_dices_start)+1);
                for($i=0;$i<$iterations;$i++)
                {
                    $res[$y][$i]= intval($nb_dices_start)+$i . "d" . $rest_mag;
                }
                break;
            }

            case "Time" :
            {
                $mag_index = array_search($mag, $time_scale);
                for($i=0;$i<$iterations;$i++)
                {
                    $res[$y][$i]= $time_scale[$mag_index+$i];
                }
                break;
            }

            case "Distance" :
            {
                $mag_index = array_search($mag, $dist_scale);
                for($i=0;$i<$iterations;$i++)
                {
                    $res[$y][$i]= $dist_scale[$mag_index+$i];
                }
                break;
            }

            case "Gabarit" :
            {
                $mag_index = array_search($mag, $gabarit_scale);
                for($i=0;$i<$iterations;$i++)
                {
                    if($mag_index+$i>8){
                        $res[$y][$i]= $gabarit_scale[8];
                    }
                    else
                        $res[$y][$i]= $gabarit_scale[$mag_index+$i];
                }
                break;
            }

            case "AD" :
            {
                if(substr($mag, 0,1) == "+") {
                    for ($i = 0; $i < $iterations; $i++) {
                        $nb_ad = intval($mag) + $i;
                        if($nb_ad==1)
                            $d = " avantage";
                        else
                            $d = " avantages";
                        $res[$y][$i] = "+" . $nb_ad . $d;
                    }
                    break;
                }
                if(substr($mag, 0,1) == "-") {
                    if ($mag == "-0")
                    {
                        $mag="0";
                    }

                    for ($i = 0; $i < $iterations; $i++) {
                        $nb_ad = intval($mag) - $i;
                        if($nb_ad==-1)
                            $d = " désavantage";
                        else
                            $d = " désavantages";
                        $res[$y][$i] = $nb_ad . $d;
                    }
                    break;
                }
            }

            case "Formula" :
            {
                $res[$y] = calc_DC($mag,$iterations);
                break;
            }

            case "Double" :
            {
                for($i=0;$i<$iterations;$i++)
                {
                    $res[$y][$i]= $mag*pow(2,$i);
                }
                break;
            }

            default :
            {
                for ($i = 0; $i < $iterations; $i++) {
                    $res[$y][$i] = $mag;
                };
                break;
            }
        }
        $y++;
    }

    return $res;
}

function print_recherche_magie(): void
{
    global $db;
    $nb_cercle = 8;

    $query = "SELECT * FROM sorts WHERE";
    $params = [];

    if(!empty($_GET["nom"])) {
        $nom = test_input($_GET["nom"]);
        $query .= " Effet LIKE :effet AND";
        $params['effet'] = '%'.$nom.'%';
    }

    if(!empty($_GET["desc"])) {
        $desc = test_input($_GET["desc"]);
        $query .= " Description LIKE :desc AND";
        $params['desc'] = '%'.$desc.'%';
    }

    if(!empty($_GET["prop"])) {
        $prop = test_input($_GET["prop"]);
        $query .= " Propriete LIKE :prop AND";
        $params['prop'] = '%'.$prop.'%';
    }

    $ecole = test_input($_GET["ecole"]);
    if(!($ecole == "all")) {
        $query .= " Ecole LIKE :ecole AND";
        $params['ecole'] = '%'.$ecole.'%';
    }

    $inkarnai = test_input($_GET["inkarnai"]);
    if(!($inkarnai == "all")) {
        $query .= " Inkarnai LIKE :ink AND";
        $params['ink'] = '%'.$inkarnai.'%';
    }

    if(str_ends_with($query,"WHERE")) {
        $query = substr($query,0,strlen($query)-5);
    }

    if(str_ends_with($query,"AND")) {
        $query = substr($query,0,strlen($query)-3);
    }

    $query .= " ORDER BY substring(Effet,1,4), DC";

    $smt = $db->prepare("$query");
    $smt->execute($params);
    $rows = $smt->fetchAll();
    ?>
    <div id="<?= 'effets_' . $ecole ?>">

        <?php foreach ($rows as $row) : ?>
            <div class="effet_magique boxed">
                <h3><?= $row['Effet'] ?> - <?= $row['Ecole']?></h3>
                <p><strong><?= $row["Propriete"] ?></strong></p>
                <table class="table_DC_mag">
                    <tbody>
                    <tr>
                        <th>Cercle du sort</th>
                        <?php
                        for($i=0;$i<$nb_cercle;$i++) {
                            $e = $i+1;
                            echo "<th>" . $e . "</th>";
                        }
                        ?>
                    </tr>
                    <tr>
                        <th>DC</th>
                        <?php
                        $DCs = calc_DC($row['DC'],$nb_cercle);
                        foreach ($DCs as $DC)
                            echo "<td>" . $DC . "</td>";
                        ?>
                    </tr>
                    <tr>
                        <th>Magnitude</th>
                        <?php
                        $mags = calc_mag($row['Magnitude'],$nb_cercle);

                        for($y=0; $y<$nb_cercle; $y++){
                            echo "<td>";
                            for($i=0; $i<sizeof($mags); $i++){
                                if($i>0){
                                    echo "<hr/>";
                                }
                                echo $mags[$i][$y];
                            }
                            echo "</td>";
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
                <p><?= $row["Description"] ?></p>
                <p><?= $row["Inkarnai"] ?></p>
            </div>
        <?php endforeach ?>
    </div>
    <?php
}
?>

<h1>Résultat de recherche</h1>
<?php
    handle_form($_GET["type"]);
?>


<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");
