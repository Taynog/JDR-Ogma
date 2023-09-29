<?php
$title = "Combat";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?> 
    <h1 id="Combat" onclick="hideContent(this)">Combat</h1>
    <div>
        <p>Le Jeu de Rôle nécessite de séparer le temps en deux catégories :</p>
        <ul>
            <li><span class="big_underline">Temps narratif :</span>Cette échelle de temps est utilisée la plupart du temps, elle permet de se libérer des contraintes temporelles, le groupe peut librement faire accélérer le temps pour éviter des passages ennuyeux du jeu ou le ralentir pour savourer un moment précis. Il peut être utilisé pour décrire le voyage par bateau du groupe ou la nuit qu'ils passent à la belle étoile tout comme il peut être utilisé lorsque l'on décrit une longue conversation entre différents personnages.
            </li>
            <li><span class="big_underline">Temps structuré :</span>Cette échelle de temps est utilisée lorsque chaque seconde compte, en combat par exemple. Il est bien sûr possible d'effectuer un combat en temps narratif mais si c'est un moment important pour le groupe, le mieux est de le faire en temps structuré. La durée des effets de la magie est donnée en temps structurés, mais il est possible de passer en temps narratif pour allonger la durée de ces sorts.
            </li>
        </ul>
        <p>Les combats se déroulent selon des rounds ou tours d'une durée de 6 secondes. Les actions effectuées par les participants du combat se déroulent au même moment, mais il faut les résoudre chacune à la fois, c'est pour cela que chacun agit lors de son tour de jeu.</p>
        <p>La durée des effets en combat est donnée en round. Si un personnage est <a href="Glossaire.php#etourdi">étourdi</a> pendant 1 round, il reprendra ses esprits exactement 1 round après avoir subi cet effet.</p>

        <h3 id="deroulement_combat" onclick="hideContent(this)">Déroulement d'un combat</h3>
        <div>
            <h4>Étape 1 : Déterminer la surprise</h4>
            <p>Si une ou plusieurs entités se retrouvent en combat sans s'y être préparés, ils sont <a href="Glossaire.php#surpris">surpris</a> : ils ne peuvent effectuer qu'un mouvement ou une action et ne peuvent pas entreprendre de <a href="Combat.xhtml#reactions">réactions</a> tant qu'ils ne sont pas prêt au combat. Dans la plupart des cas, la surprise prend fin lorsque l'entité termine son premier round mais elle peut durer plus longtemps selon les circonstances.</p>
            <h4>Étape 2 : Déterminer l'initiative</h4>
            <p>L'ordre de jeu se fait par groupe, celui des joueurs, celui des alliés et celui des ennemis. L'ordre dans lequel joue chacun de ses groupes dépend de la situation mais en règle générale, d'abord les joueurs, puis les alliés et enfin les ennemis.</p>
            <p>L'ordre d'action au sein de ses groupes n'a pas d'importance</p>
            <p><i>Note aux MJs : Cette façon de dérouler un combat n'est pas absolue, vous pouvez vous passez d'initiative et jouer de façon plus narrative ou utiliser un autre système d'initiative.</i></p>
            <h4>Étape 3 : Début du round</h4>
            <p>Chaque combattant va maintenant entreprendre son tour de jeu. Le personnage actif décide de quand son tour se termine, s'il ne peut plus rien faire son tour se termine automatiquement.</p>
            <h4>Étape 4 : Fin du tour</h4>
            <p>Lorsque tous les combattants ont joué leur tour, le tour se termine et un autre commence.</p>
            <h4>Étape 5 : Fin du combat</h4>
            <p>Les étapes 3 et 4 se répètent jusqu'à ce que le combat se termine ou que l'évènement qui a causé le passage au temps structuré prend fin.</p>
        </div>

        <h3 id="tour_de_jeu" onclick="hideContent(this)">Votre tour de jeu</h3>
        <div>
            <p>Quand c'est à votre tour de jouer, vous avez droit à un mouvement et une action. Vous pouvez aussi effectuer des actions libres dans la limite du raisonnable</p>
            <ul>
                <li><strong>Mouvement :</strong> Chaque entité possède une <a href="Personnage.php#vitesse">vitesse de déplacement</a> qui lui est propre. Cette vitesse diffère principalement selon la caractéristique d'Agilité, le type d'armure portée et le poids du matériel transporté. <br/><i>Si vous utilisez une carte tactique pour vos combats, la vitesse détermine le nombre de cases que peut parcourir votre personnage, sinon, la vitesse n'est qu'une indication générale des capacités de mouvement de votre personnage.</i></li>
                <li><strong>Action :</strong> Que ce soit pour attaquer votre adversaire, avoir recours à la magie ou escalader une paroi rocheuse, l'action de votre personnage requiert la plupart du temps d'effectuer un jet de dé. Les possibilités d'actions ne sont limitées que par votre imagination et le bon-vouloir de votre MJ.</li>
                <li><strong>Actions libres :</strong> Certaines actions s'effectuent rapidement ou sans effort, ce sont les actions libres. Vous pouvez crier quelque chose à vos alliés, boire une potion ou dégainez votre arme par exemple.</li>
            </ul>
        </div>

        <h3 id="reactions" onclick="hideContent(this)">Réactions</h3>
        <div>
            <p>Au cours d'un combat, votre personnage peut agir même lorsqu'il n'est pas le personnage actif, ces actions réalisés hors de votre tour de jeu sont appelées réactions. Vous ne pouvez effectuer qu'une réaction par round. Voici un exemple de réactions :</p>
            <ul>
                <li><b>Attaque d'opportunité :</b> Si un adversaire passe à portée de votre arme et que vous n'êtes pas déjà engagé en mêlée, vous pouvez l'attaquer.</li>
                <li><b>Tir de réaction :</b> Si vous tenez une arme à distance prête à tirer, vous pouvez choisir de viser une cible en particulier. Si votre cible se déplace dans votre champ de vision et est à portée, vous pouvez lui tirer dessus.</li>
                <li><b>Sort d'urgence :</b> Certains sorts possèdent la propriété "Réaction" et peuvent être lancé en dehors de votre tour.</li>
            </ul>
        </div>

        <h3 onclick="hideContent(this)" id="postures_combat">Postures de combat</h3>
        <div>
            <p>La posture de combat détermine l'attitude du personnage au milieu de la bataille, on ne peut changer de posture qu'au début de son tour. Les différentes postures sont :</p>
            <ul>
                <li><strong>Posture agressive :</strong> le personnage inflige au moins la moitié de son/ses dé(s) de dégâts lors de ses attaques mais sa résistance physique et magique diminue de 2.</li>
                <li><strong>Posture défensive :</strong> la résistance physique et magique du personnage augmente de 2 mais il inflige au plus la moitié de son/ses dé(s) de dégâts lors de ses attaques.</li>
                <li><strong>Posture vigilante :</strong> le personnage peut effectuer une autre réaction. Vitesse divisée par 2.</li>
                <li><strong>Posture téméraire :</strong> vitesse du personnage multipliée par 2 mais impossible d'utiliser des réactions.</li>
            </ul>
            <p>Une posture peut justifier un bonus lors de certaines actions. Si un personnage passe en posture vigilante et précise qu'il recherche des opposants cachés, le MJ peut lui accorder un ou plusieurs avantages pour son épreuve de perception.</p>
            <p>Les ennemis n'utilisent pas les postures à moins d'être des personnages importants dans le récit.</p>
        </div>

        <h3 id="style_combat" onclick="hideContent(this)">Style de combat</h3>
        <div>
            <p>Les compétences de combat sont rassemblées dans les styles de combat qui représente la façon de combattre de chaque combattant, ses armes de prédilection, ses tactiques et son expérience du combat. Les styles de combat peuvent être associés à une culture, une carrière ou même une école.</p>
            <p>Les style de combat sont représentés par la compétence : <a href="Personnage.php#style_combat_competence">Style de Combat [type]</a>, où le type est le nom du style de combat. Cette compétence est utilisée avec la caractéristique de Force ou de Dextérité pour attaquer ou se défendre en mêlée ainsi que pour les armes de jet mais doit être utilisée avec la caractéristique de Dextérité pour effectuer des attaques à distance.</p>
            <p>Chaque style de combat est associé à un certain nombre d'armes et de types d'armure avec lesquels le personnage est entraîné et apte à utiliser. Un personnage maîtrise par défaut 3 équipements différents auquel s'ajoute le palier de maîtrise de ce Style de Combat (Novice +1, Maître +5). Il est également possible d'ajouter un en dépensant un point d'XP.</p>
            <p>Le combat à mains nues peut rentrer dans un style de combat sous le terme "Pugilat". Les armes sont divisées en de multiples catégories Cf <a href="Armes.php#table_armes_cac">Armes</a>. Les boucliers ne forment qu'une seule et même catégorie malgré les différences de taille. Les armures sont divisées en quatre catégories : légère, intermédiaire, lourde et super-lourde.</p>
            <p>Utiliser de l'équipement avec lequel on manque d'entraînement ne permet pas de bénéficier de sa maîtrise de Style de Combat. Se battre dans une situation inhabituelle peut se faire avec un ou plusieurs désavantages : Un soldat habitué à se battre sur son cheval sera mal-à-l'aise s'il doit défendre sa vie face à un assassin dans sa propre maison ; un noble combattant se retrouvant malgré dans une baston de bar aura du mal à trouver ses repères malgré son habileté à l'épée.</p>
            <p>Voici quelques exemple de Style de combat :</p>
            <ul>
                <li><span class="big_underline">Style de Combat [Lame de l'ombre]</span><i>Les lames courtes sont les meilleurs outils d'un assassin</i> Équipement utilisé : Dague, Épée courte, Couteau de lancer, Pugilat, Armure légère</li>
                <li><span class="big_underline">Style de Combat [Barbare d'Urdus]</span><i>La vie dans les marais n'est pas de tout repos, il faut savoir se battre pour survivre</i> Équipement utilisé : Grande Hache, Hache, Hache de jet, Pugilat, Armure intermédiaire</li>
                <li><span class="big_underline">Style de Combat [Soldat impérial]</span><i>Les soldats des sections impériales se battent en formation pour protéger l'empire</i> Équipement utilisé : Bouclier, Lance, Épée longue, Masse, Armure lourde</li>
            </ul>
        </div>

        <h3 id="engagement" onclick="hideContent(this)">Engagement en mêlée</h3>
        <div>
            <p>Quand deux opposants ou plus se battent en mêlée, on dit qu'ils sont <b>engagés</b>. Un personnage n'est plus engagé en mêlée s'il ne fait aucune passe d'armes avec les opposants avec lesquels il est engagé ou s'il se désengage.</p>
            <p>Un combattant qui souhaite se désengager sans heurt doit d'abord remporter une passe d'armes. S'il gagne, il peut se déplacer comme il le souhaite ; s'il échoue, son adversaire l'empêche le personnage de fuir.</p>
            <p>Si un personnage engagé en mêlée se désengage sans remporter une passe d'armes, son adversaire peut tenter une attaque d'opportunité avant qu'il ne quitte sa portée, même si l'adversaire emporte la passe d'armes de l'attaque d'opportunité, les deux personnages ne sont plus engagés.</p>
        </div>

        <h3 id="passe_armes" onclick="hideContent(this)">Attaquer et se défendre : les Passes d'Armes</h3>
        <div>
            <p>Le combat est un échange de coups entre l'assaillant et le défenseur, l'assaillant étant bien souvent le personnage actif du round et le défenseur sa victime.</p>
            <p>Si l'assaillant attaque de flanc, l'attaque se fait avec un avantage, s'il attaque de dos, l'attaque se fait avec trois avantages.</p>
            <h4>Étape 1 : Attaquer</h4>
            <p>L'assaillant choisi sa cible, son style de combat et son arme avant de faire son jet d'attaque. Si l'arme choisie ne fait pas partie du style de combat choisi, le jet se base sur la Caractéristique de Force ou de Dextérité pure.</p>
            <ul>
                <li><b>Arme de mêlée et Arme de jet:</b> L'assaillant fait un test de Style de combat en utilisant la Force ou la Dextérité contre une cible à la portée de son arme.</li>
                <li><b>Arme à distance :</b> L'assaillant fait un test de Style de combat en utilisant la Dextérité contre une cible à la portée de son arme.</li>
            </ul>

            <h4>Étape 2 : Se défendre</h4>
            <p>La défense est automatique et ne coûte pas l'action du défenseur.</p>
            <p>Un personnage doit être conscient qu'il va subir une attaque et être en mesure d'agir pour pouvoir se défendre.<br/>Si la cible de l'attaque est incapable de se défendre, son jet est considéré comme nul.</p>
            <p>Le défenseur choisit la façon dont il va se défendre et le style de combat utilisé avant de faire son jet : </p>
            <ul style="list-style-type: upper-alpha">
                <li><b>Parade et contre-attaque :</b> Le défenseur passe une épreuve de Style de combat(Force ou Dextérité) s'il possède une arme capable de parer l'arme de l'assaillant. Voir <a href="Armes.php#table_armes_cac">Armes de mêlée</a> pour plus de détails sur les différentes armes.</li>
                <li><b>Blocage au bouclier :</b> Le défenseur passe une épreuve de Style de combat(Force ou Dextérité) s'il possède un bouclier et y ajoute la RB de son bouclier. Voir <a href="Armures.php#boucliers">Boucliers</a> pour plus de détails sur les différents boucliers.</li>
                <li><b>Esquive :</b> Le défenseur passe une épreuve de Style de Combat(Agilité) et y ajoute son palier d'Acrobaties (+1 si Novice,..., +5 si Maître).</li>
            </ul>
            <p>Le DC du jet de défense est équivalent au résultat de l'assaillant.</p>
            <p>Il n'est possible de se défendre des attaques à distance que via l'action d'esquive (si un abri est proche) ou de blocage et si l'on connait la direction du projectile.</p>

            <h4>Étape 3 : Déterminer le vainqueur</h4>
            <p>L'assaillant et le défenseur comparent le résultat de l'épreuve qu'ils ont choisie pour la passe d'armes. Plusieurs cas sont possibles suivants le choix du défenseur et les résultats des dés :</p>
            <ul style="list-style-type: upper-alpha">
                <li><b>Parade et contre-attaque :</b> celui ayant obtenu le meilleur résultat au jet de Style de Combat inflige les dégâts de son arme au perdant et y ajoute la différence entre son résultat et celui de son adversaire.</li>
                <li><b>Blocage au bouclier :</b> l'assaillant inflige les dégâts de son arme au défenseur et y ajoute la différence entre son résultat et celui du défenseur.</li>
                <li><b>Esquive :</b> l'assaillant inflige les dégâts de son arme au défenseur et y ajoute la différence entre son résultat et celui du défenseur. Si le défenseur ne subit aucune blessure, il peut se déplacer sur distance équivalente à sa vitesse divisée par 4 sans déclencher d'attaque d'opportunité.</li>
            </ul>

            <h4>Étape 4 : Résoudre l'attaque</h4>
            <p>Le personnage qui encaisse les dégâts subit une blessure si les dommages sont supérieurs ou égaux à sa résistance physique/magique (selon la nature des dégâts), chaque palier de 3 dégâts au-delà de sa résistance cause une blessure supplémentaire.</p>

            <p>Exemples :</p>
            <ul>
                <li>Viktor (Dextérité 1d10, Style de Combat Expert, Dégâts 1d6+2) attaque un soldat se défendant au bouclier (Force 1d8, Style de Combat Adepte, RB 3, Résistance Physique 6) : <br/>Viktor frappe avec sa rapière, il obtient un 11 (1d10 : 7 + Expert : 4). Le soldat bloque avec son bouclier et obtient un 7 (1d8 : 2 + Adepte : 2 + RB : 3). Viktor obtient 5 à son jet de dégâts et y ajoute la différence entre son jet (11) et celui du soldat (7), Viktor inflige donc 9 dégâts au soldat. <br/>Ces dégâts dépasse la Resistance Physique du soldat de 3, il subit deux blessures et tombe raide mort.</li>
                <li>Géradin (Force 1d8, Style de Combat Professionnel, Dégâts 1d8+1, Résistance Physique 6) se bat contre deux brigands (Dextérité 1d8, Style de Combat Adepte, Dégâts 1d6, Résistance Physique 4) : <br/>Le premier brigand tente une attaque, il obtient un 7 (1d8 : 5 + Adepte : 2), le jet de parade de Géradin est un 10 (1d8 : 7 + Professionnel : 3), Géradin subit un désavantage car il est engagé en mêlée avec deux adversaires de Gabarit M, il obtient 1 sur son dé de désavantage. Le résultat de Géradin vaut donc 10-1=9, il se défend avec succès et frappe son adversaire, il lance son dé de dégâts et obtient 6 (1d8 : 5 + 1), le total des dégâts subis par le brigand est 6+(9-7)=8 dégâts, cela excède sa résistance physique de 4, il subit deux blessures et s'effondre.
                    <br/>L'autre brigand lance à son tour une attaque, il fait un 9 (1d8 : 7 + Adepte 2), Géradin se défend un peu maladroitement avec un jet de 5 (1d8 : 2 + Professionnel 3), Il ne subit plus de désavantage car un de ses deux adversaires est hors de combat, l'attaque est réussie. L'arme du brigand inflige 1d6 point de dégâts et il obtient 4, on y ajoute la différence entre son jet et celui de sa cible, Géradin subit donc 4+4=8 dégâts, cela excède la résistance physique de Géradin de 2, il subit une blessure et grimace de douleur.
                    <br/>Viens enfin le tour de Géradin, il va pouvoir frapper. Il obtient un 8 (1d8 : 5 + Professionnel 3) et son dé de désavantage dû à sa blessure est un 2, son jet d'attaque est donc de 6, son adversaire fait aussi un 6. C'est une égalité parfaite, les deux opposants échangent des coups sans parvenir à trouver de faille dans la défense adverse. Le round est terminé.
                </li>
                <li>Keridian (Dextérité 1d12, Style de Combat Expert, Dégâts 1d8+3) tire à l'arc sur un cerf (Agilité 1d10, Style de Combat Adepte, Acrobaties Novice, Résistance Physique 4) : Keridian lance son jet d'attaque et fait un 6 (1d12 : 2 + Expert 4), le cerf tente de s'abriter derrière un arbre en fuyant, il obtient 10 (1d10 : 7 + Style de Combat Adepte 2 + Acrobatie Novice 1). Le jet de dégâts de Keridian vaut 5 (1d8 : 2 + 3), le cerf subit 5+(6-10) = 1 dégâts, cela ne dépasse pas sa résistance physique, la flèche se plante dans l'arbre et le cerf peut s'enfuir.</li>
            </ul>
        </div>

        <h3 id="combat_cac" onclick="hideContent(this)">Combat en mêlée</h3>
        <div>
            <h4 id="modificateur_combat_cac">Modificateurs situationnels du combat en mêlée</h4>
            <p>Comme toutes les autres épreuves, le combat en mêlée doit se faire en fonction de l'environnement et des circonstances entourant le combat. Ces modificateurs sont déterminés par le MJ et ne devrait pas être pire que 3 désavantages sauf dans des cas très particuliers. Le tableau ci-dessous montre quel genre d'évènements peut affecter le combat et à quel point.</p>
            <table id="table_modificateur_combat_cac">
                <tbody>
                <tr>
                    <th>Modificateur</th>
                    <th>Exemples</th>
                    <th>Modificateur</th>
                    <th>Exemples</th>
                </tr>
                <tr>
                    <td>1 avantage</td>
                    <td>Attaquer un adversaire plus grand que soi d'une catégorie</td>
                    <td>1 désavantage</td>
                    <td>Combattre alors que la visibilité est faible ou sur un sol boueux</td>
                </tr>
                <tr>
                    <td>2 avantages</td>
                    <td>Attaquer un adversaire à 1 contre 3</td>
                    <td>2 désavantages</td>
                    <td>Combattre en étant allongé sur le sol ou depuis une position plus basse que son opposant</td>
                </tr>
                <tr>
                    <td>3 avantages</td>
                    <td>Attaquer un adversaire de dos</td>
                    <td>3 désavantages</td>
                    <td>Combattre en étant aveugle</td>
                </tr>
                </tbody>
            </table>
            <h4 id="combat_monte">Combat monté</h4>
            <p>Le combat depuis une monture fonctionne comme le combat normal à quelques exceptions près :</p>
            <ul>
                <li>Les personnages sur monture ne peuvent pas esquiver les attaques à distance sauf s'ils sont en mouvement. Ils ne peuvent pas esquiver les attaques en mêlée (sauf celles d'autres personnages montés) mais leur monture le peut.</li>
                <li>Les personnages sur monture peuvent faire une parade ou un blocage pour protéger leur monture si elle est la cible d'une attaque de mêlée.</li>
                <li>Les personnages sur monture utilisent la vitesse de leur monture et non la leur.</li>
                <li>Un personnage effectuant une charge, c'est-à-dire une attaque précédée d'un mouvement, peut utiliser le dé de caractéristique de Force et le Gabarit de sa monture pour déterminer les dégâts.</li>
                <li>La compétence de Style de combat d'un personnage monté est limitée par sa compétence en Dressage (dans le cas où son Style de Combat est d'un plus haut rang que celui de Dressage).</li>
            </ul>
            <h4 id="combat_deux_armes">Combat à deux armes</h4>
            <p>Un personnage peut se battre avec une arme dans chaque main à condition que ces armes ne nécessitent qu'une seule main pour être maniées et qu'elles font partie du style de combat du personnage. Un personnage se battant ainsi possède une arme principale (tenue dans la main dominante) et une arme secondaire (peut être un bouclier). Il peut choisir de répartir ses attaques sur différents adversaires. <br/>Si un personnage attaque un seul adversaire avec ses deux armes, il effectue un jet pour chacune de ses armes contre un jet unique pour le défenseur.</p>
            <h4 id="combat_mains_nues">Combat à mains nues</h4>
            <div>
                <p>Le combat à mains nues peut se faire avec les armes naturelles du personnage (poings, griffes,...) mais aussi avec certains équipements comme des cestes. Tous les personnages peuvent avoir recours au combat à mains nues même s'il ne fait partie de leur style de combat.</p>
                <p>Les armes naturelles d'un personnage infligent par défaut 1d4-1 dégâts écrasants. Les Origines possédant des griffes peuvent infliger des dégâts tranchants, celles possédants des serres ou un bec peuvent infliger des dégâts perforants.</p>
                <p id="lutte"><b>Lutte :</b> Au lieu de faire une attaque classique, un personnage possédant le pugilat dans son style de combat ou la compétence Athlétisme peut lutter avec son adversaire pour tenter de le maîtriser. Pour y parvenir, il doit remporter une épreuve de Lutte (opposition entre le Style de Combat (Pugilat) ou l'Athlétisme(For ou Dex) du personnage et le Style de Combat (Pugilat), l'Athlétisme(For ou Dex) ou l'Acrobaties(Agi) de sa cible). S'il réussit, sa cible obtient l'état <a href="Glossaire.php#maitrise_paralysie">maîtrisé</a>. L'entité maîtrisée se libère si elle remporte une épreuve de Lutte.</p>
                <p>Lutter avec un adversaire plus grand que soi se fait avec 2 désavantages et il est impossible de lutter avec une entité de deux tailles supérieures à la nôtre. Tant que l'adversaire est maîtrisé l'initiateur de la Lutte possède 2 avantages sur toutes les épreuves de Lutte et ne peut pas se déplacer librement mais il peut intenter les actions suivantes :</p>
                <ul>
                    <li><strong>Plaquer au sol :</strong> Le personnage et sa cible tombent <a href="Glossaire.php#a_terre">à terre</a>. Il ne subit pas les malus bien qu'il soit à terre pour frapper sa cible.
                    </li>
                    <li><strong>Déplacement :</strong> Le personnage force sa cible à se déplacer sur une distance en mètre équivalente au DRV d'une épreuve de Lutte.</li>
                    <li><strong>Attaquer :</strong> Le personnage frappe la cible qu'il maîtrise. L'attaque est résolue comme une épreuve de Lutte. S'il le souhaite, il peut infliger des traumas physiques à sa cible plutôt que des blessures. Si la cible est à la fois <a href="Glossaire.php#a_terre">à terre</a> et <a href="Glossaire.php#maitrise_paralysie">maîtrisée</a>, la cible effectue l'épreuve de lutte avec 2 désavantages.
                    </li>
                </ul>
            </div>

            <h4 id="conditions_particulieres_combat">Conditions particulières de combat</h4>
            <p>Il arrive parfois qu'un combat ait lieu dans des circonstances peu habituelles, auquel cas, des règles spécifiques s'appliquent.</p>
            <ul>
                <li><span class="big_underline">Escalade :</span>Un personnage en train de grimper est limité dans ses jets de Style de Combat par sa compétence en Athlétisme (dans le cas où son Style de Combat est d'un plus haut rang que celui d'Athlétisme). Le personnage ne peut utiliser qu'un seul membre pour se battre, à moins d'en avoir plus.</li>
                <li><span class="big_underline">Surfaces glissantes :</span>Un personnage se battant sur une surface glissante ou peu pratique pour un combat est limité dans ses jets de Style de Combat par sa compétence en Acrobaties (dans le cas où son Style de Combat est d'un plus haut rang que celui d'Acrobaties). Si le personnage se déplace plus rapidement que la moitié de sa vitesse de déplacement, il doit passer un test d'Acrobaties ou tomber <a href="Glossaire.php#a_terre">à terre</a>.</li>
                <li><span class="big_underline">Combat aquatique</span>Un personnage se battant dans l'eau est limité dans ses jets de Style de Combat par sa compétence en Athlétisme (dans le cas où son Style de Combat est d'un plus haut rang que celui d'Athlétisme). Ses attaques infligent la moitié des dégâts seulement.</li>
                <li><span class="big_underline">Zone instable :</span>Un personnage se battant en équilibre sur une poutre ou en sautant de toits en toits est limité dans ses jets de Style de Combat par sa compétence en Acrobaties (dans le cas où son Style de Combat est d'un plus haut rang que celui d'Acrobaties). Si le personnage se déplace plus rapidement que la moitié de sa vitesse de déplacement ou s'il rate un jet de combat avec un DR de -4 ou pire dans ces conditions, il doit passer un test d'Acrobaties ou tomber <a href="Glossaire.php#a_terre">à terre</a> et subir des dégâts de chute appropriés.</li>
            </ul>
        </div>
        <h3 id="combat_distance">Combat à distance</h3>
        <div>
            <p>Les attaques à distance sont résolues de la même façon que les attaques en mêlée à ceci près qu'elles ne peuvent être que bloquées grâce à un bouclier ou esquivées si un abri est proche.</p>
            <p>Les armes à distance possède plusieurs propriétés les différenciant des armes de mêlée :</p>
            <ul>
                <li><span class="big_underline">Portée :</span>Définie par deux nombres indiquant respectivement la portée effective de l'arme. Atteindre une cible située dans la portée effective d'un arme se fait sans pénalités mais une cible située en dehors de cette portée se fait avec un nombre de désavantages croissant plus la cible est éloignée.</li>
                <li><span class="big_underline">Rechargement :</span>Représente le nombre d'actions à effectuer pour pouvoir tirer à nouveau avec cette arme. Un personnage peut dépenser son action et son mouvement pour recharger son arme.</li>
            </ul>
            <p>Comme toutes les autres épreuves, le combat à distance doit se faire en fonction de l'environnement et des circonstances entourant le combat. Ces modificateurs sont déterminés par le MJ et ne devrait pas être pire que 3 désavantages sauf dans des cas très particuliers. Le tableau ci-dessous montre quel genre d'évènements peut affecter le combat et à quel point.</p>
            <table id="table_modificateur_combat_distance">
                <tbody>
                <tr>
                    <th>Modificateur</th>
                    <th>Exemples</th>
                    <th>Modificateur</th>
                    <th>Exemples</th>
                </tr>
                <tr>
                    <td>1 avantage</td>
                    <td>Tirer dans un petit groupe (3-5 individus)</td>
                    <td>1 désavantage</td>
                    <td>Tirer par vent léger, par temps de pluie</td>
                </tr>
                <tr>
                    <td>2 avantages</td>
                    <td>Tirer sur une cible de Très Grande taille ou un grand groupe (5-10 individus)</td>
                    <td>2 désavantages</td>
                    <td>Tirer sur une cible allongée sur le sol</td>
                </tr>
                <tr>
                    <td>3 avantages</td>
                    <td>Tirer à bout portant ou dans une foule(+ de 10 individus)</td>
                    <td>3 désavantages</td>
                    <td>Tirer par vent très fort, par temps de brouillard</td>
                </tr>
                </tbody>
            </table>
            <h4 id="tirer_depuis_monture">Tirer depuis une monture</h4>
            <p>Un personnage peut tirer depuis sa monture, il est cependant limité par la compétence de Dressage de la personne dirigeant la monture (dans le cas où son Style de Combat est d'un rang plus élevé que celui de Dressage du pilote).</p>
            <h4 id="abri">Abri</h4>
            <p>Un personnage peut se mettre à couvert pour éviter de se faire toucher par un adversaire, que ce soit en mêlée ou à distance. Dans ce cas, le tireur subit un nombre de désavantages relatif à la qualité de la couverture de sa cible.</p>
            <p>Si un personnage n'a pas de ligne de tir sur sa cible, mais qu'il sait où elle se trouve et qu'il possède une arme capable de transpercer ce derrière quoi se cache sa cible, il peut tenter une attaque. Le MJ décide de la difficulté de la tâche en fonction de la situation.</p>
        </div>

        <h3 id="blessures_mort" onclick="hideContent(this)">Blessures et mort</h3>
        <div>
            <p>Une entité qui subit des dégâts physiques/magiques excédant sa résistance physique/magique subit une blessure. Pour chaque palier de 3 au-delà de sa résistance, l'entité subit une blessure supplémentaire.</p>
            <p>Chaque blessure impose un désavantage sur tous les tests. Une entité avec 3 blessures subit donc 3 désavantages à tous ses jets de dés.</p>
            <p>Les personnages importants du récit comme les joueurs tombent <a href="Glossaire.php#inconscient">inconscients</a> et sont considérés comme <a href="Glossaire.php#mourant">mourants</a> si le résultat du jet de Vigueur/volonté nécessaire après avoir subi une blessure est inférieur ou égal à 0. Les personnages mineurs meurent après avoir subi un certain nombre de blessures.</p>
            <p>Un personnage inconscient et mourant doit passer un test de Vigueur DC 1 par minute ou à chaque fois qu'il subit des dégâts, après 3 échecs il meurt. Après 3 réussites l'intervalle entre chaque jet passe à une heure, après 3 autres réussites, l'entité devient stable et n'est plus mourante.</p>
            <p>Sans aide extérieur, les chances de survie d'un personnage mourant sont faibles, mais un autre personnage peut le stabiliser à l'aide de magie ou de matériel médical (trousse de soins, potions, plantes médicinales,...). Un personnage stable redevient conscient après 2d6 - la moitié du dé de Vigueur/Volonté du personnage.</p>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");