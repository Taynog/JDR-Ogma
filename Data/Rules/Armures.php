<?php
include($_SERVER['DOCUMENT_ROOT'] . "/params.php");
$title = "Armures";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
function print_armures($categories): void
{
    global $db;
    foreach ($categories as $cat) :
    $smt = $db->prepare("SELECT * FROM armures WHERE Categorie = :c ORDER BY PR");
    $smt->execute(['c' => $cat]);
    $rows = $smt->fetchAll();
    ?>
    <p id="<?= 'table_armures_' . $cat ?>" class="caption"><?php echo 'Armures ' . $cat . 's'?></p>
    <table>
        <tbody>
        <tr>
            <th>Matériau</th>
            <th>PR</th>
            <th>PR Magique</th>
            <th>Prix</th>
        </tr>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td id="<?= 'Armure_' .$row['Id'] ?>"><?= $row['Materiau'] ?></td>
                <td><?= $row['PR'] ?></td>
                <td><?= $row['PR_mag'] ?></td>
                <td><?= $row['Prix'] ?> pa</td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
<?php
endforeach;
}
function print_boucliers(): void
{
    global $db;
    $smt = $db->prepare("SELECT * FROM boucliers ORDER BY RB");
    $smt->execute();
    $rows = $smt->fetchAll();
    ?>
        <p id="<?= 'table_boucliers' ?>" class="caption">Boucliers</p>
        <table>
            <tbody>
            <tr>
                <th>Matériau</th>
                <th>RB</th>
                <th>Prix</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td id="<?= 'Bouclier' . $row['Id'] ?>"><?= $row['Materiau'] ?></td>
                    <td><?= $row['RB'] ?></td>
                    <td><?= $row['Prix'] ?> pa</td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php
}
?> 
    <h1 id="Armures" onclick="hideContent(this)">Armures</h1>
    <div>
        <p>Les armures sont un élément très important dans l'équipement d'un personnage, surtout si c'est un combattant de mêlée. L'armure permet de réduire les dégâts subis, mais impose parfois des pénalités.</p>
        <p>Les armures sont reparties en catégories de poids représentant la gêne pour le porteur.</p>
        <p><span class="big_underline">Tunique renforcée :</span>la tunique renforcée n'impose aucune pénalité sur les tests du personnage.</p>
        <p><span class="big_underline">Légère :</span>l'armure légère n'impose aucune pénalité sur les tests du personnage. Le personnage dispose de 5 <a href="Survie.php#capacite_port">emplacements d'inventaire</a>.</p>
        <p><span class="big_underline">Intermédiaire :</span>L'armure intermédiaire impose un désavantage aux tests d'Acrobatie, d'Athlétisme et de Furtivité. Le personnage dispose de 4 <a href="Survie.php#capacite_port">emplacements d'inventaire</a>. La vitesse du personnage diminue de 1.</p>
        <p><span class="big_underline">Lourde :</span>L'armure lourde impose deux désavantages aux tests d'Acrobatie, d'Athlétisme et de Furtivité. Le personnage dispose de 3 <a href="Survie.php#capacite_port">emplacements d'inventaire</a>. La vitesse du personnage diminue de 2.</p>
        <p><span class="big_underline">Super-lourde :</span>L'armure super-lourde impose trois désavantages aux tests d'Acrobatie, d'Athlétisme et de Furtivité. Le personnage dispose de 2 <a href="Survie.php#capacite_port">emplacements d'inventaire</a>. La vitesse du personnage diminue de 3.</p>
        <p>Les armures nécessitent d'être maîtrisées par le personnage (incluses dans un de ses styles de combat) pour être utilisées convenablement. Un personnage portant une armure sans y être habitué subit le double des pénalités dues au poids de l'armure.</p>
        <p>L'armure protège le corps tout entier même si la description d'une armure peut varier selon les personnages. Chaque armure possède une certaine valeur de protection (PR) qui réduit tous dégâts subit sur la zone qu'elle protège. Certaines armures possèdent une PR magique permettant de réduire les dégâts magiques.</p>


        <h3 id="qualite_armure_bouclier" onclick="hideContent(this)">Qualité des armures et des boucliers</h3>
        <div>
            <p>La qualité d'une armure peut avoir un impact sur son efficacité. La qualité varie en fonction de l'artisan qui a créé la pièce :</p>
            <table>
                <tbody>
                <tr>
                    <th>Qualité de la pièce</th>
                    <th>Effets sur les propriétés</th>
                    <th>Modificateur de prix</th>
                </tr>
                <tr>
                    <td>Médiocre</td>
                    <td>Les protections physique et magique diminuent de 1.<br/>L'armure impose un désavantage supplémentaire aux tests d'Acrobaties, d'Athlétisme et de Furtivité.</td>
                    <td>-25%</td>
                </tr>
                <tr>
                    <td>Ordinaire</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Supérieure</td>
                    <td>Les protections physique et magique augmentent de 1.</td>
                    <td>+50%</td>
                </tr>
                </tbody>
            </table>
        </div>
        <?php
        print_armures(array('Légère', 'Intermédiaire', 'Lourde'));
        ?>
        <h3 onclick="hideContent(this)" id="mod_armures_boucliers">Personalisation des armures et des boucliers</h3>
        <div>
            <p>Il est possible de modifier une armure pour qu'elle s'adapte au mieux possible à son utilisateur. Ces modifications peuvent être faites à la main si l'on s'y connaît un peu, mais le résultat risque d'être de piètre qualité, il vaut mieux se referer à un véritable artisan pour ce genre de travaux.</p>
            <table>
                <tbody>
                <tr>
                    <th>Modification</th>
                    <th>Description</th>
                    <th>Effet(s)</th>
                    <th>Coût</th>
                </tr>
                <tr>
                    <td>Armure partielle</td>
                    <td>En retirant certaines parties non essentielles, il est possible d'alléger l'armure au détriment de la protection.</td>
                    <td>La catégorie de poids de l'armure diminue d'un cran. La PR et la PR magique sont réduites de 1. L'armure est 25% moins chère. Il est possible d'appliquer plusieurs fois cette modification jusqu'à la catégorie Tunique Renforcée.</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Armure intégrale</td>
                    <td>En ajoutant des protections supplémentaires, il est possible d'augmenter la protection fournie par l'armure au détriment de son poids. Il est possible d'appliquer plusieurs fois cette modification jusqu'à la catégorie Super-Lourde.</td>
                    <td>La PR et la PR magique augmentent de 1. La catégorie de poids de l'armure augmente d'un cran.</td>
                    <td>25% du prix de l'armure</td>
                </tr>
                <tr>
                    <td>Armure polie</td>
                    <td>Un traitement spécial à base d'aluminium permet de donner un aspect très brillant à l'armure.</td>
                    <td>Dans un environnement très lumineux, le porteur de l'armure peut tenter d'éblouir ses adversaires (la cible lance son dé de perception, si le résultat est supérieur ou égal à 5 alors elle est <a href="Glossaire.php#aveugle">aveuglée</a> pendant un round). En revanche, la lumière réfléchie par l'armure empêche de passer inaperçu et impose deux désavantages aux tests de Furtivité.</td>
                    <td>50 pa</td>
                </tr>
                <tr>
                    <td>Furtivité</td>
                    <td>Un traitement à base d'hématite (pour les armures de métal) ou de teinture (pour celles en cuir/tissu) permet d'assombrir l'armure pour être plus discret dans les zones peu éclairées. L'armure peut attirer l'attention des forces de l'ordre. Quelques parties sont ajustées pour limiter le bruit de l'armure.</td>
                    <td>Dans un environnement sombre, le porteur bénéficie d'un bonus de +2 à ses jets de furtivité.</td>
                    <td>50 pa</td>
                </tr>
                <tr>
                    <td>Armure de pointes/à lames</td>
                    <td>L'ajout de pointes ou de lames sur l'armure peut blesser les adversaires s'approchant trop du porteur, mais ce genre de modification peut en impressionner plus d'un.</td>
                    <td>Toute entité faisant contact avec l'armure avec force subit 1d4 de dégâts. Le porteur bénéficie d'un avantage lorsqu'il se défend dans une lutte.</td>
                    <td>50 pa</td>
                </tr>
                <tr>
                    <td>Rembourrage</td>
                    <td>L'intérieur de l'armure est doublée d'une couche de tissu supplémentaire, rendant l'armure plus chaude et plus agréable à porter.</td>
                    <td>Le porteur peut dormir confortablement dans son armure et bénéficient de 2 avantages pour résister aux effets du climat liés aux températures basses.</td>
                    <td>20 pa</td>
                </tr>
                <tr>
                    <td>Sertissage de runes</td>
                    <td>L'armure est sertie de runes de karnyx, cela procure des capacités magiques à l'armure.</td>
                    <td>L'armure obtient 1 de PR magique et obtient la propriété "Magique".</td>
                    <td>25% du prix de l'armure</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 id="boucliers" onclick="hideContent(this)">Boucliers</h2>
        <div>
            <p>Les boucliers sont utilisées pour se prémunir de toute sorte d'attaques. Puisqu'ils sont à mi-chemin entre les armes et les armures, ils suivent des règles spéciales.</p>
            <p>Utilisé comme une arme, un bouclier a une allonge Moyenne, est maniable à une ou deux mains, possède les propriétés "Impact" et "Sentinelle" et inflige 1d4 dégâts écrasants. Un bouclier possède un encombrement de 2.</p>
            <p><span class="big_underline">Résistance de Bouclier (RB) :</span>Au lieu de posséder une valeur de Protection, les boucliers possède une résistance notée RB, qui prend en compte la solidité du bouclier et la surface qu'il couvre.</p>
            <p>Si un bouclier est utilisé pour bloquer une attaque, que ce soit une attaque de mêlée, un projectile ou une explosion, le personnage passe un test de Style de Combat(Force ou Dextérité) auquel il ajoute la RB de son bouclier. Voir les <a href="Combat.php#passe_armes">passes d'armes</a> pour plus de détails sur la défense en combat.</p>
            <p>Les boucliers ci-dessous possèdent deux variantes :</p>
            <ul>
                <li><b>Grand Bouclier :</b> Un énorme bouclier couvrant presque intégralement son porteur. Il est possible d'utiliser une réaction pour imposer deux désavantages aux attaques à distance ciblant le porteur et les entités qui lui sont adjacentes. Un tel bouclier possède une RB supérieure d'un point, possède un encombrement de 3 et coûte 25% plus cher.</li>
                <li><b>Petit Bouclier :</b> Un bouclier de diamètre réduit plus léger et maniable qu'un bouclier classique. Ce type de bouclier est incapable de bloquer les attaques de zone et perd la propriété "Sentinelle" mais obtient la propriété "Duel". Un tel bouclier possède une RB inférieure d'un point et un encombrement de 1.</li>
            </ul>
            <?php
            print_boucliers();
            ?>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");