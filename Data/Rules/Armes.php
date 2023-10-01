<?php
include($_SERVER['DOCUMENT_ROOT'] . "/params.php");
$title = "Armes";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
function print_armes($categories): void
{
    global $db;
    foreach ($categories as $cat) :
        $smt = $db->prepare("SELECT * FROM armes WHERE Categorie = :c ORDER BY enc");
        $smt->execute(['c' => $cat]);
        $rows = $smt->fetchAll();
        ?>
        <p id="<?= 'table_armes_cac' . $cat ?>" class="caption"><?php echo $cat?></p>
        <table>
            <tbody>
            <tr>
                <th>Type</th>
                <th>Type de Dégâts</th>
                <th>Dégâts</th>
                <th>Maniabilité</th>
                <th>Portée</th>
                <th>Propriétés</th>
                <th>ENC</th>
                <th>Prix (pa)</th>
            </tr>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td id="<?= 'Arme_' .$row['Id'] ?>"><?= $row['Type'] ?></td>
                    <td><?= $row['Type_degats'] ?></td>
                    <td><?= $row['Degats'] ?></td>
                    <td><?= $row['Maniabilite'] ?></td>
                    <td><?= $row['Portee'] ?></td>
                    <td><?= $row['Propriete'] ?></td>
                    <td><?= $row['ENC'] ?></td>
                    <td><?= $row['Prix'] ?> pa</td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php
    endforeach;
}
?>
    <h1 id="Armes" onclick="hideContent(this)">Armes</h1>
    <div>
        <div>
            <p>L'équipement joue un grand rôle dans la puissance du personnage, surtout s'il n'a que peu recours à la magie. Une arme forgée par un grand maître sera bien plus efficace qu'une vieille lame décrépite.</p>
            <p>Les armes nécessitent d'être maîtrisées par le personnage (incluses dans un de ses styles de combat) pour être utilisées convenablement. Un personnage utilisant une arme qu'il ne maitrise pas utilise sa caractéristique brute.</p>
            <p>La liste d'armes ci-dessous n'est pas exhaustive, vous êtes libre de vous en inspirez pour créer de nouvelles armes.</p>
            <h3 id="type_degats" onclick="hideContent(this)">Type de dégâts</h3>
            <div>
                <p>Les armes peuvent infliger différents types de dégâts selon la façon dont on les utilise, ces types de dégâts n'ont que peu d'impact statistique, mais peuvent renforcer la narration :</p>
                <ul>
                    <li><span class="big_underline">Écrasant :</span>Les armes infligeant des dégâts écrasants brisent les os comme les armures. Ce sont généralement des armes lourdes telles que les masses et les marteaux.
                    </li>
                    <li><span class="big_underline">Perforant :</span>Les armes infligeant des dégâts perforants s'infiltrent dans les points faibles des armures les plus épaisses. Les dagues, les lances ainsi que la plupart des armes à distance infligent ce type de dégâts.
                    </li>
                    <li><span class="big_underline">Tranchant :</span>Les armes infligeant des dégâts tranchants causent de profondes entailles dans la chair de leurs victimes. Les haches et les épées en font partie.
                    </li>
                </ul>
            </div>

            <h3 id="proprietes_armes" onclick="hideContent(this)">Propriété des armes</h3>
            <div>
                <p><span class="big_underline">Anti-Large :</span>Cette arme est faite pour affronter des ennemis plus larges que soi. Les jets d'attaques pour toucher les cibles d'un gabarit supérieur à celui de l'utilisateur se font avec 1 avantage.</p>
                <p><span class="big_underline">Brise-bouclier :</span>Cette arme est très efficace contre les boucliers. Les boucliers bloquant une attaque d'une arme possédant cette propriété voient leur RB divisée par 2 lors du blocage.</p>
                 <p><span class="big_underline">Dard :</span>Cette arme est capable de trouver des failles dans l'armure de sa cible. Les jets d'attaque avec un DR supérieur ou égal à 4 ignore l'armure de la cible.</p>
                <p><span class="big_underline">Duel :</span>Cette armes est faite pour le duel. Les jets de Style de Combat se font avec un avantage en combat singulier, mais un désavantage en infériorité numérique.</p>
                <p><span class="big_underline">Impact :</span>Cette arme peut envoyer valser ses cibles. Si le jet d'attaque possède un DR supérieur ou égal à 4, votre cible doit passer une épreuve de Force ou Agilité opposée à votre Force. La cible est repoussée sur une distance en mètres équivalente à votre DR de ce test.</p>
                <p><span class="big_underline">Sentinelle :</span>Cette arme réduit à 0 la vitesse de la cible pour ce tour si elle subit une attaque d'opportunité.</p>
                <p><span class="big_underline">Montée :</span>Cette arme n'est utilisable que depuis une monture pour des raisons de poids et de maniabilité. L'attaque se fait lors d'une charge.</p>
                <p><span class="big_underline">Petite :</span>Cette arme est relativement petite. Elle ne peut être utilisée pour parer les coups des armes maniées à deux mains. L'utilisateur peut passer un test de Roublardise opposé à l'Observation de l'adversaire pour dissimuler l'arme. Cette arme n'est pas affectée par les malus dans les espaces clos. Attaquer avec une arme dissimulée impose 3 désavantage à la cible lors de sa défense.</p>
                <p><span class="big_underline">Défensive :</span>Cette arme est faite pour parer les attaques, se défendre avec se fait avec un avantage.</p>
                <p><span class="big_underline">Peu maniable :</span>Cette arme n'est pas facile à manier, se défendre avec se fait avec un désavantage.</p>
                <p><span class="big_underline">Excellence :</span>Cette arme est d'excellente facture. Les jets de Style de Combat se font avec un avantage.</p>
                <p><span class="big_underline">Primitive :</span>Cette arme est d'une qualité pitoyable. Les jets de Style de Combat se font avec un désavantage.</p>
                <p><span class="big_underline">Perce-Armure(X) :</span>Cette arme est d'une telle puissance qu'elle ignore X PR de la cible qu'importe les conditions.</p>
                <p><span class="big_underline">Lancer(X) :</span>Cette arme est suffisamment équilibrée pour être lancée. X représente la portée effective de l'arme. Un lancer d'arme est traité comme une attaque à distance normale (mais la force peut être utilisée pour le test de Style de Combat). Le dé de dégâts de l'arme augmente d'un <a href="Systeme.php#cran_des">cran</a> si elle est lancée</p>
                <p><span class="big_underline">Rechargement(X)</span>Cette arme doit être rechargée avant d'être utilisée, le nombre d'actions nécessaires pour recharger l'arme est indiqué entre parenthèse. Le porteur peut dépenser son déplacement pour recharger son arme. Pour les armes à feu disposant de la propriété Chargeur(X), cela indique le temps de rechargement pour un tir.</p>
                <p><span class="big_underline">Chargeur(X) :</span>Cette arme à feu est capable de tirer X fois avant de nécessiter un rechargement.</p>
                <p><span class="big_underline">Zone(X)</span>Cette arme touche jusqu'à X cible dans sa portée d'attaque.</p>
            </div>

            <h3 id="attributs_arme" onclick="hideContent(this)">Attributs des armes</h3>
            <div>
                <p>La plupart des armes possèdent les attributs suivants :</p>
                <ul>
                    <li><span class="big_underline">Dégâts(Dgt) :</span>Les dégâts qu'inflige l'arme.</li>
                    <li><span class="big_underline">Maniabilité :</span>
                        <ul style="list-style-type: none">
                            <li><span class="big_underline">Une main :</span>L'arme s'utilise à une main ce qui la rend utilisable pour le <a href="Combat.php#combat_deux_armes">combat à deux armes</a>.</li>
                            <li><span class="big_underline">Deux mains :</span>L'arme requiert l'usage des deux mains pour pouvoir frapper.</li>
                        </ul>
                        <p>Une arme de mêlée ne possédant pas la propriété "Petite" peut être maniée à deux mains ce qui augmente la taille du dé de dégâts d'un cran.</p>
                    </li>
                    <li><span class="big_underline">Portée :</span>La portée d'une arme. Pour les armes de mêlée, cela ne représenta pas la longueur de l'arme mais plutôt la distance où elle est menaçante. Pour les armes à distance, cela indique la portée effective et la portée maximale en mètres (les tirs entre la portée effective et maximale se font avec un malus de -20).
                        <ul style="list-style-type: none">
                            <li><span class="big_underline">Courte :</span>Les armes courtes ont un avantage lors des <a href="Combat.php#lutte">luttes</a> et dans les espaces restreints.</li>
                            <li><span class="big_underline">Moyenne :</span>Les armes moyennes ne subissent aucune pénalité qu'importe la situation.</li>
                            <li><span class="big_underline">Longue :</span>Les armes longues subissent un désavantage dans les espaces restreints.</li>
                            <li><span class="big_underline">Très Longue :</span>Les armes très longues subissent deux désavantages dans les espaces restreints.</li>
                            <li><span class="big_underline">Extrême :</span>Les armes extrêmement longues subissent trois désavantages dans les espaces restreints.</li>
                            <li>Un combattant utilisant une arme plus longue que son adversaire possède un avantage pour la première passe d'arme et les suivantes jusqu'à ce qu'il en perde une. <br/>La décision de si un lieu est restreint ou non revient au MJ, mais en général, ce sont des endroits où il est difficile de se tenir debout, où il y a beaucoup d'objets pouvant gêner l'utilisation d'une grande arme par exemple.</li>
                        </ul>
                    </li>
                    <li><span class="big_underline">Propriétés :</span>Les propriétés de l'arme.</li>
                    <li><span class="big_underline">Encombrement (ENC) :</span>L'encombrement d'une arme, c'est la combinaison entre la taille et le poids de l'arme.</li>
                    <li><span class="big_underline">Prix :</span>Le prix de base de l'arme en pièce d'argent (pa).</li>
                </ul>
                <p>Ces attributs sont ceux d'une arme faite pour une créature de gabarit Moyen. Le gabarit de l'utilisateur peut influer sur certains attributs :</p>
                <ul>
                    <li>Les armes faites pour les Grandes créatures ou plus voient leur dé de dégâts augmenter d'un <a href="Systeme.php#cran_des">cran</a> par catégorie au-dessus de Moyenne.</li>
                    <li>La portée d'une arme de mêlée dépend du gabarit pour lequel elle est faite. Lors d'un affrontement entre une créature Petite avec une arme Très Longue et une créature Moyenne avec une arme Longue, les deux armes ont en réalité la même portée donc aucune des deux créatures n'obtiennent d'avantages grâce à la portée de leur arme pour la première passe d'armes.</li>
                    <li>Pour manier une arme d'un gabarit différent du sien il doit exister un type d'arme similaire plus grand ou plus petit, par exemple une épée longue de gabarit M est une épée courte pour un gabarit G ou une grande épée pour un gabarit P. Manier une arme créée pour une créature d'un gabarit différent du sien se fait avec un désavantage et il est impossible d'utiliser des armes faites pour des créatures ayant 2 gabarit ou plus d'écart.</li>
                    <li>Un objet fait pour une entité plus petite voit son prix divisé par deux par gabarit inférieur à Moyen et inversement le prix double par gabarit au-dessus.</li>
                </ul>
            </div>

            <h3 id="qualite_arme" onclick="hideContent(this)">Qualité des armes</h3>
            <div>
                <p>La qualité d'une arme peut avoir un impact sur son efficacité. La qualité varie en fonction de l'artisan à l'origine de l'arme :</p>
                <table>
                    <tbody>
                    <tr>
                        <th>Qualité de l'arme</th>
                        <th>Effets sur l'arme</th>
                        <th>Modificateur de prix</th>
                    </tr>
                    <tr>
                        <td>Médiocre</td>
                        <td>L'arme obtient la propriété "Primitive"</td>
                        <td>-50%</td>
                    </tr>
                    <tr>
                        <td>Ordinaire</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Supérieure</td>
                        <td>L'arme obtient la propriété "Excellence"</td>
                        <td>+100%</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <p class="super_caption" id="table_armes_cac">Armes de mêlée</p>
            <?php
            print_armes(array('Lames','Haches','Masses et marteaux',"Armes d'hast", 'Diverses'));
            ?>

            <p class="caption" id="materiau_armes_melee">Matériau des armes de mêlée</p>
            <table>
                <tbody>
                <tr>
                    <th>Matériau</th>
                    <th>Propriétés</th>
                    <th>Modificateur<br/>de dégâts</th>
                    <th>Modificateur<br/>de prix</th>
                </tr>
                <tr>
                    <td>Bois / Os / Pierre / Chitine</td>
                    <td>Primitive (sauf Masses et Bâtons)</td>
                    <td>-1</td>
                    <td>0,5*Prix</td>
                </tr>
                <tr>
                    <td>Fer</td>
                    <td>-</td>
                    <td>-</td>
                    <td>1*Prix</td>
                </tr>
                <tr>
                    <td>Acier / Shoren / Orichalque</td>
                    <td>-</td>
                    <td>+1</td>
                    <td>2*Prix</td>
                </tr>
                <tr>
                    <td>Nilaroy / Gnistar</td>
                    <td>-</td>
                    <td>+2</td>
                    <td>5*Prix</td>
                </tr>
                <tr>
                    <td>Lakma / Virgonium / Skymma</td>
                    <td>-</td>
                    <td>+3</td>
                    <td>10*Prix</td>
                </tr>
                </tbody>
            </table>

            <p class="super_caption" id="table_armes_distance">Armes à distance</p>
            <?php
            print_armes(array('Armes de jet', 'Arcs et arbalètes', 'Armes à distance diverses'));
            ?>


            <p class="super_caption" id="table_arme_feu">Armes à feu</p>
            <?php
            print_armes(array('Armes de poing', "Armes d'épaule"));
            ?>

            <h3 id="materiau_fleches_carreaux" onclick="hideContent(this)">Matériau des munitions</h3>
            <div>
                <p>Les armes à distance utilisent des munitions faites de différents matériaux. Les munitions sont comptées de façon abstraite avec un dé polyédrique, après avoir utilisé vos munitions après un combat, une partie de chasse ou autre, vous lancer ce dé, si vous obtenez un 1, la taille de votre dé de munition diminue d'un <a href="Systeme.php#cran_des">cran</a>. <br/>Chaque cran de votre dé de munitions représente une poignée de munitions, un carquois peut contenir jusqu'à 6 poignées de munition ce qui représente un d12 de munition. <br/>Les armes à feu nécessitent de la poudre à canon en plus des munitions. La poudre à canon fonctionne de façon identique aux munitions et est stockée dans une poire à poudre qui peut contenir 6 poignées de poudre soit un d12 de poudre. Il est possible de remplir une poire à poudre en prélevant de la poudre d'un baril de poudre.</p>
                <p>Les flèches et les carreaux peuvent posséder une pointe spécifique pour infliger un type de dégâts. Ces pointes spéciales coûtent deux fois plus cher qu'une pointe classique. Les pointes peuvent aussi être revêtues d'argent pour 10 pa par brassée de flèches.</p>
                <ul>
                    <li><span class="big_underline">Pointe demi-lune :</span>Cette pointe semblable à un fer de hache emmanchée au bout d'un fût de flèche inflige des dégâts tranchants.
                    </li>
                    <li><span class="big_underline">Pointe matras :</span>Cette pointe aplatie mise sur la puissance d'impact pour assommer sa cible. Elle inflige des dégâts écrasants.
                    </li>
                </ul>
                <table>
                    <tbody>
                    <tr>
                        <th>Matériau</th>
                        <th>Modificateur<br/>de dégâts</th>
                        <th>Prix en pa pour une poignée</th>
                    </tr>
                    <tr>
                        <td>Bois</td>
                        <td>-2</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Os / Pierre / Chitine</td>
                        <td>- 1</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Fer</td>
                        <td>-</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td>Acier / Shoren / Orichalque</td>
                        <td>+1</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Nilaroy / Gnistar</td>
                        <td>+2</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>Lakma / Skymma</td>
                        <td>+3</td>
                        <td>30</td>
                    </tr>
                    <tr>
                        <td>Virgonium</td>
                        <td>-</td>
                        <td>+3</td>
                        <td>40</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <h4 id="armes_improvisees">Armes improvisées</h4>
        <div>
            <p>Certains combats se déroulent sans que les personnages aient accès à leurs armes, ils peuvent alors se battre à mains nues ou en utilisant des objets environnants comme des armes improvisées. Ces armes possèdent les propriétés Primitive et Peu Maniable. Si elles sont d'un gabarit supérieur à leur utilisateur, alors celui subit deux désavantages supplémentaires pour les utiliser au combat.</p>
            <p>Un personnage peut utiliser des armes improvisées d'un gabarit inférieur au sien à une main, celles d'un gabarit identique ou supérieur au sien à deux mains. Un personnage ne peut utiliser les armes improvisées d'un gabarit deux crans supérieur au sien.</p>
            <table>
                <tbody>
                <tr>
                    <th>Gabarit de l'arme</th>
                    <th>Dégâts</th>
                    <th>Portée</th>
                    <th>Exemples</th>
                </tr>
                <tr>
                    <td>Très petite</td>
                    <td>1d4</td>
                    <td>Courte</td>
                    <td>Chope, Silex</td>
                </tr>
                <tr>
                    <td>Petite</td>
                    <td>1d6</td>
                    <td>Courte</td>
                    <td>Tabouret, pierre</td>
                </tr>
                <tr>
                    <td>Moyenne</td>
                    <td>1d8</td>
                    <td>Moyenne</td>
                    <td>Banc, Grosse branche</td>
                </tr>
                <tr>
                    <td>Grande</td>
                    <td>1d10</td>
                    <td>Longue</td>
                    <td>Porte, Table</td>
                </tr>
                <tr>
                    <td>Très Grande</td>
                    <td>1d12</td>
                    <td>Très Longue</td>
                    <td>Poutre, Tronc</td>
                </tr>
                </tbody>
            </table>
        </div>
        <h2 onclick="hideContent(this)" id="mod_armes">Personalisation des armes</h2>
        <div>
            <p>Il est possible de modifier une arme pour qu'elle s'adapte au mieux possible à son utilisateur. Ces modifications peuvent être faites à la main si l'on s'y connaît un peu, mais le résultat risque d'être de piètre qualité, il vaut mieux se referer à un véritable artisan pour ce genre de travaux.</p>
            <table>
                <tbody>
                <tr>
                    <th>Modification</th>
                    <th>Description</th>
                    <th>Effet(s)</th>
                    <th>Coût</th>
                </tr>
                <tr>
                    <th colspan="4">Modification des parties tranchantes</th>
                </tr>
                <tr>
                    <td>Lame dentelée</td>
                    <td>En ajoutant un motif de vagues courant sur toute la lame, les blessures infligées peuvent être dévastatrices si le coup est bien placé.</td>
                    <td>Sur un DR supérieur ou égal à 4, l'arme inflige un <a href="Glossaire.php#saignement">saignement</a> à la cible, la magnitude est équivalente à la moitié des dommages infligés.</td>
                    <td>20 % du prix de l'arme</td>
                </tr>
                <tr>
                    <td>Lame géante</td>
                    <td>Pour certains aventuriers éprouvant le besoin de compenser quelque chose, il est possible d'augmenter la taille de la lame jusqu'à la rendre ridiculement longue.</td>
                    <td>L'arme gagne les propriétés "Impact", "Brise-bouclier" et "Peu maniable" si elle ne les possède pas déjà, le dé de dégâts de l'arme augmente de 3 crans, l'encombrement de l'arme double, les jets de Style de Combat fait avec cette arme se font avec deux désavantages.</td>
                    <td>150% du prix de l'arme</td>
                </tr>
                <tr>
                    <th colspan="4">Modification des parties écrasantes</th>
                </tr>
                <tr>
                    <td>Alourdie</td>
                    <td>En densifiant la partie écrasante d'une arme, sa force d'impact peut surprendre plus d'un adversaire.</td>
                    <td>Sur un DR supérieur ou égal à 4, l'ennemi est projeté <a href="Glossaire.php#a_terre">à terre</a>. Les ennemis <a href="Glossaire.php#a_terre">à terre</a> subissent des dégâts doublés. L'encombrement de l'arme augmente de 1. L'arme obtient la propriété "Impact" si elle ne la possède pas déjà.</td>
                    <td>50 % du prix de l'arme</td>
                </tr>
                <tr>
                    <td>Destructrice</td>
                    <td>Si l'on modifie la façon dont l'arme frappe sa cible, il devient possible de détruire plus facilement les armures de ses adversaires.</td>
                    <td>Sur un DR supérieur ou égal à 4, l'armure de la cible subit de le trait <a href="Glossaire.php#endommage">Endommagé(1)</a>.</td>
                    <td>25 % du prix de l'arme</td>
                </tr>
                <tr>
                    <td>Brise-os</td>
                    <td>Quelques pointes judicieusement placées augmentent les chances de briser les os de ses cibles.</td>
                    <td>Sur un DR supérieur ou égal à 4, la cible est <a href="Glossaire.php#etourdi">étourdie</a> pendant 1 round par la douleur causée par le coup.</td>
                    <td>25 % du prix de l'arme</td>
                </tr>
                <tr>
                    <th colspan="4">Modification des armes à feu</th>
                </tr>
                <tr>
                    <td>Baïonnette</td>
                    <td>L'installation d'une lame en dessous du canon permet de se servir de son arme à feu comme d'une arme d'estoc.</td>
                    <td>Possibilité d'effectuer une attaque de mêlée avec son arme à feu.(Dgt 1d4 pour une arme de poing, 1d6 pour une arme d'épaule).</td>
                    <td>35 pa</td>
                </tr>
                <tr>
                    <td>Gros calibre</td>
                    <td>En installant un canon plus gros, il est possible d'utiliser des munitions plus grosses.</td>
                    <td>Le dé de dégâts augmente d'un cran. L'arme perd la propriété "Petite" L'arme nécessite une action de plus pour être rechargée.</td>
                    <td>30 % du prix de l'arme</td>
                </tr>
                <tr>
                    <td>Petit calibre</td>
                    <td>En installant un canon plus petit, on diminue la quantité de poudre nécessaire pour faire feu.</td>
                    <td>Le dé de dégâts diminue d'un cran. Les armes de poings obtiennent la propriété "Petite". L'arme nécessite une action de moins pour être rechargée.</td>
                    <td>20 % du prix de l'arme</td>
                </tr>
                <tr>
                    <th colspan="4">Amélioration globales</th>
                </tr>
                <tr>
                    <td>Enchantement</td>
                    <td>Il est possible de rendre une arme magique en l'infusant de Karnyx. Il est possible de faire d'une arme un catalyseur, permettant d'avoir recours à un ou plusieurs sorts sans en avoir forcément les capacités psychiques.</td>
                    <td>L'utilisateur peut utiliser le(s) sort(s) contenu(s) dans l'arme.</td>
                    <td>150 po</td>
                </tr>
                <tr>
                    <td>Revêtement en argent</td>
                    <td>L'arme est recouverte d'une fine couche d'argent, lui permettant de toucher les cibles y étant vulnérables.</td>
                    <td>L'arme inflige des dégâts supplémentaires aux cibles souffrant d'une vulnérabilité à l'argent</td>
                    <td>50 pa pour une arme à une main, 150 pa pour une arme à deux mains</td>
                </tr>
                <tr>
                    <td>Revêtement en virgonium</td>
                    <td>L'arme est recouverte d'une fine couche de virgonium, lui permettant d'infliger des dégâts aux êtres éthérés.</td>
                    <td>L'arme inflige des dégâts supplémentaires aux cibles souffrant d'une vulnérabilité au virgonium et peut toucher les entités "Éthérés".</td>
                    <td>50 po pour une arme à une main, 150 po pour une arme à deux mains</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");