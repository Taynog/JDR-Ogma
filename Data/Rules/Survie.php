<?php
$title = "Survie";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?> 
    <h1 id="Survie" onclick="hideContent(this)">Survie</h1>
    <div>
        <p>Partir à l'aventure n'est pas chose aisée, on risque gros si l'on néglige les nombreux risques des terres sauvages éloignées de toute civilisation. Un groupe d'aventuriers mal préparé s'expose aux climats difficiles, à la famine et à la soif, aux bêtes et monstres affamés.</p>

        <h2 id="capacite_port" onclick="hideContent(this)">Capacité de port</h2>
        <div>
            <p>Les objets voient leur poids et leur volume représenté par des unités d'encombrement (ENC). Pour ordre d'idée, un objet d'ENC 1 est suffisamment petit et léger pour être manipulé à une main. Certains objets plus petits ont un encombrement de 0 sauf s'ils sont présents en grande quantité.</p>
            <p>L'encombrement est relatif à la créature qui manipule l'objet, une épée à deux mains Steinn est un couteau à champignons pour un géant. Lorsqu'un objet change de propriétaire et que le nouveau n'est pas du même gabarit que l'ancien, l'encombrement de l'objet diminue ou augmente d'un cran par gabarit d'écart.</p>
            <p>Une entité possède 6 emplacements d'inventaire par défaut. Chaque emplacement peut contenir un total de 3 unités d'encombrement. Un emplacement utilisé doit être nommé pour savoir où il se trouve sur le personnage, ce peut être une ceinture, un sac à dos, une bandoulière, une sacoche à ingrédients, etc...</p>
            <p>Plusieurs emplacement d'inventaire peuvent être représentés par le même conteneur. Par exemple, un sac à dos peut occuper 3 emplacements et contenir un total de 9 unités d'encombrement.</p>
            <p>Porter une armure réduit le nombre d'emplacements d'inventaire disponibles, l'armure légère le réduit de 1, la moyenne le réduit de 2, lourde de 3 et super-lourde de 4.</p>
            <p>Il est possible d'excéder cette limite de 6 emplacements, pour chaque emplacement supplémentaire, la vitesse du personnage diminue de 2 et il subit un désavantage pour tous les tests de Force, Dextérité et Agilité.</p>
        </div>

        <h2 id="besoins_journaliers" onclick="hideContent(this)">Besoins journaliers</h2>
        <div>
            <h3 id="manger">Manger et boire</h3>
            <p>Un personnage a besoin d'au moins 500 g de nourriture par jour et peut faire durer sa réserve de nourriture plus longtemps en ne mangeant que des demi-rations. Manger 250 g de nourriture par jour compte comme un demi-jour sans nourriture.</p>
            <p>Un personnage peut survivre sans nourriture pendant 3 jours. À la fin de chaque jour au-delà de cette limite, un personnage souffre automatiquement d'un niveau d'épuisement. Un jour passé en ayant mangé normalement remet le compteur de jours sans nourriture à zéro.</p>
            <p>Un personnage a besoin de 1,5 litres d'eau par jour par température normale, de 3 litres s'il fait chaud ou de 5 s'il fait très chaud. Un personnage qui boit seulement la moitié de cette quantité d'eau doit réussir un jet de Vigueur ou gagner un niveau de <a href="Glossaire.php#fatigue">fatigue</a>. Un personnage qui boit encore moins d'eau que cela gagne automatiquement un niveau de <a href="Glossaire.php#fatigue">fatigue</a>.</p>
            <p>Les quantités données ici le sont pour des personnages de taille Moyenne, un personnage de taille inférieure aura besoin de 25% moins par catégorie de taille en dessous de Moyenne, un personnage de taille supérieure aura besoin de 100% plus par catégorie de taille au-dessus de Moyen.</p>

            <h3 id="dormir">Dormir</h3>
            <p>Aussi héroïques qu'ils puissent être, les aventuriers ne peuvent passer les 24 heures d'une journée dans le feu de l'action de l'exploration, des interactions sociales ou des combats. Ils doivent se reposer, c'est-à-dire prendre du temps pour dormir et manger, panser leurs plaies, se reposer l'esprit. Les aventuriers, comme toutes autres créatures, peuvent se reposer au milieu d'une journée d'aventure et établir un camp pour dormir en fin de journée.</p>

            <h4 id="repos_court">Repos court</h4>
            <p>Un repos court est une période de temps mort qui dure au moins 1 heure, et durant laquelle un personnage ne fait rien de plus demandant que manger, boire, lire ou panser ses plaies. Au terme d'un repos court, un personnage récupère naturellement BdVol+BdInt points de psy et peut choisir de récupérer un point d'endurance ou de supprimer un niveau de fatigue. Ces quantités peuvent varier selon les conditions du repos, si l'on utilise des sorts ou si l'on consomme certains aliments ou potions.</p>

            <h4 id="repos_long">Repos long</h4>
            <p> Un repos long est un période d'au moins 8 heures se déroulant dans un environnement calme et relativement sécurisé comme un campement. Au terme d'un repos long, un personnage récupère l'intégralité de sa psy et de son endurance ainsi que BdVig points de vitalité. La quantité de vitalité récupérée peut varier selon les conditions du repos, si l'on utilise des sorts ou si l'on consomme certains aliments ou potions.</p>
            <h4 id="interlude_aventures">Interlude entre aventures</h4>
            <p>Entre deux aventures, il est normal que des aventuriers souhaitent se reposer pendant plusieurs jours pour évacuer le stress et la pression accumulés lors de leurs péripéties. Un interlude se déroule la plupart du temps dans un lieu civilisé mais peut tout à fait prendre place ailleurs, sa durée varie en fonction des besoins narratifs du MJ et des envies des joueurs. C'est pendant cette période que les personnages peuvent s'entraîner pour acquérir de nouvelles compétences ou améliorer leurs caractéristiques. On considère qu'au terme d'un interlude, un personnage récupère l'intégralité de son endurance, psy et vitalité.</p>

            <h3 id="alcool" onclick="hideContent(this)">Alcool</h3>
            <div class="hidden">
                <p>La consommation d'alcool est quelque chose à surveiller, si un peu de boisson peu faciliter les relations sociales, à de trop fortes doses, il peut nuire au consommateur abusif. Un aventurier tolère l'alcool comme tout un chacun, au-delà d'une certaine limite, ses capacités cognitives commencent à faiblir jusqu'au point où le corps lui-même s'effondre. Les doses d'alcool sont perdues au rythme d'une par heure.</p>
                <div style="display: flex">
                    <table style="flex: 1; padding: 3px; margin: 10px; width: 60%;">
                        <tbody>
                        <tr>
                            <th style="width: 30%">Doses d'alcool ingérées</th>
                            <th>Effet sur le personnage (cumulatifs)</th>
                        </tr>
                        <tr>
                            <td>Échauffé : 1 à 3</td>
                            <td>1 avantages aux tests d'ELO</td>
                        </tr>
                        <tr>
                            <td>Enivré : 4 à 6</td>
                            <td>2 avantages aux tests d'ELO<br/> 1 désavantages aux tests d'INT, VOL et Style de Combat</td>
                        </tr>
                        <tr>
                            <td>Ivre : 7 à 9</td>
                            <td>1 avantages aux tests d'ELO<br/> 2 désavantages aux tests d'INT, VOL et Style de Combat<br/> 1 désavantage aux tests de DEX, AGI et PER</td>
                        </tr>
                        <tr>
                            <td>Ivre mort : au-delà de 10</td>
                            <td>3 désavantages aux tests d'INT, VOL et Style de Combat<br/> 2 désavantage aux tests de DEX, AGI et PER</td>
                        </tr>
                        </tbody>
                    </table>
                    <table style="flex: 1; padding: 3px; margin: 10px; width: 40%;">
                        <tbody>
                        <tr>
                            <th>Type de boisson</th>
                            <th>Dose d'alcool</th>
                        </tr>
                        <tr>
                            <td>Verre de bière</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Verre de vin, de poiré ou de cidre/Chope de bière</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Verre à liqueur d'alcool fort, d'eau de vie</td>
                            <td>3</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <h2 id="voyage" onclick="hideContent(this)">Voyage</h2>
        <div>
            <p>Lorsqu'une entité se déplace sur de longues distances, la distance parcourue par jour dépend de sa vitesse et de son rythme de voyage. Si l'entité utilise une <a href="Objets.php#montures">monture</a> pour se déplacer alors elle utilise la vitesse de déplacement de sa monture plutôt que la sienne.</p>
            <p>Il est possible de parcourir plus de distance en utilisant <a href="Objets.php#transports">un transport</a> tel qu'un bateau ou un carrosse.</p>
            <p>Le terrain peut modifier la vitesse de déplacement : -25% dans les forêts et collines, -50% dans les montagnes et marécages</p>
            <p>Si une entité se déplace plus que le temps maximum à un certain rythme, elle doit passer un test d'Athlétisme(Vigueur) DC 4 ou subir un trauma physique. Le DC de ce test augmente de 1 à chaque itération et revient à 0 après un repos long.</p>
            <p>Si le rythme de déplacement change au cours de la journée, une heure au rythme rapide équivaut à deux heures au rythme soutenu et une heure au rythme soutenu équivaut à deux heures au rythme normal.</p>
            <table>
                <tbody>
                <tr>
                    <th>Rythme de marche</th>
                    <th>Vitesse de déplacement (km/h)</th>
                    <th>Temps maximum à ce rythme par jour</th>
                    <th>Fréquence des jets de résistances à la fatigue</th>
                </tr>
                <tr>
                    <td>Rythme normal</td>
                    <td>Vitesse/2</td>
                    <td>8 heure</td>
                    <td>1 heure</td>
                </tr>
                <tr>
                    <td>Rythme soutenu</td>
                    <td>Vitesse</td>
                    <td>3 heures</td>
                    <td>30 minutes</td>
                </tr>
                <tr>
                    <td>Rythme rapide</td>
                    <td>Vitesse*2</td>
                    <td>1 heure</td>
                    <td>10 minutes</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 id="eclairage" onclick="hideContent(this)">Éclairage</h2>
        <div>
            <p>Pour contrecarrer les ténèbres, il est possible de s'armer de différentes sources de lumière allant de la simple bougie à l'incantation de Safi. Toutes les sources lumineuses n'éclairent pas de la même façon : la lumière vive permet de voir distinctement, au-delà du rayon de lumière vive et jusqu'à celui de lumière faible, on ne peut distinguer que les structures et les objets les plus volumineux.</p>
            <table>
                <tbody>
                <tr>
                    <th rowspan="2">Source de lumière</th>
                    <th rowspan="2">Zone d'éclairage</th>
                    <th colspan="2">Portée (en mètres)</th>
                    <th rowspan="2">Durée de vie/Consommation</th>
                </tr>
                <tr>
                    <th>Lumière vive</th>
                    <th>Lumière faible</th>
                </tr>
                <tr>
                    <td>Allumette</td>
                    <td>Circulaire</td>
                    <td>1</td>
                    <td>3</td>
                    <td>20 s / 3 rounds</td>
                </tr>
                <tr>
                    <td>Bougie</td>
                    <td>Circulaire</td>
                    <td>3</td>
                    <td>8</td>
                    <td>2 heures</td>
                </tr>
                <tr>
                    <td>Lampe</td>
                    <td>Circulaire</td>
                    <td>3</td>
                    <td>8</td>
                    <td>Un flasque d'huile toute les 8 heures</td>
                </tr>
                <tr>
                    <td>Torche</td>
                    <td>Circulaire</td>
                    <td>10</td>
                    <td>25</td>
                    <td>1 heure</td>
                </tr>
                <tr>
                    <td>Lanterne</td>
                    <td>Circulaire</td>
                    <td>15</td>
                    <td>35</td>
                    <td>Un flasque d'huile toute les 4 heures</td>
                </tr>
                <tr>
                    <td>Lanterne sourde</td>
                    <td>Conique (90°)</td>
                    <td>25</td>
                    <td>60</td>
                    <td>Un flasque d'huile toute les 4 heures</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 id="environnement" onclick="hideContent(this)">Environnement</h2>
        <div>
            <h3 id="biomes" onclick="hideContent(this)">Biomes</h3>
            <div>
                <p>Le monde d'Ogma est parsemé de biomes différents, certains sont cléments d'autres beaucoup moins. Il est possible de trouver de la nourriture et de l'eau potable dans la plupart de ceux-ci, mais la tâche est plus ardue dans une montagne gelée balayée par des blizzards plutôt que dans une plaine paisible.</p>
                <h4>Steppes</h4>
                <div>
                    <p>Ce biome est assez répandu dans Ogma, souvent situé entre d'autres biomes plus particuliers tels que des forêts ou des montagnes. C'est dans ces endroits que la majorité de la civilisation s'est développée, l'accès à l'eau douce y est simple pour peu que l'on s'installe à proximité d'un cours d'eau ou d'un lac. Il est possible d'y faire de l'élevage ou de l'agriculture sans trop de difficultés. Le climat est doux au printemps, chaud en été et assez froid en hiver, avec suffisamment de précipitations pour assurer de la verdure sur la majorité du biome. Le Royaume Sever s'étend sur de grandes steppes, ne s'installant qu'au bord des fleuves et rivières, le nord du Sultanat est organisé de la même manière. La Vallée sauvage est plus sèche et infestée de Chonos, la vallée fabuleuse plus humide que cette dernière mais habité par les Sakhas.</p>
                    <p>La survie dans ce genre d'environnement n'est pas bien difficile, on y trouve quantité d'animaux paisible à chasser, des plantes comestibles et médicinales, de l'eau sans trop avoir à chercher. La civilisation n'est jamais bien loin, les créatures dangereuses y sont donc assez rares.</p>
                </div>

                <h4>Marécages</h4>
                <div>
                    <p>Les Marécages d'Urdus sont un phénomène très intéressant, cette partie de Nashira est en dessous du niveau de la mer et est donc constamment inondé par les précipitations. Le sol est constamment gorgé d'eau les créatures y vivants se sont adaptés en devenant amphibiennes ou ne se developpe que dans les endroits les plus secs. La vie est difficile est difficile dans de telles conditions, c'est pourquoi on ne retrouve que peu de créatures véritablement paisibles, la plupart étant capables de se défendre contre les menaces des marais.</p>
                    <p>La plus grande menace des marécages réside dans l'instabilité des sols, il faut constamment prêter attention aux endroits traîtres des marais sous peine de s'embourber dans une tourbière ou pire, la tanière d'un monstre. La nourriture est rare et l'eau souvent insalubre, rendant ces lieux inhospitaliers pour les aventuriers inexpérimentés.</p>
                </div>


                <h4>Forêts tempérés</h4>
                <div>
                    <p>La forêt de Marmur et le bois de l'Ombre en sont de très bons représentants. Ces régions boisées et les terres environnantes possèdent un climat assez agréable ni trop chaud en été, ni trop froid en hiver.</p>
                    <p>Il est difficile de se déplacer dans une forêt si l'on sort des sentiers battus, on risque aussi de tomber nez à nez avec des créatures dangereuses vivants au plus profonds de la forêt telles que les Sakhas. Si l'on connaît quelques méthodes de chasses, on peut rapidement trouver du gibier comestible et délicieux, les points d'eau sont plus difficiles à trouver, il faut se contenter de minuscules ruisseaux d'eau claire.</p>
                </div>

                <h4>Toundra</h4>
                <div>
                    <p>Ces terres gelées ne se situent qu'aux zones les plus au nord de Nashira et îles environnantes. Les températures extrêmement basses font régner en ces lieux un permafrost gelant les sols sur les premiers centimètres ce qui limite grandement la pousse des plantes. Les toundras reçoivent peu de précipitations mais le manque d'évaporation rend les terres légèrement marécageuses.</p>
                    <p>Ces lieux sont inhospitalier, le manque de nourriture et d'eau liquide limite grandement la biodiversité. Les seuls animaux vivants dans ces régions s'y sont adaptés et sont donc fondamentalement différents des autres origines d'Ogma.</p>
                </div>

                <h4>Forêts boréales</h4>
                <div>
                    <p>Ces forêts remplies de conifères doivent supporter la neige plutôt que la pluie. La Forêt Blanche tire son nom de l'épais manteau blanc la recouvrant une grande partie de l'année, le Bois de cristal n'est enneigé que lors des hivers les plus rudes. Le climat est assez froid, il n'y pleut qu'en été, limitant la végétation à de grands arbres capables de résister aux basses températures et de puiser l'eau en profondeur.</p>
                    <p>La progression est plus aisée dans une forêt boréale que dans les autres types de forêt, le manque de buisson et d'arbustes dans les sous bois accorde une meilleure visibilité bien que la cime des arbres bloquent souvent une bonne partie de la lumière des astres. La faune se fait plus rare dans ces forêts, s'abritant la plupart du temps sous terre ou cachée dans les plus hautes branches. Les bêtes y rôdant possèdent souvent une épaisse couche de graisse et de fourrure ce qui les rend difficile à abattre. L'eau est présente majoritairement sous sa forme solide, dans de petits étangs gelés par le froid</p>
                </div>

                <h4>Hautes Montagnes</h4>
                <div>
                    <p>Lorsque le relief devient trop important et l'altitude trop élevée, la faune et la flore se font plus rares jusqu'à devenir inexistantes sur les plus hauts pics. Qu'elles soient enneigées comme la Chaîne d'Hortak ou brûlantes comme les Monts Ardents, ces montagnes sont le territoire des Steinns et bien rares sont les autres factions à s'y être installés</p>
                    <p>Le terrain étant souvent accidenté et dénué de routes convenables, les montagnes ralentissent considérablement le voyage d'un groupe aussi restreint soit-il. Les nombreuses grottes et cavernes forment parfois un réseau souterrain permettant de raccourcir les trajets à condition de bien les connaître. L'eau liquide est presque introuvable en ces lieux mais il est possible de faire fondre de la neige ou de la glace pour en obtenir. Le gibier ne simplifie pas la tâche des chasseurs de par leur pelage souvent de la couleur des sols.</p>
                </div>

                <h4>Déserts</h4>
                <div>
                    <p>Qu'ils soient de sable comme les Terres Écarlates de glace, comme l'Archipel Givré ou bien de pierre comme les Étendues mortelles, les déserts ne sont pas des endroits favorable pour la vie. Les températures extrêmes et le manque d'eau ont créé des espèces bien particulières capables de survivre dans de telles conditions. La majorité des créatures qui errent dans ces lieux sont solitaires et quelque peu aggressive, ne pouvant laisser une source de nourriture s'échapper.</p>
                    <p>La navigation est ardue dans les déserts de par l'absence de repères visuels, tout n'est qu'un même paysage uniforme à perte de vue, la rareté des lieux marquants et le manque de précision des cartes font des déserts un lieu parfait pour se perdre ou bien se cacher. Il est très difficile de subvenir à ses besoins dans cet environnement, la nourriture est difficile à obtenir les animaux étant trop petit ou trop dangereux, l'eau est rarissime et même y dormir n'est pas simple à cause des températures glaciales la nuit.</p>
                </div>

                <h4>Savane</h4>
                <div>
                    <p>Ces plaines chaudes caractéristiques du climat du Sultanat, la savane forme une bande d'Ishta jusqu'à Ereso. Deux saisons s'y enchaînent inlassablement, sèche du début jusqu'à la mi-année, humide le rest du temps. La saison des pluies permet le développement d'arbres épars apportant un peu d'ombre aux nombreux mammifères peuplant ces terres. La plupart des animaux peuplant ces lieux vivent en groupe, qu'ils soient prédateurs ou proies.</p>
                    <p>Ce genre de terrain est facile à parcourir puisqu'en dehors des quelques arbres et buissons, le sol est recouvert d'herbe rase. Les plantes possèdent des racines profondes pour puiser l'eau lors de la saison sèche, il est assez simple de reconnaitre les racines comestibles si l'on s'y connait un peu. L'eau en revanche peut être un problème, les point d'eau sont rares mais il est possible de toujours en avoir sur son chemin grâce à un voyage bien préparé.</p>
                </div>

                <h4>Forêts tropicales</h4>
                <div>
                    <p>Les vents soufflants sur la côte Est d'Antoraï apportent avec eux l'humidité de l'océan, permettant ainsi à la Forêt Éternelle de s'entendre toujours plus. Les Jardins d'Ébène et le Refuge Bleu sont recouvert d'importantes forêts luxuriantes débordantes de vie animale et florale.</p>
                    <p>Ces forêts sont denses, il est difficile de les parcourir. La faune et la flore y sont très diversifié, souvent méconnues et parfois dangereuses. De par l'humidité abondante en ces lieux, il n'est pas difficile d'y trouver de l'eau potable, la nourriture est plus ardue à trouver car il faut éviter les plantes toxiques et les animaux les plus fréquents sont des insectes rarement comestibles.</p>
                </div>

                <h4>Océans</h4>
                <div>
                    <p>Les grandes étendues d'eau d'Ogma sont calmes la plupart du temps et il est simple de les traverser par bateau. Quand Nero et Aïgida s'allient pour faire surgir d'immenses vagues lors de terribles tempêtes, les traverser est une autre affaire.</p>
                    <p>La pêche représente l'activité principale des origines civilisées sur ces territoires. Les poissons y pullulent près des côtes comme en haute mer, mais il faut prendre garde à ne pas éveiller les créatures tapies dans les abysses noires de l'océan.</p>
                </div>
            </div>

            <h3 id="dangers_naturels" onclick="hideContent(this)">Dangers naturels</h3>
            <div>
                <h4>L'acide</h4>
                <p>L’acide inflige des dégâts chaque round que l'on passe à son contact, les dégâts dépendent de la violence de l'acide. Dans le cas d’une immersion totale dans l'acide, ses dégâts sont multipliés par 5.</p>
                <p>Les émanations libérées par la plupart des acides ont tout de même un effet caustique sur le corps. Quiconque s’approche trop d’une vaste étendue d’acide doit réussir un jet de Vigueur (DC selon l'intensité de l'acide 3 pour un acide léger, 9 pour un acide très caustique) Sur un échec on subit un trauma physique temporaire. Les émanations n’ont plus d'effet dès qu’on s’en éloigne et les traumas disparaissent rapidement.</p>
                <p>Les créatures immunisées contre l’acide risquent tout de même s’y noyer si elles sont totalement immergées.</p>

                <h4>L'asphyxie</h4>
                <p>Un personnage n’ayant plus d’air à respirer peut retenir son souffle un nombre de rounds équivalent à la moitié de son dé de vigueur. S'il agit de façon à préserver son oxygène (une action ou un mouvement par round par exemple), ce temps est doublé.</p>
                <p>Au-delà, il doit tenter un test de Vigueur DC 4 chaque round pour continuer à retenir son souffle. Le DC augmente de 1 à chaque itération. Le personnage subit un trauma physique pour chaque échec, si le nombre de traumas physiques du personnage est supérieur ou égal à son dé de Vigueur, il devient <a href="Glossaire.php#inconscient">inconscient</a> et meurt après un nombre de rounds équivalent à son dé de Vigueur.</p>

                <h4>La chaleur</h4>
                <p>Pour peu qu’elle soit suffisamment forte, la chaleur inflige des dégâts qui ne peuvent être soignés tant que le personnage n’a pas eu l’occasion de se rafraîchir (par exemple en se plongeant dans l’eau, en se mettant à l’ombre, en survivant jusqu’à la nuit, etc...).</p>
                <p>En cas de chaleur accablante (40° C ou plus), le personnage doit réussir un jet de Volonté par heure DC 4 sous peine de subir 1 trauma mental. Le DC de ce test augmente de 1 à chaque itération et redescend à 4 si le personnage se repose au moins une heure à l'abri de la chaleur. S’il porte une armure ou des vêtements épais, le jet se fait avec 2 désavantages.</p>
                <p>Si la chaleur est torride (50° C ou plus), la règle reste inchangée, mais les jets de Volonté sont espacés de 10 minutes seulement.</p>
                <p>Une chaleur épouvantable (température supérieure à 60° C, feu, eau bouillante, lave) occasionne des blessures plutôt que des traumas et les jets sont espacés d'une minute seulement.</p>

                <h4 id="chutes">Les chutes</h4>
                <p>Une entité non préparée à une chute subira des dégâts équivalent à la hauteur de la chute en mètres.</p>
                <p>Si au lieu de tomber ou de glisser, une entité saute délibérément, les dégâts de sa chute sont divisés par 2.</p>
                <p>Si il est possible d'amortir sa chute, l'entité peut décider de passer un test d'Acrobaties(Agi) pour ignorer un nombre de mètres équivalent au résultat divisé par 2.</p>
                <p>Si l’aventurier atterrit sur une surface meuble (sable, boue, etc.), les dégâts sont divisés par 2. Cela s'applique en plus de toutes les autres réductions.</p>
                <p>Les entités subissant une blessure suite à une chute se retrouvent <a href="Glossaire.php#a_terre">à terre</a>.</p>

                <span class="underline" id="chutes_eau">Les chutes dans l'eau</span>
                <p>Une entité non préparée à une chute dans l'eau subira des dégâts équivalent à la hauteur de la chute en mètres divisée par 2.</p>
                <p>Si au lieu de tomber ou de glisser, une entité saute délibérément, les dégâts de sa chute sont équivalent à la hauteur de la chute en mètres divisée par 5.</p>
                <p>L'entité peut décider de passer un test d'Acrobaties(Agi) ou d'Athlétisme(Agi) et effectuer un plongeon pour ignorer un nombre de mètres équivalent au résultat multiplié par 5.</p>

                <p>Le gabarit a un impact sur les dégâts de chute d'une entité : Les créatures Infimes et Très Petites divisent les dégâts par 3 et les créatures Petites par 2. Les créatures Moyenne subissent des dégâts normaux. Les créatures Grandes multiplient les dégâts par 2, les créatures Très Grandes par 3, les créatures Gigantesque par 4 et les créatures Colossales par 5.</p>
                <p>Ainsi, une entité de taille M possédant 1d10 d'Agilité et la compétence Acrobaties au rang Adepte tombant d’une corniche haute de 10 mètres de haut subit 10 points de dégâts. Si elle avait volontairement sauté, elle aurait seulement reçu 5 points de dégâts. Enfin, si elle avait volontairement sauté et avait obtenu 8 à son test d'Acrobaties, la hauteur de chute serait désormais de 10-(8/2)=6 mètres, les dégâts serait alors seulement de 3.</p>

                <h4>Les chutes d'objets</h4>
                <p>Un objet qui tombe suit les mêmes règles que les êtres vivants (voir ci-dessus). Le MJ décide du gabarit de l'objet et effectue les calculs en conséquences. L'entité reçoit autant de dégâts que l'objet. Si l'objet subit des dégâts trop important, il se brise à l'impact.</p>
                <p>Si l’objet tombe sur une créature, celle-ci doit réussir un jet d'Acrobaties(Agi) pour éviter les dégâts. Une créature n'est considéré comme un espace meuble que sur ses surfaces molles (l'abdomen et le postérieur pour les humanoïdes) et si l'objet plus petit d'au mons deux catégories.</p>

                <h4>L'eau</h4>
                <p>Un personnage ayant pied peut traverser une eau assez calme sans le moindre jet de dé. Pareillement, nager dans une eau calme nécessite juste un test d'Athlétisme(Agi) DC 3. Le DC augmente selon la force du courant. Si le personnage échoue, il se met à couler.</p>

                <h4>La fumée</h4>
                <p>Un aventurier respirant une épaisse fumée doit réussir un jet de vigueur DC 4 pour ne pas suffoquer. Le DC augmente de 1 à chaque itération. En cas d’échec, il passe le round à fortement tousser. Si cela se répète sur un deuxième round, il subit un trauma physique. La fumée diminue la visibilité (2 désavantages pour les tests de Perception pour vue et odorat).</p>

                <h4>Le froid</h4>
                <p>Le froid administre des dégâts, qui ne peuvent pas disparaître tant que le personnage ne s’est pas réchauffé.</p>
                <p>Par temps froid (température inférieure à 0° C), un individu non protégé doit réussir un jet de Vigueur DC 4 sous peine de subir 1 trauma physique. Le DC de ce test augmente de 1 à chaque itération et redescend à 4 si le personnage se repose au moins une heure à l'abri du froid. S’il porte des vêtements épais, le jet se fait avec 2 avantages.</p>
                <p>Si le froid est important (-15° C et en dessous), le jet de Vigueur est identique, mais il est effectué toutes les 10 minutes.</p>
                <p>Un froid extrême (-30° C et en dessous) inflige des blessures plutôt que des traumas et les jets sont effectués toutes les minutes.</p>

                <h4>La glace</h4>
                <p>La vitesse de déplacement sur la glace est divisée par deux. Les tests d’Acrobaties se font avec 2 désavantages. Les créatures demeurant trop longtemps au contact de la glace risquent d’être affectées par un froid important.</p>

                <h4>La lave</h4>
                <p>La lave et le magma infligent 3d6 points de dégâts de feu par round d’exposition, dans le cas d’une immersion totale les dégâts sont multipliés par 5.</p>
                <p>Les dégâts de lave infligent un état <a href="Glossaire.php#brulure">brûlure</a> d'une amplitude équivalente à la moitié des dégâts subis. Une immunité ou une résistance au feu protège aussi contre la lave ou le magma. Une créature immunisée au feu peut parfaitement se noyer dans un bassin de lave. </p>

                <h4>L'obscurité</h4>
                <p>La vision dans le noir permet à certaines entités de voir parfaitement bien dans l’obscurité la plus totale, mais les autres individus sont alors comme <a href="Glossaire.php#aveugle">aveuglés</a> (et ce même s’ils possèdent la vision nocturne). Des bourrasques souterraines peuvent éteindre les torches et les lanternes, les sources d’illumination magique peuvent être dissipées et les pièges magiques peuvent créer des aires de ténèbres magiques impénétrables.</p>
            </div>
        </div>


    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");