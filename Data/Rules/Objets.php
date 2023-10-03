<?php
$title = "Objets et Services";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
function print_objets(): void
{
    global $db;
    $smt = $db->prepare("SELECT * FROM objets ORDER BY Cat, Objet");
    $smt->execute();
    $rows = $smt->fetchAll();
    $cur_cat = $rows[0]['Cat'];
    ?>
    <table id="<?= 'table_objets' ?>">
        <tbody>
        <tr>
            <th style="width: 25%">Objet</th>
            <th style="width: 60%">Description</th>
            <th style="width: 12%">Prix</th>
            <th style="width: 3%">ENC</th>
        </tr>
        <tr>
            <th colspan="5"><?=$cur_cat?></th>
        </tr>
        <?php foreach ($rows as $row) : ?>
            <?php
                if($row['Cat'] != $cur_cat) :?>
                    <?php $cur_cat = $row['Cat']; ?>
                    <th colspan='5'><?=$cur_cat?></th>
                <?php endif;?>
            <tr>
                <td id="<?= 'Objet_' .$row['Id'] ?>"><?= $row['Objet'] ?></td>
                <td><?= $row['Description'] ?></td>
                <td><?= $row['Prix'] ?></td>
                <td><?= $row['ENC'] ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php
}
?> 
    <h1 id="monnaie" onclick="hideContent(this)">Monnaie et conversions</h1>
    <div>
        <table>
            <tbody>
            <tr>
                <th rowspan="2">Monnaie</th>
                <th colspan="3">Conversion</th>
            </tr>
            <tr>
                <th>Pièces d'or</th>
                <th>Pièces d'argent</th>
                <th>Pièces de cuivre</th>
            </tr>
            <tr>
                <th>Lingot de bérylium</th>
                <td>100</td>
                <td>1 000</td>
                <td>10 000</td>
            </tr>
            <tr>
                <th>Pièce d'or</th>
                <td>1</td>
                <td>10</td>
                <td>100</td>
            </tr>
            <tr>
                <th>Pièce d'argent</th>
                <td>0,1</td>
                <td>1</td>
                <td>10</td>
            </tr>
            <tr>
                <th>Pièce de cuivre</th>
                <td>0,01</td>
                <td>0,1</td>
                <td>1</td>
            </tr>
            </tbody>
        </table>
    </div>

    <h1 id="materiel_aventurier" onclick="hideContent(this)">Équipement d'aventurier</h1>
    <p>Certains objets peuvent être utilisés à maintes reprises et d'autres ont un nombre d'utilisations limitées, quand c'est le cas, le nombre d'utilisations est représenté par un dé de ressource. Les objets de ce type sont indiqué par (D), le minimum étant le d2 et le maximum le d12. L'encombrement d'un objet à dé de ressource ne varie pas en fonction de la taille du dé.</p>
    <p>Chaque fois que vous achetez un objet à dé de ressource, la taille de son dé de ressource augmente d'un cran. Chaque fois que vous utilisez un objet à dé de ressource, vous lancer le dé correspondant, si vous obtenez un 1 la taille du dé de ressource diminue d'un cran.</p>
    <div class="hidden">
        <table>
            <tbody>
            <tr>
                <th>Objet</th>
                <th>Description</th>
                <th>Prix</th>
                <th>ENC</th>
                <th>Objet</th>
                <th>Description</th>
                <th>Prix</th>
                <th>ENC</th>
            </tr>
            <tr>
                <th colspan="8">Campement</th>
            </tr>
            <tr>
                <td>Boite d'allume-feu (D)</td>
                <td>Silex, amorces et amadou, tout ce qu'il faut pour allumer un feu</td>
                <td>5 pc</td>
                <td>1</td>
                <td>Gamelle</td>
                <td>Assiette creuse accompagnée de couverts, peut également servir de casserole</td>
                <td>2 pc</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Rations (D)</td>
                <td>Aliments appropriés pour un long voyage : viande séchée, fruits secs, biscuit,...</td>
                <td>5 pc</td>
                <td>1</td>
                <td>Tente</td>
                <td>Légère et pliable, elle permet à deux personnes de gabarit Moyen de dormir à l'abri des intempéries</td>
                <td>10 pa</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Sac de couchage</td>
                <td>Bien enroulé et très chaud, il s'attache facilement sur un sac à dos et permet de passer sa nuit sans grelotter</td>
                <td>1 pa</td>
                <td>1</td>
                <td>Couverture</td>
                <td>Peut également servir de tapis de sol, elle tient moins chaud qu'un sac de couchage mais reste indispensable pour un sommeil de qualité</td>
                <td>5 pc</td>
                <td>1</td>
            </tr>
            <tr>
                <th colspan="8">Contenants</th>
            </tr>
            <tr>
                <td colspan="8">Dans le cas des contenants, le dé de ressource représente la quantité de contenu et non le nombre de contenants</td>
            </tr>
            <tr>
                <td>Baril (D)</td>
                <td>Petit tonneau pouvant stocker tout et n'importe quoi.</td>
                <td>3 pa</td>
                <td>2</td>
                <td>Poire à poudre (D)</td>
                <td>Conteneur métallique préservant la poudre à canon de l'humidité</td>
                <td>5 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Fiole vide (D)</td>
                <td>Petit récipient en verre d'une contenance de 100mL</td>
                <td>1 pa</td>
                <td>0</td>
                <td>Flasque vide (D)</td>
                <td>Récipient en verre d'une contenance d'un litre</td>
                <td>2 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Carquois (D)</td>
                <td>Étui en cuir protégeant les munitions à l'intérieur</td>
                <td>3 pa</td>
                <td>1</td>
                <td colspan="4"/>
            </tr>
            <tr>
                <th colspan="8">Cordes et chaînes</th>
            </tr>
            <tr>
                <td>Chaîne (3 m)</td>
                <td>Lourde chaîne de métal devant subir 25 dégâts avant de se briser</td>
                <td>35 pa</td>
                <td>2</td>
                <td>Corde (15 m)</td>
                <td>Longue corde en chanvre devant subir 5 dégâts avant de se briser</td>
                <td>1 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <th colspan="8">Déplacement</th>
            </tr>
            <tr>
                <td>Échelle de corde (5 m)</td>
                <td>Pliable, elle s'attache facilement sur un sac et permet de créer un passage facile sur un mur</td>
                <td>5 pc</td>
                <td>2</td>
                <td>Équipement d’escalade</td>
                <td>Crampons et piolets, accorde 3 avantages pour les épreuves d'escalade</td>
                <td>25 pa</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Grappin</td>
                <td>Permet de sécuriser une corde sans avoir à faire de noeuds, utile lorsque l'on souhaite escalader une falaise</td>
                <td>5 pa</td>
                <td>1</td>
                <td>Palan</td>
                <td>Système de poulies permettant de monter/descendre de lourdes charges</td>
                <td>3 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <th colspan="8">Éclairage</th>
            </tr>
            <tr>
                <td>Bougie (D)</td>
                <td>Faite de cire, cette bougie éclaire une petite zone pendant 2 heures</td>
                <td>1 pc</td>
                <td>1</td>
                <td>Lampe</td>
                <td>Faite de métal, cette lampe éclaire une zone modeste et consomme une flasque d'huile toute les 8 heure</td>
                <td>5 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Lanterne</td>
                <td>Faite de métal, cette lanterne éclaire une grande zone, un système de miroir peut être utilisé pour créer un grand cone de lumière, elle consomme une flasque d'huile toute les 4 heure</td>
                <td>10 pa</td>
                <td>1</td>
                <td>Torche (D)</td>
                <td>Morceau de bois imbibé d'huile, elle éclaire une zone moyenne pendant 1 heure</td>
                <td>1 pc</td>
                <td>1</td>
            </tr>
            <tr>
                <td colspan="8">Pour plus d'informations, voir <a href="Survie.php#eclairage">Éclairage</a></td>
            </tr>
            <tr>
                <th colspan="8">Écrits</th>
            </tr>
            <tr>
                <td>Craie (D)</td>
                <td>Permet d'écrire sur presque toutes les surfaces mais s'efface avec l'eau</td>
                <td>1 pc</td>
                <td>0</td>
                <td>Grimoire</td>
                <td>Imposant ouvrage relié de cuir</td>
                <td>20 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Livre</td>
                <td>Petit ouvrage relié de cuir</td>
                <td>15 pa</td>
                <td>1</td>
                <td>Papier (D)</td>
                <td>Permet de noter des informations quelconques</td>
                <td>1 pc</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Parchemin (D)</td>
                <td>Permet de créer des cartes ou des parchemins magiques</td>
                <td>2 pc</td>
                <td>0</td>
                <td>Plume d’écriture</td>
                <td>Permet d'écrire sur du papier ou du parchemin</td>
                <td>2 pc</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Encre</td>
                <td>À stockée dans une fiole, à combiner avec une plume d'écriture</td>
                <td>10 pa</td>
                <td>0</td>
                <td colspan="4"/>
            </tr>
            <tr>
                <th colspan="8">Explosifs</th>
            </tr>
            <tr>
                <td>Poudre à canon (baril)</td>
                <td>Stocké dans un baril, cette poudre est parfois utilisée pour creuser rapidement des galeries</td>
                <td>10 pa</td>
                <td>0</td>
                <td>Poudre à canon (poire)</td>
                <td>Stockée dans une poire, permet de recharger une arme à feu</td>
                <td>3 pa</td>
                <td>0</td>
            </tr>
            <tr>
                <th colspan="8">Liquides</th>
            </tr>
            <tr>
                <td>Parfum</td>
                <td>Stocké dans une fiole, peut cacher certaines odeurs, très apprécié dans les évènements mondains</td>
                <td>5 pa</td>
                <td>0</td>
                <td>Huile</td>
                <td>Stockée dans une flasque, très inflammable, sert de combustible à lanterne</td>
                <td>5 pc</td>
                <td>0</td>
            </tr>
            <tr>
                <th colspan="8">Outils</th>
            </tr>
            <tr>
                <td>Bélier portatif</td>
                <td>Morceau de bois renforcé de métal, permet d'enfoncer les portes avec 5 avantages</td>
                <td>15 pa</td>
                <td>2</td>
                <td>Crochets (D)</td>
                <td>Permet de crocheter des serrures verrouillées, se casse en cas d'échec du test</td>
                <td>1 po</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Marteau</td>
                <td>Possède un côté plat pour marteler et un arrache-clou de l'autre côté, utile dans toute sorte de situation</td>
                <td>2 pa</td>
                <td>1</td>
                <td>Pelle</td>
                <td>Très utile dès qu'on veut creuser la terre</td>
                <td>5 pa</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Pied-de-biche</td>
                <td>Permet d'ouvrir par la force les contenants scellés, accorde 2 avantages aux épreuves de Force où il est possible de faire levier</td>
                <td>10 pa</td>
                <td>2</td>
                <td>Pioche</td>
                <td>Très utile dès qu'on veut creuser la pierre</td>
                <td>5 pa</td>
                <td>3</td>
            </tr>
            <tr>
                <th colspan="8">Optique</th>
            </tr>
            <tr>
                <td>Longue-vue</td>
                <td>Permet de voir 5 fois plus loin qu'à l'oeil nu</td>
                <td>5 po</td>
                <td>1</td>
                <td>Loupe</td>
                <td>Permet de grossir 5 fois un objet proche ou d'allumer un feu s'il y a du soleil</td>
                <td>2 po</td>
                <td>0</td>
            </tr>
            <tr>
                <th colspan="8">Outils de marchand</th>
            </tr>
            <tr>
                <td>Balance de marchand</td>
                <td>Plateaux et arrangements de poids, permet de déterminer le poids exact d'objets inférieur à 1 kg</td>
                <td>25 pa</td>
                <td>1</td>
                <td>Boulier</td>
                <td>Cadre de bois remplis de tiges serties de boules servant à compter rapidement de grand nombre.</td>
                <td>2 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <th colspan="8">Pièges</th>
            </tr>
            <tr>
                <td>Billes (D)</td>
                <td>Petites billes recouvrant une zone de 5m x 5m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d'Agilité ou tomber <a href="Glossaire.php#a_terre">à terre</a></td>
                <td>10 pa</td>
                <td>1</td>
                <td>Chausse-trappes (D)</td>
                <td>Petits picots métalliques présentant toujours une pointe vers le haut recouvrant une zone de 2m x 2m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d'Agilité DC 8 (DC 5 si on se déplace à la moitié de sa vitesse), sur un échec on subit une blessure. Tant qu'elles n'ont pas récupéré de cette blessure elles conservent cette pénalité de vitesse.</td>
                <td>5 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Piège à mâchoires</td>
                <td>Anneau d'acier en dents de scie s'activant via une plaque de pression et possédant une chaîne d'un mètre, une entité activant le piège subit 2d8 dégâts perforants et écrasants et voit sa vitesse divisée par 4 si elle subit une blessure. Tant qu'elle n'a pas récupéré de cette blessure elle conserve cette pénalité de vitesse. Elle peut se libérer en passant un test d'Athlétisme(Force) DC10 avec 2 désavantages.</td>
                <td>25 pa</td>
                <td>2</td>
                <td>Pointes en fer (D)</td>
                <td>Bâtons métalliques de 20cm possédant une tête plate et une pointe, utile dans toute sorte de situations</td>
                <td>1 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <th colspan="8">Autres</th>
            </tr>
            <tr>
                <td>Cadenas</td>
                <td>Solide cadenas métallique, nécessite au moins 10 DR sur un test étendu de crochetage</td>
                <td>35 pa</td>
                <td>0</td>
                <td>Chevalière</td>
                <td>Bague possédant un relief, permet d'apposer un sceau à la cire</td>
                <td>20 pa</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Cire à cacheter (D)</td>
                <td>Petit bâton de cire à faire fondre pour cacheter des documents importants</td>
                <td>5 pc</td>
                <td>0</td>
                <td>Cloche</td>
                <td>Cloche à main résonnant bruyamment quand secouée</td>
                <td>1 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Matériel de pêche</td>
                <td>Canne, lignes, hameçons et leurres, permet de pêcher n'importe où. Sur un test étendu de Survie(Dex) DC 5, vous lancez un dé par heure, à la fin du test, diviser le DR total par 2, c'est le nombre de rations de poisson que vous obtenez.</td>
                <td>1 pa</td>
                <td>2</td>
                <td>Menottes</td>
                <td>Solides attaches métalliques devant subir 10 dégâts avant de se briser, pouvant <a href="Glossaire.php#entrave">entraver</a> une créature de Gabarit Moyen ou Petit.</td>
                <td>25 pa</td>
                <td>1</td>
            </tr>
            <tr>
                <td>Miroir en acier</td>
                <td>Petit miroir fort utile pour se recoiffer ou voir sans être vu depuis un mur en angle</td>
                <td>15 pa</td>
                <td>1</td>
                <td>Perche (3 m)</td>
                <td>Longue perche de bois possédant de nombreuses applications</td>
                <td>5 pc</td>
                <td>2</td>
            </tr>
            <tr>
                <td>Pierre à aiguiser</td>
                <td>Petite pierre faite pour affiner le fil d'une lame</td>
                <td>3 pc</td>
                <td>0</td>
                <td>Sablier / Clepsydre</td>
                <td>Petit contenant en verre contenant du sable / de l'eau mettant un temps déterminé à s'écouler</td>
                <td>25 pa</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Savon (D)</td>
                <td>Petit cube de savon possédant de nombreuses applications</td>
                <td>5 pc</td>
                <td>0</td>
                <td>Sifflet / Appeau</td>
                <td>Petit sifflet émettant du bruit dans une zone donnée. Certains imitent le cri d'un animal.</td>
                <td>5 pc</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Trousse de soins (D)</td>
                <td>Bandages, aiguille et fil de suture, tout le nécessaire pour panser des plaies. Permet de stabiliser une créature mourante sur un test de Médecine(Int ou Dex) DC 4. La créature mourante passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR de l'utilisateur de la trousse médicale. Sur une réussite, la créature n'est plus <a href='Glossaire.php#mourant'>mourante</a> et devient <a href='Glossaire.php#stable'>stable</a>.</td>
                <td>25 pa</td>
                <td>1</td>
                <td colspan="4"/>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <?php
        print_objets();
        ?>
    </div>

    <h1 id="taverne" onclick="hideContent(this)">Taverne</h1>
    <div>
        <table>
            <tbody>
            <tr>
                <th>Catégorie</th>
                <th>Service</th>
                <th>Prix</th>
                <th>Service</th>
                <th>Prix</th>
            </tr>
            <tr>
                <th colspan="5">Repas</th>
            </tr>
            <tr>
                <th rowspan="2">Petit-déjeuner de roturier</th>
            </tr>
            <tr>
                <td>Omelette au fromage</td>
                <td>1 pc</td>
                <td>Jambon et fromage sur pain de riz</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <th rowspan="2">Petit-déjeuner de marchand</th>
            </tr>
            <tr>
                <td>Sandwich aux oeufs et bacon</td>
                <td>3 pc</td>
                <td>Fougasse aux lardons</td>
                <td>5 pc</td>
            </tr>
            <tr>
                <th rowspan="2">Petit-déjeuner de noble</th>
            </tr>
            <tr>
                <td>Steak de sanglier et oeuf à cheval</td>
                <td>2 pa</td>
                <td>Omelette à la truffe</td>
                <td>3 pa</td>
            </tr>
            <tr>
                <th rowspan="2">Déjeuner de roturier</th>
            </tr>
            <tr>
                <td>Soupe aux légumes</td>
                <td>1 pc</td>
                <td>Chèvre grillée</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <th rowspan="2">Déjeuner de marchand</th>
            </tr>
            <tr>
                <td>Chèvre grillée et fromage</td>
                <td>3 pc</td>
                <td>Oie grillée briochée</td>
                <td>5 pc</td>
            </tr>
            <tr>
                <th rowspan="2">Déjeuner de noble</th>
            </tr>
            <tr>
                <td>Carré d'agneau</td>
                <td>2 pa</td>
                <td>Salade de gésiers</td>
                <td>3 pa</td>
            </tr>
            <tr>
                <th rowspan="2">Diner de roturier</th>
            </tr>
            <tr>
                <td>Soupe de légumes</td>
                <td>1 pc</td>
                <td>Lapin et patates sautées</td>
                <td>3 pc</td>
            </tr>
            <tr>
                <th rowspan="2">Diner de marchand</th>
            </tr>
            <tr>
                <td>Tourte du chasseur</td>
                <td>4 pc</td>
                <td>Salade de venaison</td>
                <td>5 pc</td>
            </tr>
            <tr>
                <th rowspan="2">Diner de noble</th>
            </tr>
            <tr>
                <td>Steak de venaison et légumes</td>
                <td>2 pa</td>
                <td>Saumon fumé</td>
                <td>4 pa</td>
            </tr>
            <tr>
                <td colspan="5">Les repas sont apportés avec un accompagnement(sauf spécifié), une tranche de pain et une chope (d'eau pour roturier, de bière pour marchand, de vin pour noble). Les parts des repas marchands et nobles sont plus importantes.</td>
            </tr>
            <tr>
                <th colspan="5">Boissons</th>
            </tr>
            <tr>
                <th rowspan="5">Sans-alcool</th>
            </tr>
            <tr>
                <td>Eau (pichet)</td>
                <td>2 pc</td>
                <td>Eau minérale (chope)</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <td>Eau gazeuse (chope)</td>
                <td>2 pc</td>
                <td>Jus de fruit (chope)</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <td>Lait de vache(chope)</td>
                <td>1 pc</td>
                <td>Lait de chèvre(chope)</td>
                <td>1 pc</td>
            </tr>
            <tr>
                <td>Café (tasse)</td>
                <td>3 pc</td>
                <td>Thé (tasse)</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <th rowspan="4">Alcoolisée</th>
            </tr>
            <tr>
                <td>Bière (chope)</td>
                <td>1 pc</td>
                <td>Bière de qualité (chope)</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <td>Vin (verre)</td>
                <td>4 pc</td>
                <td>Vin de qualité (verre)</td>
                <td>8 pc</td>
            </tr>
            <tr>
                <td>Cidre/Poiré (verre)</td>
                <td>3 pc</td>
                <td>Eau de vie/Alcool fort (verre à liqueur)</td>
                <td>2 pc</td>
            </tr>
            <tr>
                <td colspan="5">Le prix d'un tonnelet de boisson est multiplié par 8 pour les boissons vendues par chope, par 15 pour celles vendues au verre ou à la tasse, par 3 pour celle vendues au pichet.</td>
            </tr>
            <tr>
                <th colspan="5">Nuitée</th>
            </tr>
            <tr>
                <th rowspan="2">Dortoir</th>
            </tr>
            <tr>
                <td>Paillasse</td>
                <td>1 pc</td>
                <td>Lit</td>
                <td>5 pc</td>
            </tr>
            <tr>
                <th rowspan="3">Chambre individuelles</th>
            </tr>
            <tr>
                <td>Chambre simple</td>
                <td>1 pa</td>
                <td>Chambre avec baquet</td>
                <td>2 pa</td>
            </tr>
            <tr>
                <td>Suite de luxe</td>
                <td>5 pa</td>
                <td>Suite royale</td>
                <td>1 po</td>
            </tr>
            <tr>
                <th colspan="5">Services additionnels</th>
            </tr>
            <tr>
                <th rowspan="2">Montures</th>
            </tr>
            <tr>
                <td>Box dans l'écurie</td>
                <td>5 pc</td>
                <td>Nourriture et toilettage</td>
                <td>5 pc</td>
            </tr>
            <tr>
                <th rowspan="3">Hygiène et santé</th>
            </tr>
            <tr>
                <td>Lessive</td>
                <td>1 pc</td>
                <td>Baquet d'eau chaude et savon</td>
                <td>1 pa</td>
            </tr>
            <tr>
                <td>Seau d'eau et savon</td>
                <td>1 pc</td>
                <td>Guérisseur</td>
                <td>1 po</td>
            </tr>
            </tbody>
        </table>
    </div>

    <h1 id="transports" onclick="hideContent(this)">Transports</h1>
    <div>
        <p>Les transports terrestres suivent les règles indiqués dans la partie <a href="Survie.php#voyage">Survie : Voyage</a> puisque ce sont des êtres vivants qui permettent le déplacement et qu'ils ont besoin de repos.</p>
        <p>Les transports fluviaux et maritimes en revanche se déplacent grâce aux courants et/ou au vent, ce qui permet de se déplacer constamment sans pause, la vitesse de déplacement peut cependant varier selon les conditions météorologiques.</p>
        <p>Les vitesses de déplacement indiquées ci-dessous correspondent à un rythme normal pour les transports terrestres et à des conditions météorologiques classiques.</p>
        <table>
            <tbody>
            <tr>
                <th>Type</th>
                <th>Prix</th>
                <th>Vitesse</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Distance/jour</th>
            </tr>
            <tr>
                <th colspan="6">Voyage terrestre</th>
            </tr>
            <tr>
                <td>Charrette</td>
                <td>3 pc/personne/jour</td>
                <td>6</td>
                <td>Caravane</td>
                <td>5 pc/personne/jour</td>
                <td>6</td>
            </tr>
            <tr>
                <td>Carrosse</td>
                <td>1 po/personne/jour</td>
                <td>10</td>
                <td>Traîneau</td>
                <td>1 pa/personne/jour</td>
                <td>10 (neige)</td>
            </tr>
            <tr>
                <th colspan="6">Voyage fluvial</th>
            </tr>
            <tr>
                <td>Barge</td>
                <td>2 pc/personne/jour</td>
                <td>4 + courant</td>
                <td>Barque</td>
                <td>5 pc/jour</td>
                <td>6 + courant</td>
            </tr>
            <tr>
                <th colspan="6">Voyage maritime</th>
            </tr>
            <tr>
                <td>Jonque</td>
                <td>5 pc/personne/jour</td>
                <td>12</td>
                <td>Langskip</td>
                <td>5 pc/personne/jour</td>
                <td>12</td>
            </tr>
            <tr>
                <td>Ganja</td>
                <td>5 pc/personne/jour</td>
                <td>12</td>
                <td>Galion</td>
                <td>1 pa/personne/jour</td>
                <td>10</td>
            </tr>
            <tr>
                <td>Caravelle</td>
                <td>1 pa/personne/jour</td>
                <td>12</td>
                <td colspan="3"/>
            </tr>
            </tbody>
        </table>
    </div>

    <h1 id="montures" onclick="hideContent(this)">Montures</h1>
    <div>
        <table>
            <tbody>
            <tr>
                <th>Type</th>
                <th>Gabarit</th>
                <th>Vitesse</th>
                <th>Prix</th>
            </tr>
            <tr>
                <td>Cheval de trait / Dromadaire / Chameau</td>
                <td>G</td>
                <td>10</td>
                <td>30 po</td>
            </tr>
            <tr>
                <td>Cheval de course</td>
                <td>G</td>
                <td>18</td>
                <td>60 po</td>
            </tr>
            <tr>
                <td>Cheval de guerre</td>
                <td>G</td>
                <td>18</td>
                <td>100 po</td>
            </tr>
            <tr>
                <td>Âne</td>
                <td>M</td>
                <td>8</td>
                <td>5 po</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");