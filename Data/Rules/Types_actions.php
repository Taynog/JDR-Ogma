<?php
$title = "Types d'actions";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?> 
    <h1 id="actions_principales" onclick="hideContent(this)">Actions principales</h1>
    <div>
        <p>Les actions principales ne peuvent être effectuées que lors de son propre tour. Toutes les actions principales coûtent 1 PA sauf précisé autrement.</p>
        <h2 id="attaquer" onclick="hideContent(this)">Attaquer</h2>
        <div>
            <p>Le personnage peut effectuer une attaque avec une arme de mêlée ou à distance. Un personnage ne peut pas attaquer plus de 2 fois dans un seul round. Il est possible de choisir une de ces variations lorsque l'on effectue une attaque, le joueur doit annoncer qu'il souhaite utiliser une de ces variations avant d'effectuer son jet.</p>
            <ul>
                <li id="enchainement"><span class="big_underline">Enchainement (mêlée uniquement) :</span>l'attaquant enchaîne les coups pour submerger son adversaire. L'attaque est effectuée avec avantage mais elle coûte un PA supplémentaire.</li>
                <li id="coup_de_grace"><span class="big_underline">Coup de Grâce :</span>l'attaquant tente d'achever un adversaire sans défense. Une cible sans défense est une entité qui est soit <a href="Glossaire.php#inconscient">inconsciente</a>, soit <a href="Glossaire.xhtmlmaitrise_paralysie">maîtrisé</a> et <a href="Glossaire.php#a_terre">à terre</a> ou incapable de se défendre par elle même. Le MJ peut déclarer qu'un personnage ne peut pas mourir de tel façon. Si l'attaque porte, la cible meurt automatiquement. Cette acton coûte un PA supplémentaire</li>
                <li id="frappe_de_precision"><span class="big_underline">Frappe de précision :</span>l'attaquant vise une zone précise de son adversaire. L'attaque se fait avec un malus de -20 mais si elle porte, l'attaquant peut choisir la zone touchée.</li>
            </ul>
        </div>
        <h2 id="lancer_sort" onclick="hideContent(this)">Lancer un sort</h2>
        <p>Le personnage peut se concentrer et lancer un sort. Il est possible d'utiliser cette action pour lancer un sort d'attaque mais un personnage ne peut pas attaquer plus de 2 fois par round.</p>
        <h2 id="repousser" onclick="hideContent(this)">Repousser</h2>
        <p>Le personnage fait un jet d'Athlétisme ou de Style ce Combat (Pugilat) opposé à celui d'Athlétisme, d'Esquive ou de Style de Combat (Pugilat) de son adversaire. S'il réussit sa cible recule d'un mètre (+1m par 2 de différence entre le BdFor du personnage et celui de la cible), perd un PA et doit passer un test d'Acrobaties ou tomber <a href="Glossaire.php#a_terre">à terre</a>. La cible ne peut pas être de taille supérieure au personnage et doit être située à 2 mètres ou moins. </p>
        <h2 id="desarmer" onclick="hideContent(this)">Désarmer</h2>
        <p>Le personnage fait un jet d'Athlétisme ou de Style de Combat (Pugilat) opposé à celui d'Athlétisme ou Style de Combat de l'adversaire. Si la cible perd le duel son arme tombe à 1d4 mètres dans une direction aléatoire. La cible ne peut pas être plus d'une taille supérieure au personnage et située à 2 mètres ou moins. Si le personnage possède une main libre, il peut dérober l'arme de son adversaire.</p>
        <h2 id="deplacement_force" onclick="hideContent(this)">Déplacement forcé</h2>
        <p>Le personnage fait un jet de Style de Combat opposé au Style de Combat de l'adversaire. Si le personnage gagne le duel, il peut déplacer sa cible avec lui sur un maximum de trois mètres dans n'importe quelle direction (à condition de posséder encore 6 mètres ou plus de mouvement pour ce tour). La cible ne peut pas être plus d'une taille supérieure au personnage et située à portée de l'arme de mêlée du personnage.</p>
        <h2 id="desengager" onclick="hideContent(this)">Désengager</h2>
        <p>Le personnage peut battre en retraite et de sortir de la zone de contrôle de son adversaire si il parvient à se défendre de l'attaque d'opportunité de l'adversaire.</p>
        <h2 id="attendre" onclick="hideContent(this)">Attendre</h2>
        <p>Le personnage peut choisir d'attendre et décider de jouer son tour après un certain moment. Cette action doit être la première action entreprise par le personnage au début de son tour (il peut tout de même se déplacer avant d'attendre).</p>
    </div>

    <h1 id="actions_secondaires" onclick="hideContent(this)">Actions secondaires</h1>
    <div>
        <p>Les actions suivantes peuvent être effectués pendants son tour ou celui de quelqu'un d'autre en tant que réaction. Toutes les actions secondaires coûtent 1 PA sauf précisé autrement.</p>
        <h2 id="course" onclick="hideContent(this)">Course</h2>
        <p>Cette action permet au personnage de se déplacer sur une distance équivalente à sa vitesse. Si l'action est utilisée pendant son tour, elle permet d'ajouter ce déplacement à sa vitesse pour le tour. Utilisée en tant que réaction, elle permet de se déplacer pendant le tour d'un autre. Cette action peut être utilisée pour se déplacer sur une plus grande distance que le permettrait sa vitesse de base.</p>
        <h2 id="lancer_sort_non_offensif" onclick="hideContent(this)">Lancer un sort non offensif</h2>
        <p>Le personnage peut se concentrer et lancer un sort. Il est impossible d'utiliser cette action pour lancer un sort d'attaque.</p>
        <h2 id="viser" onclick="hideContent(this)">Viser</h2>
        <p>Le personnage peut dépenser un point d'action pour obtenir un bonus de +10 pour la prochaine attaque à distance. Cette action peut se cumuler avec elle même un maximum de trois fois (pour un bonus de +30). Le bonus reste actif entre les rounds et n'est perdu que si le personnage fait une action autre que viser ou attaquer la même cible.</p>
        <h2 id="se_cacher" onclick="hideContent(this)">Se cacher</h2>
        <p>Le personnage peut tenter de se dissimuler dans l'environnement. Si il peut être détecter par quelqu'un en effectuant cette action, il doit passer un test de Furtivité opposé à un test d'Observation. Si il réussit ce test, il gagne l'état <a href="Glossaire.php#cache">caché</a>.</p>
        <h2 id="aveugler" onclick="hideContent(this)">Aveugler</h2>
        <p>Le personnage fait un test de Style de Combat opposé à celui d'Esquive ou de style de Combat (Bouclier) de son adversaire. Si la cible perds le duel, elle est <a href="Glossaire.php#aveugle">aveuglée</a> pendant 1 round. Le personnage doit avoir accès à quelques chose pouvant aveugler son adversaire (du sable ou de la terre par exemple). </p>
        <h2 id="resister" onclick="hideContent(this)">Résister</h2>
        <p>Le personnage passe une épreuve d'Athlétisme ou de Style de Combat (Pugilat) opposée à celui d'Athlétisme ou de Style de Combat (Pugilat) de son adversaire. Si le personnage réussit, il se libère de l'emprise de son adversaire et n'a plus l'état <a href="Glossaire.php#maitrise_paralysie">maitrisé</a>.</p>
        <h2 id="rouler" onclick="hideContent(this)">Rouler</h2>
        <p>Le personnage passe un test d'Acrobaties, s'il réussit il effectue une roulade pour se relever rapidement sans provoquer d'attaque d'opportunité. S'il se relève ainsi, il consomme tout de même la moitié de son mouvement.</p>
        <h2 id="preparer_objet_arme" onclick="hideContent(this)">Préparer un objet/une arme</h2>
        <p>Le personnage peut dégainer, rengainer, ranger ou recharger une arme. Le personnage peut aussi utiliser cette action pour sortir un objet de son sac et le consommer. Dans le cas d'un objet, il faut d'abord le sortir du sac (sauf s'il accessible facilement) ce qui coûte 1 PA, puis l'utiliser ce qui coûte 1 PA également. Dans le cas d'une potion, sa consommation coûte 2 PA.</p>
    </div>

    <h1 id="reactions" onclick="hideContent(this)">Réactions</h1>
    <div>
        <p>Les réactions peuvent être utilisés à n'importe quel moment au cours du round en réponse à une menace ou suite à un certain évènement si on possède les PA pour agir. Toutes les réactions coûtent 1 PA sauf précisé autrement.</p>
        <h2 id="attaque_opportunite" onclick="hideContent(this)">Attaque d'opportunité</h2>
        <div>
            <p>Cette réaction permet au personnage de prendre avantage d'une faille dans la garde de son adversaire pour l'attaquer. Les attaques d'opportunités compte dans le maximum de 2 attaques par tour et sont résolues avant l'action qui les a déclenchées. Il est possible d'effectuer une attaque d'opportunité avec une arme à distance sur une cible que l'on <a href="Types_actions.xhtml#viser">vise</a>. Une attaque d'opportunité peut être déclenchés par les évènements suivants :</p>
            <ul>
                <li><span class="big_underline">Retraite :</span>Quand un adversaire bat en retraite et tente de sortir de votre zone de contrôle.</li>
                <li><span class="big_underline">Approche :</span>Quand un adversaire s'approche de vous tout en étant dans votre zone de contrôle ou quand il rentre dans votre zone de contrôle.</li>
                <li><span class="big_underline">Invocation :</span>Quand un adversaire tente de lancer un sort en étant dans votre zone de contrôle (sauf si le sort compte comme une attaque de mêlée).</li>
                <li><span class="big_underline">Se relever :</span>Quand un adversaire <a href="Glossaire.php#a_terre">à terre</a> se relève en étant dans votre zone de contrôle.</li>
                <li><span class="big_underline">Attaque à distance :</span>Quand un adversaire fait une attaque à distance dans votre zone de contrôle (sauf s'il lance une arme de jet).</li>
                <li><span class="big_underline">Préparation :</span>Quand un adversaire dégaine ou rengaine une arme ou quand il sort, range ou utilise un objet de son sac. (Si le personnage fait une de ces actions comme une action libre alors il n'est pas possible de l'attaquer ainsi).</li>
            </ul>
        </div>
        <h2 id="bloquer" onclick="hideContent(this)">Bloquer</h2>
        <p>Le personnage utilise son bouclier pour bloquer une attaque de mêlée ou à distance.</p>
        <h2 id="parer" onclick="hideContent(this)">Parer</h2>
        <p>Le personnage dévie une attaque de mêlée avec son arme ou son bouclier.</p>
        <h2 id="contre_attaquer" onclick="hideContent(this)">Contre-Attaquer</h2>
        <p>Le personnage effectue une parade suivi d'un contre avec son arme. Cette action coûte 2 PA et entre dans la limite des 2 attaques maximum par tour. Cette action coûte 2 PE.</p>
        <h2 id="esquiver" onclick="hideContent(this)">Esquiver</h2>
        <p>Le personnage esquive une attaque de mêlée ou à distance. Cette action coûte 2 PE.</p>
    </div>

    <h1 id="actions_libres" onclick="hideContent(this)">Actions libres</h1>
    <p>Les actions libres peuvent être effectuées n'importe quand lors d'un combat. Ce sont des actions du type : parler, lâcher un objet, observer ses alentours, etc...</p>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");