<?php
include($_SERVER['DOCUMENT_ROOT'] . "/params.php");
$title = "Magie";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
$time_scale = ["un round", "une minute", "une heure", "une journée", "une semaine", "un mois", "une année", "une décennie", "un siècle", "un millénaire", "permanent"];
$dist_scale = ["10 mètres", "100 mètres", "1 km", "10 km", "100 km", "1 000 km", "10 000 km", "100 000 km", "1 000 000 km"];
$dice_scale = ["d2", "d4", "d6", "d8", "d10", "d12", "d12+1", "d12+2",  "d12+3",  "d12+4",  "d12+5"];
$gabarit_scale = ["I", "Min", "TP", "P", "M", "G", "TG", "Gig", "Col"];
$nb_cercle = 8;

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
    global $time_scale;
    global $dice_scale;
    global $dist_scale;
    global $gabarit_scale;
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


function print_effets($ecole): void
{
    global $db;
    global $nb_cercle;
    $smt = $db->prepare("SELECT * FROM sorts WHERE Ecole = :e ORDER BY substring(Effet,1,4), DC");
    $smt->execute(['e' => $ecole]);
    $rows = $smt->fetchAll();
    ?>
    <div id="<?= 'effets_' . $ecole ?>">

        <?php foreach ($rows as $row) : ?>
        <div class="effet_magique boxed">
            <h3 id="<?= 'Effet_' .$row['Id'] ?>"><?= $row['Effet'] ?></h3>
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
    <h1 id="Magie" onclick="hideContent(this)">Magie</h1>
    <div>
        <h3>Origines de la Magie</h3>
        <p>La magie est apparu en Ogma suite au Grand Cataclysme, l'impact météoritique a créé un lien entre deux plans de l'existence, reliant ainsi le monde d'Ogma et celui de Karnaï. Le cratère d'impact, où se situe Jikaï la capitale Sihir, est la source de toute la magie d'Ogma.</p>

        <h3>Usage de la Magie en Ogma</h3>
        <p>L'utilisation de la magie requiert de plonger son esprit dans la dimension de Karnaï. Cet espace fait de psy pure est difficile d'accès, il faut être déterminé pour y pénétrer et parvenir à l'exploiter. Cette dimension est organisée en anneaux concentriques appelés Cercles de Puissance. Le premier cercle représente la frontière entre le plan matériel et le plan de Karnaï, c'est le plus proche et de ce fait le plus facile d'accès. Plus on franchit de cercles, plus on s'enfonce dans la dimension de Karnaï et plus la magie est puissante et indomptable.</p>
        <p>Toute entité suffisamment intelligente pour penser peut avoir recours à la magie dans ses cercles les plus inférieurs. Les sorts des premiers cercles sont utilisables par n'importe quel individu intelligent, pour pénétrer les cercles supérieurs il est nécessaire d'étudier les écoles ou les domaines de magie.</p>
        <p>Utiliser la magie revient à se rendre mentalement dans le domaine d'un Inkarnaï, d'y façonner sa création puis de la ramener dans le plan d'Ogma via sa force psychique. Le type de sort dépend du domaine d'où l'on puise sa création.</p>
        <p>La plupart des habitants d'Ogma sont capables d'utiliser la magie pour leurs besoins quotidiens, ils peuvent allumer un feu en imaginant une petite flamme à l'intérieur ou de souffler une bougie avec une légère brise.</p>
        <p>Les Sarpas utilisent constamment la magie pour produire de la chaleur s'ils ne peuvent pas profiter de celle des astres. On raconte que les plus éminents Sihir étaient capables de se déplacer instantanément sur de très longues distances grâce à la magie, mais ce ne sont que des légendes.</p>
        <p>Les utilisateurs plus confirmés peuvent également transmettre des messages via la magie, ainsi la transmission de messages en Ogma est très rapide. Il est même possible de recevoir un message sans avoir aucune formation avec la magie, il suffit à l'expéditeur de connaître le destinataire.</p>
        <p>Un sort peut être travaillé pendant longtemps pour produire des effets plus durables et puissants, un tel sort est appelé un rituel. Plus un rituel est long, plus les effets du sort seront marquants.</p>

        <h3>Règles concernant l'utilisation de la magie</h3>
        <p>L'usage de la magie requiert de la force mentale, quiconque s'essaye à des créations trop imposantes pour son esprit s'expose à des risques pour son enveloppe physique.</p>
        <p>La caractéristique utilisée pour lancer des sorts est la Volonté, selon l'effet ou le domaine du sort, des bonus liés aux compétences et/ou aux spécialisations peuvent s'appliquer.</p>
        <p>Si l'incantation d'un sort est une réussite (DR>=0) alors les effets du sort se matérialisent dans le monde. Si l'incantation est échoué de justesse (0>DR>=-2) alors le sort ne parvient pas à se matérialiser et rien ne se passe. Si l'incantation est ratée (DR<-3) alors le lanceur subit un trauma mental dû au contrecoup magique. </p>
        <p>Dans le cas d'un sort lancé au-delà du cercle de base, si l'incantation est un échec pour le DC visé par le lanceur mais que son jet est suffisamment bon pour que le sort se réalise à un cercle plus modeste, alors le sort se réalise quand même au mieux que le permet le résultat du lanceur mais il subit un trauma mental.</p>
        <p>Éviter un sort ou résister à ses effets peut nécessiter un test. Le test à effectuer et ses conditions sont dépendants de l'effet et sont donc précisés pour chaque sort. Dans le cas d'un test étendu, chaque échec octroie un avantage supplémentaire pour les prochaines tentatives. En situation de combat il est possible de progresser dans ce test étendu dès que l'on subit le sort en dépensant sa réaction, si cela n'a pas suffi, il est possible de dépenser son action ou sa réaction lors de son tour.</p>

        <h3 onclick="hideContent(this)">Règles de créations des sorts</h3>
        <div>
            <p>Un sort est défini par une forme et un effet choisis par le lanceur, c'est la somme de la difficulté de la forme et de l'effet qui déterminent la difficulté (DC) du sort. Le DC détermine alors le cercle du sort, par exemple un sort avec un DC de 7 sera un sort du septième cercle.</p>
            <p>Un sort peut posséder plusieurs propriétés :</p>
            <ul id="proprietes_sorts">
                <li><span class="big_underline">Zone :</span>Le sort affecte toutes les cibles de la zone.</li>
                <li><span class="big_underline">Direct :</span>Le sort n'a pas de temps de trajet et apparait directement sur la cible qui n'a donc pas le temps de réagir aux effets du sort à moins de connaitre le sort en passant un test d'Arcanes(Int) avec un DC équivalent au DR du lanceur.</li>
                <li><span class="big_underline">Réaction :</span>Le sort peut être lancé en tant que <a href="Combat.php#reactions">réaction</a>.</li>
                <li><span class="big_underline">Concentration :</span>Le sort peut être maintenu par son lanceur. Il n'est possible de se concentrer que sur un seul sort, si le lanceur subit des dégâts, il doit passer un test de Vigueur ou de Volonté avec un DC équivalent aux dégâts subis.</li>
                <li><span class="big_underline">[Variation] :</span>Le sort possède plusieurs variations, chacune correspondantes à un mot-clé cité.</li>
            </ul>
            <h4 id="forme_sort" onclick="hideContent(this)">Forme des sorts</h4>
            <div>
                <p>La forme d'un sort définie la portée, la façon dont le sort est lancé et potentiellement le nombre de cibles.</p>
                <table id="table_forme_sort">
                    <tbody>
                    <tr>
                        <th>Forme</th>
                        <th>Propriété(s)</th>
                        <th>Difficulté (DC)</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>Soi</td>
                        <td>-</td>
                        <td>0</td>
                        <td>Affecte le lanceur</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>-</td>
                        <td>0</td>
                        <td>Affecte une seule cible située à 1 mètre ou moins du lanceur</td>
                    </tr>
                    <tr>
                        <td>Flèche</td>
                        <td>-</td>
                        <td>1</td>
                        <td>Affecte une seule cible située à 100 mètres ou moins du lanceur</td>
                    </tr>
                    <tr>
                        <td>Cible</td>
                        <td>Direct</td>
                        <td>1</td>
                        <td>Affecte une seule cible située à 50 mètres ou moins du lanceur</td>
                    </tr>
                    <tr>
                        <td>Orbe</td>
                        <td>Zone</td>
                        <td>3</td>
                        <td>Affecte toutes les cibles situées dans une sphère de 5m de rayon. Le point d'impact doit être situé à 100m ou moins du lanceur.</td>
                    </tr>
                    <tr>
                        <td>Aura</td>
                        <td>Concentration, Zone</td>
                        <td>3</td>
                        <td>Affecte toutes les entités situées à 5 mètres ou moins de la cible à la fin de son round. La cible doit être située à 50 mètres ou moins du lanceur. Le lanceur peut choisir d'être la cible du sort.</td>
                    </tr>
                    <tr>
                        <td>Cône</td>
                        <td>Zone</td>
                        <td>3</td>
                        <td>Affecte toutes les cibles situées dans un cône de 10 mètres de long partant du lanceur, l'angle du cône est au choix du lanceur mais ne peut dépasser les 90°.</td>
                    </tr>
                    <tr>
                        <td>Rayon</td>
                        <td>Zone</td>
                        <td>3</td>
                        <td>Affecte toutes les cibles situées sur une ligne d'un mètre de large et de 10 mètres de long partant du lanceur.</td>
                    </tr>
                    <tr>
                        <td>Mur</td>
                        <td>Concentration, Direct, Zone</td>
                        <td>3</td>
                        <td>Crée une zone de 5 mètres carrés à moins de 50m du lanceur.</td>
                    </tr>
                    <tr>
                        <td>Tempête</td>
                        <td>Concentration, Direct, Zone</td>
                        <td>3</td>
                        <td>Affecte toutes les cibles situées dans une sphère de 5m de rayon. Le point d'apparition doit être situé à 50m ou moins du lanceur. Le lanceur peut déplacer la tempête une fois par round en repassant le test qu'il a effectué pour la faire apparaitre, s'il réussit la tempête se déplace sur une distance équivalente à son DR en mètre, s'il échoue la tempête reste statique.</td>
                    </tr>
                    <tr>
                        <td>Rune</td>
                        <td>Zone</td>
                        <td>3</td>
                        <td>Le sort se place sur une surface située à moins de 10 mètres du lanceur. Après un round, détecter la rune se fait avec 2 désavantages. Le lanceur choisi les conditions d'activation de la rune (proximité, temps, contrôle manuel). La rune persiste indéfiniment jusqu'à son déclenchement ou sa désactivation. Lorsque la rune explose, elle affecte toutes les cibles situées dans une sphère de 5 mètres de rayon.</td>
                    </tr>
                    </tbody>
                </table>
                <p>Une même forme peut être sélectionnées plusieurs fois pour doubler sa portée et/ou zone d'effet. Par exemple sélectionner 2 fois la forme Flèche augmente la portée à 200m mais augmente le DC à 2, si on la sélectionne 3 fois la portée passe à 400m et le DC à 3.</p>
                <p>Si la cible est consciente d'être la cible d'un sort n'infligeant pas de dégâts, elle peut en réduire ses effets voire de les négliger entièrement en passant un test d'Esquive(Agi) ou un blocage au bouclier Style de Combat(For) avec un DC équivalent au résultat du lanceur. Chaque palier de 3 DR diminue les effets du sort d'un cercle.</p>
                <p>Les sorts infligeant des dégâts sont traités comme des passes d'armes entre le lanceur de sort et la cible. L'attaque du lanceur de sort sera traité comme une arme de mêlée ou à distance selon la forme choisie. Le DC du sort lancé n'est utilisé que pour savoir si le sort réussi ou non, le DR du lanceur lors de la passe d'armes dépend du résultat de son adversaire.</p>
            </div>
            <h4 id="effet_sort" onclick="hideContent(this)">Effet des sorts</h4>
            <div>
                <p>L'effet d'un sort détermine le contenu d'un sort, quel va être son impact dans le monde, un effet de feu brûlera ses cibles tandis qu'un effet de soin guérira leurs blessures.</p>
                <p>La liste ci-dessous n'est pas exhaustive des pouvoirs conférés par les <a href="../World/Histoire_Ogma.php#inkarnai">Inkarnaïs</a>.</p>
                <p>Les tableau ci-dessous fonctionnent de la façon suivante :</p>
                <div class="effet_magique boxed">
                    <p><strong>Effet :</strong> Le nom de l'effet du sort.</p>
                    <p><strong>Propriété(s) :</strong> Les différentes <a href="Magie.php#proprietes_sorts">propriétés</a> de l'effet.</p>
                    <table class="table_DC_mag">
                        <tbody>
                        <tr>
                            <th>Cercle du sort</th>
                            <td>Indique le cercle auquel le cercle est lancé</td>
                        </tr>
                        <tr>
                            <th>DC</th>
                            <td>Indique le DC selon le cercle</td>
                        </tr>
                        <tr>
                            <th>Magnitude</th>
                            <td>Indique la magnitude des effets selon le cercle</td>
                        </tr>
                        </tbody>
                    </table>
                    <p><strong>Description :</strong> Explication des règles relatives à cet effet.</p>
                    <p><strong>Inkarnaï :</strong> Indique de quel domaine provient cet effet, utile pour les spécialisations dans les <a href="../World/Histoire_Ogma.php#inkarnai">domaines de Karnaï</a>. Cette donnée n'est pas forcément exhaustive, avec un peu d'imagination, d'autres inkarnaï peuvent conférer les mêmes effets</p>
                </div>
                <h3 id="rituels" onclick="hideContent(this)">Rituels</h3>
                <div>
                    <p>Un sort se lance en une seule action ce qui limite le temps de création pour son lanceur. Si l'on souhaite lancer un sort plus puissant ou assurer l'incantation, il est possible de se concentrer plus longtemps sur son sort et faire un rituel d'incantation.</p>
                    <p>Le rituel consiste à prolonger l'incantation aussi longtemps que le lanceur le souhaite. Lors du début du rituel et à chaque palier de temps franchi, le lanceur peut relancer l'épreuve d'incantation et l'ajouter aux lancers précédents. Les paliers de temps d'incantation sont les suivants : 1 min &#8594; 10 min &#8594; 1 heure &#8594; 8 heures &#8594; 1 jour &#8594; 1 semaine &#8594; 1 mois &#8594; 6 mois &#8594; 1 an. Le dernier palier étant répétable il est possible d'incanter un sort indéfiniment si bien qu'il en devient surpuissant.</p>
                    <p>Il est possible d'effectuer un rituel à plusieurs, la durée d'incantation est alors divisée par le nombre de personnes se concentrant dessus et seul le meilleur résultat est ajouté à la somme des lancers précédents.</p>
                </div>
                <h3 id="recherche_sort">Recherche de sort</h3>
                <div>
                        <form action="Recherche.php" name="recherche_sort" method="get">
                            <input name="type" value="magie" type="hidden">
                            <table>
                                <tbody>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Propriété</th>
                                    <th>École</th>
                                    <th>Inkarnaï</th>
                                </tr>
                                <tr>
                                    <td><input name="nom" type="text"></td>
                                    <td><input name="desc" type="text"></td>
                                    <td><input name="prop" type="text"></td>
                                    <td>
                                        <select name="ecole" id="ecole">
                                            <option value="all" selected>Toutes</option>
                                            <option value="alteration">Altération</option>
                                            <option value="conjuration">Conjuration</option>
                                            <option value="domination">Domination</option>
                                            <option value="mysticisme">Mysticisme</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="inkarnai" id="inkarnai" multiple size="6">
                                            <option value="all" selected>Tous</option>
                                            <option value="aigida">Aïgida</option>
                                            <option value="agapi">Agapi</option>
                                            <option value="agones">Agones</option>
                                            <option value="anathos">Anathos</option>
                                            <option value="eftis">Eftis</option>
                                            <option value="horoi">Horoi</option>
                                            <option value="kormo">Kormo</option>
                                            <option value="kuga">Kuga</option>
                                            <option value="kynigi">Kynigi</option>
                                            <option value="nero">Nero</option>
                                            <option value="orizo">Orizo</option>
                                            <option value="ourgal">Ourgal</option>
                                            <option value="pravoi">Pravoi</option>
                                            <option value="psema">Psema</option>
                                            <option value="safi">Safi</option>
                                            <option value="tychi">Tychi</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="reset"></td>
                                    <td><input type="submit" value="Rechercher"></td>
                                    <td colspan="2"></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>

                <p id="table_alteration" class="caption" onclick="hideContent(this)">École d'Altération</p>
                <div>
                    <p>Cette école permet de modeler la réalité comme on l'entend en transformant ou réparant des éléments existants.</p>
                    <?php
                    print_effets("Altération");
                    ?>
                </div>
                <p id="table_conjuration" class="caption" onclick="hideContent(this)">École de Conjuration</p>
                <div>
                    <p>L'école de Conjuration se concentre sur le déplacement d'éléments physiques ou magiques entre le plan matériel et le plan psychique, que ce soit des êtres vivants, des objets ou même des éléments.</p>
                    <?php
                    print_effets("Conjuration");
                    ?>
                </div>
                <p id="table_domination" class="caption" onclick="hideContent(this)">École de Domination</p>
                <div>
                    <p>Cette école permet de contrôler les vivants comme les morts et de jouer sur la perception de la réalité de ses cibles.</p>
                    <?php
                    print_effets("Domination");
                    ?>
                </div>
                <p id="table_mysticisme" class="caption" onclick="hideContent(this)">École du Mysticisme</p>
                <div>
                    <p>Cette école rassemble les sorts non étudiés par les trois autres écoles, ses effets sont divers : révéler l'inconnu et le futur, jouer avec le destin.</p>
                    <p>Cette école est la seule à ne pas posséder sa propre compétence, on prend en compte la compétence de rang le plus élevé entre les autres compétences d'écoles.</p>
                    <?php
                    print_effets("Mysticisme");
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");