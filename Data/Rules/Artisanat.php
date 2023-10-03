<?php
$title = "Artisanat";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>

    <h2 style="color: darkred">Attention cette page n'est pas mise à jour d'un point de vue mécanique pour le moment mais reste disponible pour de futures mises à jour</h2>

    <h1 id="artisanat" onclick="hideContent(this)">Artisanat</h1>
    <p>Il est possible de créer de nombreux objets à partir de matériaux brutes, ce chapitre ce concentre sur les différentes techniques de fabrication.</p>

    <h2 id="alchimie" onclick="hideContent(this)">Alchimie</h2>
    <div>
        <p>L'alchimie est l'art de créer des potions, des bombes ou des huiles à partir d'ingrédients possédants des propriétés magiques. </p>
        <ul>
            <li><span class="big_underline">Potions :</span> les créations de ce type se consomment, elles peuvent être sous forme liquide et donc à boire, mais peuvent aussi prendre d'autre formes comme des gélules ou des petit cubes à avaler. Il est possible de partager une potion mais les effets seront divisés par le nombre d'entités en bénéficiant.</li>
            <li><span class="big_underline">Bombes :</span> les créations de ce type se jettent, elles sont le plus souvent sous la forme d'une petite capsule dotée d'un réservoir à poudre noire. Elles peuvent aussi prendre la forme de gaz ou de vapeurs à inhaler. Dans tout les cas, une bombe nécessite 3 doses de poudre noire en plus des ingrédients alchimiques. Elles affectent toutes les entités présentes dans un rayon de 5m et les effets pouvant être résistées par un test se font avec 2 avantages.</li>
            <li><span class="big_underline">Huiles :</span> les créations de ce type s'appliquent sur une surface, elles peuvent être liquides à condition d'être poisseuses, ou sous une forme plus solide comme un cataplasme. Il est possible de partager une huile mais les effets seront divisés par le nombre d'entités en bénéficiant.</li>
        </ul>
        <p>Les ingrédients sont classés selon deux critères : une couleur liée à celle d'un Inkarnaï qui détermine quels effets peuvent produire l'ingrédient et un degré de rareté qui détermine sa puissance. Un ingrédient alchimique est noté ainsi Nom(couleur,rareté). La couleur et la rareté d'un ingrédient sont à la discrétion du MJ.</p>
        <p>Un ingrédient alchimiques peut prendre des apparences bien diverses : fleur, champignon, racine, sève, poil, griffe, dent, coquille, poussière minérale, karnyx pur, etc...</p>
        <div style="display: flex">
            <table id="table_alchimie_couleur" style="flex: 1; padding: 3px; margin: 10px; max-width: 50%;" width="50%">
                <tbody>
                <tr>
                    <th>Couleur</th>
                    <th>Inkarnaï</th>
                </tr>
                <tr>
                    <td>Violet</td>
                    <td>Aigida</td>
                </tr>
                <tr>
                    <td>Or</td>
                    <td>Agapi</td>
                </tr>
                <tr>
                    <td>Rouge</td>
                    <td>Agones</td>
                </tr>
                <tr>
                    <td>Pourpre</td>
                    <td>Anathos</td>
                </tr>
                <tr>
                    <td>Brun</td>
                    <td>Pravoï</td>
                </tr>
                <tr>
                    <td>Gris</td>
                    <td>Eftis</td>
                </tr>
                <tr>
                    <td>Orange</td>
                    <td>Horoï</td>
                </tr>
                <tr>
                    <td>Kaki</td>
                    <td>Kormo</td>
                </tr>
                <tr>
                    <td>Vert</td>
                    <td>Kuga</td>
                </tr>
                <tr>
                    <td>Ambre</td>
                    <td>Kinygi</td>
                </tr>
                <tr>
                    <td>Cyan</td>
                    <td>Nero</td>
                </tr>
                <tr>
                    <td>Indigo</td>
                    <td>Orizo</td>
                </tr>
                <tr>
                    <td>Argent</td>
                    <td>Ourgal</td>
                </tr>
                <tr>
                    <td>Magenta</td>
                    <td>Psema</td>
                </tr>
                <tr>
                    <td>Blanc</td>
                    <td>Safi</td>
                </tr>
                <tr>
                    <td>Beige</td>
                    <td>Tychi</td>
                </tr>
                </tbody>
            </table>
            <table id="table_alchimie_rarete" class="table_horizontal" style="flex: 1; padding: 3px; margin: 10px; max-width: 50%;" width="50%">
                <tbody>
                <tr>
                    <th>Magnitude de l'effet (ME)</th>
                    <th>Degré de rareté</th>
                    <th>Valeur de l'ingrédient</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Omniprésent</td>
                    <td>1 pc</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Abondant</td>
                    <td>5 pc</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ordinaire</td>
                    <td>1 pa</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Atypique</td>
                    <td>1 po</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Rare</td>
                    <td>5 po</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Supérieur</td>
                    <td>15 po</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Exceptionnel</td>
                    <td>25 po</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Fabuleux</td>
                    <td>50 po</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Mythique</td>
                    <td>75 po</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Légendaire</td>
                    <td>100 po</td>
                </tr>
                </tbody>
            </table>
        </div>
        <p>Les effets d'une création alchimique dépendent des ingrédients utilisés lors de sa fabrication. La couleur de l'ingrédient permet de choisir un effet lié à l'Inkarnaï. La magnitude de l'effet dépendra de la rareté d'un ingrédient, plus il est rare, plus l'effet sera puissant. Une création alchimique ne peut pas contenir plus de 3 effets, ces effets peuvent être de n'importe quelle couleur et de magnitude différentes tant qu'ils ne s'annulent pas (Rage et Calme par exemple). Il est possible de combiner plusieurs effets d'assaut élémentaires dans une même création alchimique mais cela causerait une grande instabilité et risquerait d'exploser lors de la confection (si la création contient au moins 2 effets d'assaut élémentaire lancer un d20, si le résultat est inférieur ou égal à la somme des ME d'assauts élémentaire, la création explose et inflige ses effets dans un rayon de 5m.)</p>
        <p>Éviter un effet alchimique ou y résister peut nécessiter un test. Si on subit les effets d'une création alchimique sur une certaine période, il est possible d'effectuer à nouveau le test requis pour s'en libérer en dépensant son action ou sa réaction lors de son tour, chaque réitération du test est plus se fait avec un avantage de plus que la précédente et réduit l'effet selon le DR du test. Ce test peut être tenté chaque round lors d'un combat ou lorsque la durée d'effet est inférieure ou égale à une minute, chaque minute lorsque que la durée est inférieure ou égale à une heure, chaque heure lorsque la durée est inférieur ou égale à 24 heures, chaque jour sinon.</p>
        <p>Lancer une bombe compte comme une attaque à distance contre laquelle il est possible d'effectuer un test d'Esquive(Agi). En cas de réussite, si l'effet nécessite un test de Résistance on gagne un bonus de +20 supplémentaire pour ce test, si l'effet inflige des dégâts on ne subit que la moitié des dégâts, si l'effet possède une durée, elle est divisée par 2.</p>
        <p>Seuls les effets néfastes précisent que les cibles doivent résister via un test, mais si une entité refuse de se laisser affecter par un effet, elle peut tenter un test adapté (Résistance(Vig ou Vol) par exemple) pour y résister.</p>

        <h3 id="alchimie_processus" onclick="hideContent(this)">Processus de création alchimique</h3>
        <div>
            <ul style="list-style-type: decimal">
                <li><b>Choisir ses ingrédients : </b>Le créateur choisit quels ingrédients utiliser dans sa création alchimique. Il est possible d'utiliser jusqu'à 3 ingrédients différents les uns des autres. Le créateur peut utiliser des ingrédient dont la magnitude (ME) dépasse son BdInt auquel on aurait ajouté son palier de maîtrise en Métier[Alchimie] mais s'il le fait, il subit un malus de -5 pour chaque ME dépassant sa compétence.<br/>(Exemple : un personnage avec un score de 52 en Int et le palier d'Adepte en Métier[Alchimie] peut utiliser n'importe quel ingrédients d'une magnitude inférieure ou égale à 8 mais il subira un malus de -5 si l'effet est de magnitude 9 voire de -10 si l'effet est de magnitude 10).</li>
                <li><b>Choisir les effets : </b>À partir de la couleur des ingrédients, le créateur choisit quel effet chaque ingrédient va produire. La création ne peut pas comporter 2 effets contraires (Rage et Calme).</li>
                <li><b>Créer la potion : </b>Le créateur doit passer un test de Métier[Alchimie] avec un modificateur de -5 si la création compte 2 ingrédients ou de -10 si la création en compte 3. Les ingrédients choisis seront consommés en cas d'échec comme de réussite. Si le DR est supérieur ou égal à 4, une deuxième dose est créée, si le DR est supérieur à 8, une troisième, etc...<br/> Si le DR de la création est inférieur ou égal à -4, la création devient instable et explosera dans 1d4-1 round, elle libérera ses effets dans un rayon équivalent à la somme des magnitudes d'effets en mètres.</li>
                <li><b>Écrire une étiquette : </b>Le créateur indique les effets de sa création sur une étiquette attachée à la potion. Cette étape est optionnelle mais essentielle si l'on veut éviter d'avaler un poison mortel en pensant qu'il s'agit d'un tonique.</li>
            </ul>
        </div>
        <p>Qu'importe la création alchimique, les effets décris ci-dessous restent les mêmes à moins qu'il soit précisé le contraire dans la description de l'effet.</p>
        <table id="table_alchimie_effet">
            <tbody>
            <tr>
                <th>Inkarnaï</th>
                <th>Effet</th>
                <th>Description</th>
            </tr>
            <tr>
                <td rowspan="3">Aïgida</td>
                <td>Lévitation</td>
                <td>La cible obtient une vitesse de déplacement en vol de 3*ME en mètres pendant une minute.<br/><b>Bombe : </b>l'effet dure 1 round.</td>
            </tr>
            <tr>
                <td>Résistance/Vulnérabilité Foudre</td>
                <td>Résistance : La cible obtient le trait Résistance(ME,Foudre) pendant une heure.<br/>Vulnérabilité : La cible doit passer un test de Résistance(Vig ou Vol) puis subir le trait Vulnérabilité((ME-DR),Foudre) pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Assaut Foudroyant</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts de Foudre (Ignore la PR Magique).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*3 dégâts de Foudre<br/><b>Huile : </b> La surface inflige ME dégâts de Foudre supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Agapi</td>
                <td>Guérison</td>
                <td>La cible récupère ME points de vitalité temporaires.<br/><b>Bombe : </b>effet incompatible</td>
            </tr>
            <tr>
                <td>Récupération</td>
                <td>La cible supprime ME/2 niveaux de fatigue ou récupère ME points d'endurance si elle ne subit aucun niveau de fatigue.<br/><b>Bombe : </b>effet incompatible</td>
            </tr>
            <tr>
                <td>Calme</td>
                <td>La cible doit passer un test de Résistance(Vol) puis être forcée à se calmer pendant (ME-DR) heures.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Agones</td>
                <td>Renforcement/Affaiblissement [FOR, AGI, VIG]</td>
                <td>Renfort : La cible voit sa [Carac] augmenter de ME*5 pendant une heure.<br/>Affaiblissement : La cible doit passer un test de Résistance(Vig) puis voir sa [Carac] diminuée de (ME-DR)*5 pendant une heure. <br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Télékinésie</td>
                <td>Le lanceur obtient le trait <a href="Glossaire.php#telekinesiste">Télékinésiste(ME)</a> pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Rage</td>
                <td>La cible doit passer un test de Résistance(Vol) puis considérer tout le monde comme un adversaire pendant (ME-DR) minute.<br/><b>Bombe : </b>l'effet dure (ME-DR) rounds.</td>
            </tr>
            <tr>
                <td rowspan="3">Anathos</td>
                <td>Fatigue</td>
                <td>La cible doit passer un test de Résistance(Vig) puis perdre (ME-DR)*4 points d'endurance.</td>
            </tr>
            <tr>
                <td>Résistance/Vulnérabilité Nécrotique</td>
                <td>Résistance : La cible obtient le trait Résistance(ME,Nécrotique) pendant une heure.<br/>Vulnérabilité : La cible doit passer un test de Résistance(Vig ou Vol) puis subir le trait Vulnérabilité((ME-DR),Nécrotique) pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Assaut Nécrotique</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts Nécrotiques (Ignore la PR Magique).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*3 dégâts Nécrotiques<br/><b>Huile : </b> La surface inflige ME dégâts Nécrotiques supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Pravoï</td>
                <td>Armure Magique/Physique</td>
                <td>La cible obtient ME PR sur toute les localisations ou ME PR magique. L'effet dure une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Paralysie</td>
                <td>La cible doit passer un test de Résistance(Vig ou Vol) puis être immobilisée pendant (ME-DR) round.<br/><b>Bombe : </b>le test devient se fait avec un avantage.</td>
            </tr>
            <tr>
                <td>Courage</td>
                <td>La cible obtient un bonus de 10*ME aux tests de peur et d'horreur pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td rowspan="1">Eftis</td>
                <td>Renforcement/Affaiblissement Dextérité</td>
                <td>Renfort : La cible voit sa Dextérité augmenter de ME*5 pendant une heure.<br/>Affaiblissement : La cible doit passer un test de Résistance(Vig) puis voir sa Dextérité diminuée de (ME-DR)*5 pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Horoï</td>
                <td>Chaleur</td>
                <td><b>Potion</b> : La température interne de la cible augmente de ME°C pendant une heure.<br/><b>Huile</b> : La température de la surface augmente de ME*10°C pendant une minute.<br/><b>Bombe : </b>effet incompatible</td>
            </tr>
            <tr>
                <td>Résistance/Vulnérabilité Feu</td>
                <td>Résistance : La cible obtient le trait Résistance(ME,Feu) pendant une heure.<br/>Vulnérabilité : La cible doit passer un test de Résistance(Vig ou Vol) puis subir le trait Vulnérabilité((ME-DR),Feu) pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Assaut Enflammé</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts de Feu (Ignore la PR Magique).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*3 dégâts de Feu<br/><b>Huile : </b> La surface inflige ME dégâts de Feu supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="2">Kormo</td>
                <td>Sommeil</td>
                <td>La cible doit réussir un test de Résistance(Vig ou Vol) avec un modificateur de +20-(10*ME) ou s'endormir. Si la cible est en combat, ce jet se fait avec deux avantages.</td>
            </tr>
            <tr>
                <td>Assaut Terreux</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts physiques (Ignore la PR).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*4 dégâts physiques<br/><b>Huile : </b> La surface inflige ME dégâts physiques supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Kuga</td>
                <td>Résistance/Vulnérabilité [Acide,Poison]</td>
                <td>Résistance : La cible obtient le trait Résistance(ME,[Élément]]) pendant une heure.<br/>Vulnérabilité : La cible doit passer un test de Résistance(Vig ou Vol) puis subir le trait Vulnérabilité((ME-DR),[Élément]) pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Assaut Acide</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts d'Acide (Ignore la PR Magique).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*3 dégâts d'Acide<br/><b>Huile : </b> La surface inflige ME dégâts d'Acide supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td>Toxine</td>
                <td>La cible doit passer un test de Résistance(Vig ou Vol) puis subir un <a href="Glossaire.php#empoisonnement">Empoisonnement(ME-DR)</a>.</td>
            </tr>
            <tr>
                <td rowspan="1">Kynigi</td>
                <td>Renforcement/Affaiblissement Perception</td>
                <td>Renfort : La cible voit sa Perception augmenter de ME*5 pendant une heure.<br/>Affaiblissement : La cible doit passer un test de Résistance(Vig) puis voir sa Perception diminuée de (ME-DR)*5 pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td rowspan="4">Nero</td>
                <td>Adaptation aquatique</td>
                <td>La cible obtient le trait Amphibien et peut respirer normalement sous l'eau pendant ME heures.<br/><b>Bombe : </b>l'effet dure ME minute.</td>
            </tr>
            <tr>
                <td>Fraîcheur</td>
                <td><b>Potion</b> : La température interne de la cible diminue de ME°C pendant une heure.<br/><b>Huile</b> : La température de la surface diminue de ME*10°C pendant une minute.<br/><b>Bombe : </b>effet incompatible</td>
            </tr>
            <tr>
                <td>Résistance/Vulnérabilité Glace</td>
                <td>Résistance : La cible obtient le trait Résistance(ME,Glace) pendant une heure.<br/>Vulnérabilité : La cible doit passer un test de Résistance(Vig ou Vol) puis subir le trait Vulnérabilité((ME-DR),Glace) pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Assaut Gelé</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts de Glace (Ignore la PR Magique).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*3 dégâts de Glace<br/><b>Huile : </b> La surface inflige ME dégâts de Glace supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="4">Orizo</td>
                <td>Renforcement/Affaiblissement [INT, VOL]</td>
                <td>Renfort : La cible voit sa [Caractéristique] augmenter de ME*5 pendant une heure.<br/>Affaiblissement : La cible doit passer un test de Résistance(Vig) puis voir sa [Caractéristique] diminuée de (ME-DR)*5 pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Télépathie</td>
                <td>Le lanceur obtient le trait Télépathe(ME) pendant une journée.<br/><b>Bombe : </b>l'effet dure une heure.</td>
            </tr>
            <tr>
                <td>Langue enchantée</td>
                <td>La cible sait parler toutes les langues pendant ME jours.<br/><b>Bombe : </b>l'effet dure ME heures.</td>
            </tr>
            <tr>
                <td>Vision véritable</td>
                <td>La cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique pendant ME heure(s).<br/><b>Bombe : </b>l'effet dure ME minutes.</td>
            </tr>
            <tr>
                <td rowspan="2">Ourgal</td>
                <td>Transmutation</td>
                <td>La cible elle doit passer un test de Résistance(Vig ou Vol) avec un modificateur de +20-(10*ME) puis devient métallique ou minérale. Une cible métamorphosée en pierre ou en métal est invulnérable aux dégâts du temps et son poids est multiplié par 5. L'effet dure indéfiniment tant que la cible ne brise pas le sort (une tentative par jour).</td>
            </tr>
            <tr>
                <td>Assaut Minéral</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts physiques (Ignore la PR).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*4 dégâts physiques<br/><b>Huile : </b> La surface inflige ME dégâts physiques supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Psema</td>
                <td>Peur/Terreur</td>
                <td>La cible doit passer un test de Peur(+20-(10*ME)) ou de Terreur(+20-(5*ME)).</td>
            </tr>
            <tr>
                <td>Silence</td>
                <td>La cible doit passer un Test de Résistance(For, Vol ou Élo) puis être muette pendant (ME-DR) jours.<br/><b>Bombe : </b>l'effet dure (ME-DR) heures.</td>
            </tr>
            <tr>
                <td>Renforcement/Affaiblissement Éloquence</td>
                <td>Renfort : La cible voit son Éloquence augmenter de ME*5 pendant une heure.<br/>Affaiblissement : La cible doit passer un test de Résistance(Vig) puis voir son Éloquence diminuée de (ME-DR)*5 pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td rowspan="3">Safi</td>
                <td>Invisibilité</td>
                <td>La cible devient invisible pendant ME minutes.<br/><b>Bombe : </b>l'effet dure ME rounds.</td>
            </tr>
            <tr>
                <td>Résistance/Vulnérabilité Lumière</td>
                <td>Résistance : La cible obtient le trait Résistance(ME,Lumière) pendant une heure.<br/>Vulnérabilité : La cible doit passer un test de Résistance(Vig ou Vol) puis subir le trait Vulnérabilité((ME-DR),Lumière) pendant une heure.<br/><b>Bombe : </b>l'effet dure une minute.</td>
            </tr>
            <tr>
                <td>Assaut Lumineux</td>
                <td><b>Potion : </b>La cible passe un test de Vigueur puis subit (ME-DR)*5 dégâts de Lumière (Ignore la PR Magique).<br/><b>Bombe : </b>La cible passe un test d'Esquive(Agi) puis subit (ME-DR)*3 dégâts de Lumière<br/><b>Huile : </b> La surface inflige ME dégâts de Lumière supplémentaire pendant une minute.</td>
            </tr>
            <tr>
                <td rowspan="1">Tychi</td>
                <td>Destinée</td>
                <td>Permet de lancer ME d100. La cible peut utiliser un des résultats obtenus pour remplacer le résultat de n'importe quel test. (Le lanceur doit annoncer l'utilisation d'un dé pré-tiré avant que le dé ne soit lancé). Cet effet dure 24 heures.<br/><b>Bombe/Huile : </b>effet incompatible</td>
            </tr>
            </tbody>
        </table>
    </div>

<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");