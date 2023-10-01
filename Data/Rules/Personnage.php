<?php
include($_SERVER['DOCUMENT_ROOT'] . "/params.php");
$title = "Personnage";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>
    <h1 id="creation_perso" onclick="hideContent(this)">Création de Personnage</h1>
    <div>
        <p>La création d'un avatar est la première étape à franchir avant de se lancer dans une aventure et peut être la plus importante. À moins que l'aventure que vous vous apprêtez à vivre n'impose des personnages pré-tirés, il est fortement conseillé de personnaliser au mieux son avatar en suivant ce guide afin de l'incarner au mieux.</p>
        <p>La fiche de personnage est sous la forme d'un tableur excel pour le moment, un pdf éditable viendra en temps voulu : <a href="../../Downloads/Fiche%20Perso%20Ogma.xlsx">Fiche Perso Ogma</a>.</p>
        <h2 id="table_origine" onclick="hideContent(this)">Origine</h2>
        <div>
            <p>Première étape de la création de son personnage : Choisir son origine. Il existe de nombreuses origines possibles dans le monde d'Ogma, si vous ne les connaissez pas encore retournez à l'<a href="../../index.php">accueil</a> pour les découvrir.</p>
            <table>
                <tbody>
                <tr>
                    <th colspan="2">Origine</th>
                    <th>Traits d'origine</th>
                </tr>
                <tr>
                    <th colspan="2">Azuma</th>

                    <td><strong>Endurance humaine : </strong> Ne s'évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour<br/><strong>Honneur du Guerrier :</strong> Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et la résistance magique augmente de 1 pendant un round.</td>
                </tr>
                <tr>
                    <th colspan="2">Chono</th>
                    <td><strong>Rage Primordiale :</strong> Jet de Volonté DC 6 si touché par un effet magique en l'absence du pendentif de Virgonium, en cas d'échec, subit un trauma et entre en rage (voir <a href="../Factions/Chono.php#rage">Rage Chono</a> <br/><strong>Chasseur hors-pair :</strong> <a href="Glossaire.php#vision_nocturne">Vision nocturne</a>, peut relancer un jet raté de PER une fois par jour, Arme Naturelle(Griffes/Crocs, 1d6)</td>
                </tr>
                <tr>
                    <th colspan="2">Kanta</th>
                    <td><strong>Fourrure épaisse :</strong> <a href="Glossaire.php#robuste">Robuste(1)</a>, Résistance(Froid, 3)<br/><strong>Imposante stature :</strong> Taille G, Arme Naturelle(Griffes/Crocs, 1d8)</td>
                </tr>
                <tr>
                    <th colspan="2">Mushuk</th>
                    <td><strong>Héritage félin :</strong> <a href="Glossaire.php#vision_nocturne">Vision nocturne</a>, Dégâts de chute divisés par 2, Arme Naturelle(Griffes/Crocs, 1d6)</td>
                </tr>
                <tr>
                    <th colspan="2">Sakha</th>
                    <td><strong>Peuple sylvestre :</strong> Taille P, Immunité(Poison), Estomac Solide</td>
                </tr>
                <tr>
                    <th rowspan="3">Sarpa</th>
                    <th>Lézards</th>
                    <td><strong>Sang-froid :</strong> Vulnérabilité(Froid, 2), Arme Naturelle(Griffes/Crocs, 1d6)<br/><strong>Peau écailleuse :</strong> <a href="Glossaire.php#robuste">Robuste(1)</a><br/><strong>Héritage lézard :</strong> Régénération naturelle doublée (le test se fait avec une DC 2 et tout les paliers de 2 DR on récupère d'une blessure supplémentaire), régénère les membres perdus</td>
                </tr>
                <tr>
                    <th>Serpents</th>
                    <td><strong>Sang-froid :</strong> Vulnérabilité(Froid, 2), Arme Naturelle(Crochets, 1d4), Débilitant(5))<br/><strong>Peau écailleuse :</strong> <a href="Glossaire.php#robuste">Robuste(1)</a><br/><strong>Héritage serpentin :</strong> <a href="Glossaire.php#vision_thermique">Vision thermique</a>, <a href="Glossaire.php#rampant">Rampant</a></td>
                </tr>
                <tr>
                    <th>Crocodiles</th>
                    <td><strong>Sang-froid :</strong> Vulnérabilité(Froid, 2), Arme Naturelle(Griffes/Crocs, 1d8)<br/><strong>Forteresse d'écailles :</strong> <a href="Glossaire.php#robuste">Robuste(2)</a> et Taille G<br/><strong>Prédateur Aquatique :</strong> <a href="Glossaire.php#amphibien">Amphibien</a></td>
                </tr>
                <tr>
                    <th colspan="2">Sever</th>
                    <td><strong>Endurance humaine : </strong> Ne s'évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour<br/><strong>Rage du Combat :</strong> Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et la résistance physique augmente de 1 pendant un round.</td>
                </tr>
                <tr>
                    <th colspan="2">Sihir</th>
                    <td><strong>Héritage Karnarim :</strong> Spécialisation dans un domaine de Karnaï pour toutes les compétences pouvant l'être.<br/><strong>Sensibilité magique :</strong> Vulnérabilité(Magie, 3) et Absorption Magique(3)</td>
                </tr>
                <tr>
                    <th rowspan="2">Steinn</th>
                    <th>Rakaj</th>
                    <td><strong>Taillé dans le Roc :</strong> Taille P, <a href="Glossaire.php#robuste">Robuste(1)</a><br/><strong>Vision souterraine :</strong> <a href="Glossaire.php#vision_nocturne">Vision nocturne</a><br/><strong>Froideur d'Hortak :</strong> Résistance(Froid, 3)</td>
                </tr>
                <tr>
                    <th>Khazun</th>
                    <td><strong>Taillé dans le Roc :</strong> Taille P, <a href="Glossaire.php#robuste">Robuste(1)</a><br/><strong>Vision souterraine :</strong> <a href="Glossaire.php#vision_nocturne">Vision nocturne</a><br/><strong>Chaleur des Monts Ardents :</strong> Résistance(Feu, 3)</td>
                </tr>
                <tr>
                    <th colspan="2">Tori</th>
                    <td><strong>Héritage Aviaire :</strong> Volant(Vitesse*2), Arme Naturelle(Serres/Bec, 1)<br/><strong>Beau parleur :</strong> Peut relancer un jet raté d'ELO une fois par jour</td>
                </tr>
                <tr>
                    <th colspan="2">Tuskizi</th>
                    <td><strong>Endurance humaine : </strong> Ne s'évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour<br/><strong>Poussée d'Adrénaline :</strong> Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et les tests d'esquive se font avec un bonus de 2 pendant un round.</td>
                </tr>
                </tbody>
            </table>
            <p>Toutes les origines Bestiales possèdent le trait <a href="Glossaire.php#estomac_solide">Estomac Solide</a>.</p>
        </div>

        <h2 id="Caracteristiques" onclick="hideContent(this)">Caractéristiques</h2>
        <div>
            <p>Après avoir choisi une origine pour votre personnage, il est temps de définir ses caractéristiques de départ. Pour ce faire, suivez la colonne correspondante à votre origine.</p>
            <p>Les caractéristique sont représentés par un dé polyédrique allant de 1d4 à 1d12, plus le dé est grand et plus la caractéristique est développée. C'est ce dé que vous devez lancer lorsque votre MJ vous demande de passer un test.</p>
            <p>Voici une description des différentes caractéristiques, vous permettant de mieux appréhendez le tableau ci-dessous :</p>
            <ol type="I">
                <li>Physiques
                    <ul class="space_list">
                        <li><span class="big_underline">Force (FOR) :</span>Détermine la puissance musculaire du personnage.</li>
                        <li><span class="big_underline">Dextérité (DEX) :</span>Détermine l'habilité du personnage avec ses mains.</li>
                        <li><span class="big_underline">Agilité (AGI) :</span>Mesure le contrôle qu'a le personnage sur son corps, son équilibre et sa souplesse.</li>
                        <li><span class="big_underline">Vigueur (VIG) :</span>Représente la robustesse physique et la résistance à la fatigue.</li>
                    </ul>
                </li>
                <li>Mentales
                    <ul class="space_list">
                        <li><span class="big_underline">Intelligence (INT) :</span>Détermine l'étendue du savoir, la sagacité et la compréhension de la magie du personnage</li>
                        <li><span class="big_underline">Volonté (VOL) :</span>Représente la solidité de l'esprit du personnage, son courage, sa capacité à résister aux effets mentaux et à manier la magie.
                        </li>
                        <li><span class="big_underline">Perception (PER) :</span>Rassemble les capacités des cinq sens et determine également l'instinct du personnage.</li>
                        <li><span class="big_underline">Éloquence (ELO) :</span>Mesure l'habileté à prendre la parole et à communiquer du personnage ainsi que sa sociabilité.</li>
                    </ul>
                </li>
            </ol>
            <p>Les Origines humaines ne possèdes pas de bonus aux caractéristiques, en effet leur population est très variée et ils représentent en quelque sorte la norme de ce monde. Les Azumas, Severs et Tuskizis peuvent par trois fois augmenter la taille d'un de leur dé de caractéristique, deux fois au maximum sur le même dé. Ces bonus représentent le développement du personnage lors de son passé.</p>
            <table id="table_carac_origine">
                <tbody>
                <tr>
                    <th rowspan="3"/>
                    <th colspan="3">Origines Humaines</th>
                    <th colspan="3">Origines Magiques</th>
                    <th colspan="7">Origines Bestiales</th>
                </tr>
                <tr>
                    <th rowspan="2">Azuma</th>
                    <th rowspan="2">Sever</th>
                    <th rowspan="2">Tuskizi</th>
                    <th rowspan="2">Sakha</th>
                    <th rowspan="2">Sihir</th>
                    <th rowspan="2">Steinn</th>
                    <th rowspan="2">Chono</th>
                    <th rowspan="2">Kanta</th>
                    <th rowspan="2">Mushuk</th>
                    <th colspan="3">Sarpa</th>
                    <th rowspan="2">Tori</th>
                </tr>
                <tr>
                    <th>Crocodile</th>
                    <th>Lézard</th>
                    <th>Serpent</th>
                </tr>
                <tr>
                    <th>Force</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d8</td>
                    <td class="bonus">d8</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td class="bonus">d12</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td>d6</td>
                </tr>
                <tr>
                    <th>Dextérité</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td class="bonus">d8</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d8</td>
                    <td>d6</td>
                    <td>d6</td>
                </tr>
                <tr>
                    <th>Agilité</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d8</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d10</td>
                    <td class="malus">d4</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d8</td>
                </tr>
                <tr>
                    <th>Vigueur</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d10</td>
                    <td class="bonus">d8</td>
                    <td class="bonus">d12</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                </tr>
                <tr>
                    <th>Intelligence</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d8</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                </tr>
                <tr>
                    <th>Volonté</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d8</td>
                    <td class="bonus">d8</td>
                    <td class="bonus">d12</td>
                    <td>d6</td>
                </tr>
                <tr>
                    <th>Perception</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                    <td>d6</td>
                    <td class="bonus">d8</td>
                    <td class="malus">d4</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                </tr>
                <tr>
                    <th>Éloquence</th>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td class="bonus">d8</td>
                    <td>d6</td>
                    <td class="malus">d4</td>
                    <td>d6</td>
                    <td class="bonus">d8</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td>d6</td>
                    <td class="bonus">d10</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 id="Attributs" onclick="hideContent(this)">Attributs</h2>
        <div>
            <p>Une fois les caractéristiques déterminées, il faut se pencher sur les attributs qui en sont dérivés :</p>

            <h3 id="resistances" onclick="hideContent(this)">Résistance physique (RP) et Résistance magique (RM)</h3>
            <div>
                <p>La résistance physique de votre personnage représente sa capacité à encaisser les coups. Elle est équivalente à la moitié de votre caractéristique de Vigueur à laquelle s'ajoute votre protection d'armure (PR) si vous portez une armure.<p/>
                <p>Certaines origines comme les Kantas, les Sarpas-Crocodiles et les Steinns possèdent le trait <a href="Glossaire.php#robuste">Robuste</a> qui augmente leur resistance physique, cette augmentation est considérée comme de la PR naturelle.</p>
                <p>La résistance magique quant à elle représente sa capacité à négliger les attaques magiques. Elle est équivalente à la moitié de votre caractéristique de Volonté à laquelle s'ajoute la protection d'armure magique (PR mag) si vous portez une armure.</p>
            </div>

            <div>
            </div>

            <h3 id="blessures" onclick="hideContent(this)">Blessures</h3>
            <div>
                <p>Les blessures représentent les dommages qu'à subit votre personnage, plus il est blessé plus il se rapproche de la mort. La nature des dommages n'a qu'une importance narrative sans impact sur les mécaniques de jeu.</p>
                <p>Une blessure possède deux attributs : une intensité représentant sa gravité et une partie du corps indiquant sa localisation, les caractéristiques et attributs associés à cette zone subissent une pénalité équivalente à l'intensité de la blessure :</p>
                <ul>
                    <li>Bras : FOR</li>
                    <li>Mains : DEX</li>
                    <li>Jambes : AGI et Vitesse</li>
                    <li>Torse : VIG</li>
                    <li>Crâne : INT et VOL</li>
                    <li>Visage : PER et ELO</li>
                </ul>
                <p>Un nombre important de blessures peut sérieusement diminuer les capacités de votre personnage voire incapaciter certaines parties de son corps jusqu'à guérison. Il revient alors au joueur qui l'incarne (ou au MJ) du moment où le personnage sombre dans l'inconscience.</p>
                <p>Pour guérir, une blessure a besoin d'être traitée, cela nécessite l'utilisation d'un kit de soin et d'un test de Savoir[Médecine] (Dex ou Int) avec un DC équivalent à l'intensité de la blessure. Ensuite la blessure doit simplement être entretenue chaque jour jusqu'à guérison complète ce qui nécessite une utilisation de kit de soin par repos long.</p>
                <p>Si une blessure n'est pas traité, son intensité augmente de 1 par jour.</p>
                <p>Lorsqu'une blessure est traitée, le personnage blessé peut, lorsqu'il bénéficie des bienfaits d'un repos long, effectuer un test avec la caractéristique affectée par la blessure. Le DC de ce test est équivalent à l'intensité de la blessure, les pénalités de toutes les blessures de cette zone s'applique normalement à ce test. Sur un succès l'intensité de la blessure diminue de 1. Sur un échec la blessure stagne et le personnage obtient un avantage pour la prochaine itération de ce test, cet avantage est cumulable si le personnage échoue plusieurs fois de suite et tous les avantages obtenus de cette façon disparaissent en cas de réussite.
                <p>Un autre personnage peut l'aider à accomplir ce test en passant un test de Savoir[Médecine] (Dex ou Int) avec un DC équivalent à l'intensité de la blessure et apporte un bonus équivalent au DR, sur un échec le médecin n'apporte pas de malus. Ce test n'est à faire qu'une seule fois par personnage blessé peu importe le nombre de blessures et s'applique a tous les tests de guérison du personnage blessé.</p>
            </div>

            <h3 id="endurance_mental_traumas" onclick="hideContent(this)">Endurance, Mental et Traumas</h3>
            <div>
                <p>L'endurance et le mental représentent la capacité de votre personnage à se surpasser. Les traumas décrivent la fatigue, les chocs et les coups durs qu'a subis votre personnage. Il en existe deux catégories, les physiques et les mentaux.</p>
                <p>La quantité maximale d'Endurance est équivalente à la plus haute caractéristique physique de votre personnage. Sa quantité maximale de Mental est équivalente à sa plus haute caractéristique mentale.</p>
                <p>Au cours de ses aventures, votre personnage peut subir un évènement particulièrement rude impliquant la perte de point d'Endurance ou de Mental. Ces pertes peuvent parfois être évités en passant un test adéquat.</p>
                <p>Exemples de situation pouvant causer une perte :</p>
                <ul style="list-style-type: none">
                    <li>d'Endurance :
                        <ul>
                            <li>Effort physique prolongé / intense</li>
                            <li>Malnutrition / Manque de sommeil</li>
                            <li>Exposition à des températures trop élevées/basses</li>
                        </ul>
                    </li>
                    <li>de Mental :
                        <ul>
                            <li>Témoin d'un évènement horrifique</li>
                            <li>Déshydratation / Manque de sommeil</li>
                            <li>Consommation de substances hallucinogènes</li>
                        </ul>
                    </li>
                </ul>
                <p>Si une perte survient et que la quantité d'Endurance ou de Mental restante à votre personnage n'est pas suffisante, il subit alors un trauma physique ou mental. Chaque trauma inflige un désavantage à toutes les caractéristiques physique/mentales selon le type de trauma.</p>
                <p>La récupération des points d'Endurance (PE) ou de Mental (PM) se déroule lors des périodes de repos :</p>
                    <ul>
                        <li>Repos court : le personnage lance un dé de caractéristique physique, divise le résultat par 2 et récupère autant de PE, idem avec une caractéristique mentale pour les PM.</li>
                        <li>Repos long : le personnage récupère tous ses PE et PM. Il récupère également d'un trauma physique et d'un trauma mental.</li>
                    </ul>
                <p>Il est possible de dépenser des PE et des PM pour effectuer des actions spéciales : </p>
            </div>
               
            <div class="hidden">
                <p>Les traumas représentent la fatigue physique et mentale que peut subir votre personnage, ce sont des revers moins grave que les blessures. Il existe deux catégories de traumas, les traumas physiques et les traumas mentaux.</p>
                <p>Chaque trauma physique que subit votre personnage impose un désavantage sur ses tests de Force, Dextérité, Agilité et Vigueur ; idem pour les tramas mentaux mais les caractéristiques concernées sont l'Intelligence, la Volonté, la Perception et l'Éloquence.</p>
                <p>Au cours de ses aventures, un personnage peut subir un choc important nécessitant de passer un test de Volonté ou de Vigueur, échouer un test de ce genre peut infliger un trauma physique ou mental selon le type de choc que subit le personnage.</p>
                <p>Exemples de choc pouvant causer un trauma :</p>
                <ul style="list-style-type: none">
                    <li>Physique :
                        <ul>
                            <li>Effort physique prolongé / intense</li>
                            <li>Malnutrition / Déshydratation / Manque de sommeil</li>
                            <li>Exposition à des températures trop élevées/basses</li>
                        </ul>
                    </li>
                    <li>Mental :
                        <ul>
                            <li>Témoin d'un évènement horrifique</li>
                            <li>Échec d'incantation de sort</li>
                            <li>Consommation de substances hallucinogènes</li>
                        </ul>
                    </li>
                </ul>
                <p>Pour guérir d'un trauma, il est nécessaire d'effectuer un <a href="Survie.php#repos_court">repos court</a>, au terme de celui-ci, vous récupérez d'un trauma physique et d'un trauma mental. Si vous effectuez un <a href="Survie.php#repos_long">repos long</a>, alors vous récupérez de tous vos traumas.</p>
            </div>

            <h3 id="vitesse" onclick="hideContent(this)">Vitesse</h3>
            <div>
                <p>La vitesse de déplacement d'un personnage détermine la distance maximale en mètre qu'il peut parcourir pendant un round de combat. La vitesse de déplacement d'un personnage équivaut à son dé d'Agilité.</p>
                <p>Le déplacement de votre personnage peut être limité par la surface qu'il parcourt, s'il se déplace dans l'eau ou sur un terrain difficile(boue, végétation dense, rochers, pente importante,...) il se déplace à la moitié de sa vitesse ; s'il escalade une paroi, il se déplace alors à un quart de sa vitesse.</p>
            </div>

            <h3 id="gabarit" onclick="hideContent(this)">Gabarit</h3>
            <div>
                <p>Le gabarit de votre personnage dépend de son origine :</p>
                <ul>
                    <li><span class="big_underline">Origine Petite(P) :</span>Sakha, Steinn</li>
                    <li><span class="big_underline">Origine Moyenne(M) :</span>Azuma, Chono, Mushuk, Sarpa Lézard, Sarpa Serpent, Sihir, Sever, Tori, Tuskizi</li>
                    <li><span class="big_underline">Origine Grande(G) :</span>Kanta, Sarpa Crocodile</li>
                </ul>
                <p>Pour plus de détails sur l'influence du gabarit sur votre personnage Cf <a href="Gabarit.php#gabarit_creatures">Gabarit des créatures</a>.</p>
            </div>

            <h3 id="langages" onclick="hideContent(this)">Langages</h3>
            <div>
                <p>Votre personnage sait parler sa langue d'origine et éventuellement d'autres langues selon son histoire.</p>
                <p>Certains langages comme ceux des humains possèdent des racines communes, permettant à ses pratiquants de communiquer même s'ils n'ont aucunes langues en commun. D'autres peu communes sont considérés comme exotiques, parmi elle le Kugarite, le Karnarak et le Sihiräll. Cf <a href="../World/Histoire_Ogma.php#langages">Langages</a>
                </p>
            </div>


        </div>

        <h2 id="Competences" onclick="hideContent(this)">Compétences</h2>
        <div>
            <p>Maintenant qu'on connaît les aptitudes physiques et mentales de votre personnage, attaquons-nous à ce qu'il sait faire, c'est-à-dire quelles sont ses compétences ?</p>
            <p>La ou les caractéristique(s) indiquée(s) dans la colonne Carac(s) principale(s) est ou sont celle(s) utilisée(s) le plus fréquemment pour les tests liés à cette compétence. Si plusieurs caractéristiques sont indiquées, vous êtes libres de choisir laquelle utiliser pour maximiser vos chances de réussite. Il est toutefois possible que le MJ vous impose la caractéristique à utiliser si les conditions du test s'y prêtent.</p>
            <p>Les compétences possèdent plusieurs paliers de maîtrise également appelés rang, chaque palier représentant l'expérience que possède votre personnage dans cette compétence. Un personnage ne possédant d'expérience dans une compétence peut tenter d'effectuer des actions relatives à la compétence mais il peut subir des malus selon la compétence concernée.</p>
            <p>Un personnage peut se spécialiser dans un domaine particulier d'une compétence, il effectue les tests dans son domaine de spécialisation avec 3 avantages. Un personnage ne peut bénéficier de plus d'une spécialisation à la fois lors d'une épreuve mais peut posséder plusieurs spécialisations dans une même compétence. Une spécialisation coûte 3 points d'expérience et peut être acquise qu'importe le palier de maîtrise du personnage. Des exemples de spécialisations sont donnés dans la liste ci-dessous mais les joueurs peuvent tout à fait choisir leur propre spécialisation et en discuter avec le MJ.</p>
            <p>Les paliers sont :</p>
            <ul style="list-style-type: decimal">
                <li><span class="big_underline">Novice :</span>Le personnage commence à saisir l'ampleur des choses qu'il lui reste à apprendre dans ce domaine, mais à déjà les bases. (+1)</li>
                <li><span class="big_underline">Adepte :</span>L’entraînement rigoureux a porté ses fruits, la maîtrise du personnage commence à le distinguer du reste du monde. (+2)</li>
                <li><span class="big_underline">Professionnel :</span>Les capacités du personnages se sont encore renforcées, si bien qu'il est désormais capable de donner des leçons aux débutants. (+3)</li>
                <li><span class="big_underline">Expert :</span>L'aptitude du personnage surpasse la grande majorité du commun des mortels. (+4)</li>
                <li><span class="big_underline">Maître :</span>Le personnage est devenu un maître de son art, il est perçu comme une légende parmi ses pairs. (+5)</li>
            </ul>
            <p><span class="big_underline">Exemple :</span>Asraë veut ouvrir un coffre verrouillé mais elle ne possède pas la clé, elle peut utiliser la compétence Roublardise pour s'emparer de ce qu'il y a à l'intérieur. Asraë est une Professionnelle en Roublardise, elle possède donc un bonus de +3 à son jet. Asraë possède 1d10 de Dextérité et obtient un 9, elle y ajoute son +3 provenant de la compétence pour un total de 12, la serrure du coffre à un DC 8 elle obtient donc un DR de +4. Le MJ décide suite à cette brillante réussite que le crochetage ne fait aucun bruit et que le propriétaire du coffre qui dormait juste à côté ne se réveille pas.</p>

            <table id="table_competence">
                <tbody>
                <tr>
                    <th>Compétence</th>
                    <th>Carac(s) principale(s)</th>
                    <th>Exemple de Spécialisations</th>
                    <th>Description</th>
                    <th width="25%">Exemple d'épreuves</th>
                </tr>
                <tr id="acrobaties">
                    <th>Acrobaties</th>
                    <td>Agilité</td>
                    <td>Esquive<br/>Saut<br/>Équilibre</td>
                    <td>Cette compétence gouverne les actions reposant sur l'explosivité des muscles, la souplesse et l'équilibre</td>
                    <td>Sauter de toit en toits<br/>Se faufiler dans un espace étroit<br/>Tenir en équilibre sur une corde/poutre</td>
                </tr>
                <tr id="alteration">
                    <th>Altération</th>
                    <td>Volonté</td>
                    <td><a href="../World/Histoire_Ogma.php#inkarnai">Domaines de Karnaï</a></td>
                    <td>Cette école de magie permet de modeler la réalité comme on l'entend en transformant ou réparant des éléments existants.</td>
                    <td>Augmenter ses capacités physiques<br/>Soigner un allié<br/>Infliger une vulnérabilité</td>
                </tr>
                <tr id="arcanes">
                    <th>Arcanes</th>
                    <td>Intelligence<br/>Perception</td>
                    <td>Détection magique<br/>Désactivation des pièges<br/>Analyse de la magie</td>
                    <td>Les arcanes sont les études relatives à la magie, elles permettent d'identifier la présence de psyché dans le plan matériel.</td>
                    <td>Identifier un sort/objet enchanté<br/>Détecter/Désarmer un piège magique</td>
                </tr>
                <tr id="athletisme">
                    <th>Athlétisme</th>
                    <td>Force<br/>Agilité<br/>Vigueur</td>
                    <td>Course<br/>Escalade<br/>Natation</td>
                    <td>Cette compétence représente la capacité d'un personnage à effectuer des actions sportives</td>
                    <td>Soulever des charges lourdes<br/>Courir sur de longues distances sans pause<br/>Nager à travers des rapides</td>
                </tr>
                <tr id="conjuration">
                    <th>Conjuration</th>
                    <td>Volonté</td>
                    <td><a href="../World/Histoire_Ogma.php#inkarnai">Domaines de Karnaï</a></td>
                    <td>Cette école de magie se concentre sur le déplacement d'éléments physiques ou magiques entre le plan matériel et le plan psychique, que ce soit des éléments, des objets ou même des êtres vivants.</td>
                    <td>Lancer une boule de feu<br/>Invoquer une arme ou une armure<br/>Se téléporter</td>
                </tr>
                <tr id="domination">
                    <th>Domination</th>
                    <td>Volonté</td>
                    <td><a href="../World/Histoire_Ogma.php#inkarnai">Domaines de Karnaï</a></td>
                    <td>Cette école de magie permet de contrôler les vivants comme les morts et de jouer sur la perception de la réalité de ses cibles.</td>
                    <td>Réanimer un cadavre<br/>Calmer une entité<br/>Créer un mirage</td>
                </tr>
                <tr id="dressage">
                    <th>Dressage</th>
                    <td>Agilité<br/>Perception<br/>Éloquence</td>
                    <td>Compréhension animale<br/>Domptage<br/>Soins animalier</td>
                    <td>Cette compétence détermine l'aisance qu'a le personnage à se faire obéir des animaux, sa capacité à les comprendre et à s'en occuper.</td>
                    <td>Communiquer avec un animal<br/>Apprendre un tour à un compagnon animal<br/>Combattre à dos de monture</td>
                </tr>
                <tr id="furtivite">
                    <th>Furtivité</th>
                    <td>Agilité</td>
                    <td>Camouflage<br/>Filature<br/>Infiltration</td>
                    <td>La furtivité mesure la capacité du personnage à rester discret au sein de son environnement, à se déplacer sans bruit et sans être vu.</td>
                    <td>Prendre quelqu'un en filature<br/>Se faufiler dans un fort ennemi<br/>Se camoufler dans l'environnement</td>
                </tr>
                <tr id="mysticisme">
                    <th>Mysticisme</th>
                    <td>Volonté</td>
                    <td><a href="../World/Histoire_Ogma.php#inkarnai">Domaines de Karnaï</a></td>
                    <td>Cette école de magie rassemble les sorts non étudiés par les trois autres écoles, ses effets sont divers : révéler l'inconnu et le futur, jouer avec le destin.</td>
                    <td>Détecter des entités<br/>Communiquer à distance<br/>Voir le futur</td>
                </tr>
                <tr id="observation">
                    <th>Observation</th>
                    <td>Perception<br/>Intelligence</td>
                    <td>Vision<br/>Ouïe<br/>Odorat</td>
                    <td>Cette compétence détermine l'attention que porte le personnage à son environnement et ses facultés à repérer quelque chose qui échapperait à d'autres.</td>
                    <td>Détecter une embuscade<br/>Identifier un comportement étrange<br/>Fouiller une pièce</td>
                </tr>
                <tr id="persuasion">
                    <th>Persuasion</th>
                    <td>Éloquence</td>
                    <td>Charme<br/>Propagande<br/>Vantardise</td>
                    <td>La persuasion permet d'influencer les autres grâces à de belles paroles et des mots bien placés. Les épreuves de persuasion sont souvent opposés à la Volonté des cibles souhaitant y résister.</td>
                    <td>Séduire une personne<br/>Convaincre quelqu'un de se mettre d'accord avec vous<br/>Mentir</td>
                </tr>
                <tr id="presence">
                    <th>Présence</th>
                    <td>Éloquence<br/>Force</td>
                    <td>Intimidation<br/>Commandement<br/>Inspiration</td>
                    <td>La présence détermine à quel point vous pouvez être impressionnant si vous le souhaitez.</td>
                    <td>Rallier une foule pendant un discours<br/>Faire tenir une ligne de front en beuglant<br/>Intimider quelqu'un</td>
                </tr>
                <tr id="roublardise">
                    <th>Roublardise</th>
                    <td>Dextérité</td>
                    <td>Vol à la tire<br/>Prestidigitation<br/>Dissimulation</td>
                    <td>La compétence de roublardise mesure l'habileté d'un personnage lorsqu'il souhaite faire une action discrètement.</td>
                    <td>Crocheter une serrure<br/>Cacher un objet<br/>Faire un tour de passe-passe</td>
                </tr>
                <tr id="savoir">
                    <th>Savoir</th>
                    <td>Intelligence</td>
                    <td>Histoire<br/><a href="../World/Histoire_Ogma.php#langages">Langages</a><br/>Traditions</td>
                    <td>Cette compétence détermine le niveau de connaissances global d'un personnage.</td>
                    <td>Déchiffrer un parchemin<br/>Identifier une créature préalablement étudiée<br/>Connaître les us et coutumes d'une contrée</td>
                </tr>
                <tr id="survie">
                    <th>Survie</th>
                    <td>Intelligence<br/>Perception</td>
                    <td><a href="Survie.php#biomes">Biomes</a><br/>Pistage<br/>Cueillette</td>
                    <td>Cette compétence mesure les capacités du personnage à survivre en milieu naturel. De nombreux modificateurs peuvent s'appliquer selon l'environnement de l'épreuve.</td>
                    <td>Trouver de l'eau et de la nourriture<br/>Traquer une piste<br/>Identifier une plante dangereuse</td>
                </tr>
                <tr id="style_combat_competence">
                    <th>Style de combat [type]</th>
                    <td>Force<br/>Dextérité</td>
                    <td>Duel<br/>Combat monté<br/>Combat en formation</td>
                    <td>Cette compétence détermine le niveau d'expérience du personnage avec le combat et la façon dont il se bat. Pour plus d'information Cf <a href="Combat.php#style_combat">Style de combat</a>.</td>
                    <td>Attaquer un adversaire<br/>Se défendre d'une attaque</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 id="traits_perso" onclick="hideContent(this)">Traits</h2>
        <div>
            <p>Votre personnage est presque abouti, mais peut-être qu'il lui manque encore un petit quelque chose qui le rendrait vraiment unique et différents des autres Ogmarim, c'est là qu'entre en jeu les traits de personnage :</p>
            <p>Les joueurs peuvent demander au MJ de créer des traits particulier pour leur personnage pour coller au maximum avec leurs attentes. Ces traits reflètent une partie de la personnalité, du passé ou des objectifs du personnage.</p>
            <p>Les traits de personnages sont un genre de sous-compétence permettant d'affiner la personalisation et le style de jeu du personnage selon les désirs du joueur. Ils peuvent être un métier, une occupation, une façon de vivre, un exploit marquant de leur vie,...</p>
            <p>Pour éviter que les traits ne soient trop puissants, il faut soit que son champ d'application soit plus restreint c'est-à-dire qu'il est utilisé moins souvent qu'une compétence, soit que sa puissance soit moindre ou compensée par un malus.</p>
            <p>Un personnage commence en général la partie avec 3 traits mais pourra en obtenir d'autres en cours de campagne si une action particulièrement épique ou notable est accompli par un personnage. Une héroïne survivant une aventure se déroulant dans une grotte infestée de scaratrok sans jamais se faire empoisonner peut gagner le trait "Anticorps efficace" accordant une légère résistance aux dégâts de poison.</p>
            <p>Exemple de traits :</p>
            <ul>
                <li><span class="underline">Érudit :</span>peut relancer un jet de Savoir une fois par jour</li>
                <li><span class="underline">Soldat :</span>maîtrise une arme de plus par style de combat</li>
                <li><span class="underline">Criminel :</span>peut relancer un jet de hors-la-loi une fois par jour</li>
                <li><span class="underline">Ermite :</span>2 désavantages lors de la communication avec des personnes civilisés mais peut parler aux plantes</li>
                <li><span class="underline">Voyageur :</span>1 avantage pour résister aux traumas physique dus à la marche</li>
                <li><span class="underline">Chasseur :</span>ramène de quoi nourrir une personne par heure de chasse si la région lui est familière</li>
                <li><span class="underline">Anthropophobie :</span>2 désavantages pour communiquer avec les humains mais 2 avantages pour parler aux non-humains</li>
                <li><span class="underline">Alchimiste :</span>sait créer des potions alchimiques</li>
                <li><span class="underline">Forgeron :</span>sait forger des armes et des armures</li>
                <li><span class="underline">Ingénieur :</span>sait créer et réparer des machines</li>
            </ul>
        </div>

        <h2 id="faveur_tychi" onclick="hideContent(this)">Faveurs de Tychi</h2>
        <div>
            <p>Les faveurs de Tychi relatent à quel point votre personnage est chanceux et possède un destin particulier. Elles permettent de jouer avec le destin, d'éviter les blessures graves et de danser avec la mort.</p>
            <p>Un personnage commence avec 1d4 faveurs de Tychi et ne peut en obtenir d'autres que s'il prouve qu'il est vraiment destiné à de grands projets en accomplissant des gestes épiques.</p>
            <p>Ces faveurs peuvent être utilisées de 2 façons différentes :</p>
            <ul>
                <li>Éviter des conséquences dramatiques : si le personnage se retrouve dans une situation catastrophique dans laquelle il a de grandes chances de mourir, il peut dépenser une faveur pour s'en sortir d'une façon ou d'une autre.</li>
                <li>Choisir le résultat d'un lancer de dé : à n'importe quel moment, un joueur peut décider que ce jet de dé est d'une importance capitale pour son personnage, auquel cas il peut dépenser une faveur pour choisir le résultat de son jet.</li>
            </ul>
            <p>Comme annoncé plus tôt, les faveurs de Tychi permettent d'éviter la mort prématurée d'un personnage dans une certaine mesure. Si un personnage vient à se faire couper un membre suite à un jet de rupture raté ou autre, il peut utiliser une faveur pour ne pas perdre cette partie chérie de leur corps. Si un personnage atteint un nombre de points de vie négatif équivalent à sa valeur de vigueur, il peut se réveiller plusieurs jours plus tard, secouru par des autochtones l'ayant trouvé mourant au bord de la route s'il lui reste une faveur.</p>
            <p>Ces faveurs ont leur limites et il revient au MJ de décider du sort des personnages y ayant recours, que ce soit sous la forme d'un sauvetage in extremis par un groupe tiers, par un réveil douloureux dans un petit village. Chaque situation peut faire varier le résultat de l'utilisation d'une faveur.</p>
        </div>

        <h2 id="richesse_depart" onclick="hideContent(this)">Richesse de départ</h2>
        <div>
            <p>Le patrimoine monétaire d'un personnage au début de l'aventure est également tiré aux dés selon son origine sociale.</p>
            <p>Cet argent n'est pas utilisé pour acheter l'équipement de départ d'un personnage déjà expérimenté, on considère qu'un aventurier possède déjà un certain équipement d'une qualité équivalente à son niveau social.</p>
            <p>Un personnage noble décidant le jour de ses 20 de partir à l'aventure pourra s'offrir une belle arme et une armure, un paysan partira avec un couteau de cuisine ou un bâton.</p>
            <table>
                <tbody>
                <tr>
                    <th rowspan="2">Origine sociale</th>
                    <th colspan="3">Nombre de dé(s)</th>
                </tr>
                <tr>
                    <th>Pièces d'or</th>
                    <th>Pièces d'argent</th>
                    <th>Pièces de cuivre</th>
                </tr>
                <tr>
                    <td>Noble</td>
                    <td>5d8</td>
                    <td>3d10</td>
                    <td>1d10</td>
                </tr>
                <tr>
                    <td>Marchand</td>
                    <td>4d6</td>
                    <td>3d10</td>
                    <td>1d10</td>
                </tr>
                <tr>
                    <td>Artisan</td>
                    <td>3d6</td>
                    <td>3d10</td>
                    <td>1d10</td>
                </tr>
                <tr>
                    <td>Tenancier</td>
                    <td>2d6</td>
                    <td>3d10</td>
                    <td>1d10</td>
                </tr>
                <tr>
                    <td>Ouvrier</td>
                    <td>1d6</td>
                    <td>3d10</td>
                    <td>1d10</td>
                </tr>
                <tr>
                    <td>Paysan/Mineur</td>
                    <td/>
                    <td>3d10</td>
                    <td>1d10</td>
                </tr>
                <tr>
                    <td>Mendiant</td>
                    <td/>
                    <td/>
                    <td>1d10</td>
                </tr>
                </tbody>
            </table>
        </div>


        <h3 id="perso_anciennete" onclick="hideContent(this)">Ancienneté de votre personnage</h3>
        <div>
            <p>Il est possible de commencer une partie en incarnant des personnages ayant déjà accompli des exploits au lieu de débutants complets. Les personnages de ce type partent avec une certaine quantité d'expérience qu'ils peuvent dépenser comme bon leur semble pour améliorer leurs Caractéristiques ou leurs Compétences.</p>
            <p>Un personnage débutant devra encore faire ses preuves pour être reconnu comme un véritable Aventurier, s'il survit assez longtemps et acquiert assez de renommé il deviendra un Vétéran. Arrivé à ce stade, il se verra confier des missions qui feront de lui un Héros.</p>
            <p>Choisissez l'ancienneté de votre alter ego ou demander à votre MJ à combien s'élève vos points d'XP de départ pour les aventures qu'il a prévu pour vous et votre groupe.</p>
            <table id="table_carac_dice">
                <tbody>
                <tr>
                    <th>Expérience du personnage</th>
                    <th>Points d'Expérience de départ</th>
                    <th>Palier de compétence maximal</th>
                </tr>
                <tr>
                    <th>Débutant</th>
                    <td>21</td>
                    <td>Apprenti</td>
                </tr>
                <tr>
                    <th>Aventurier</th>
                    <td>36</td>
                    <td>Adepte</td>
                </tr>
                <tr>
                    <th>Vétéran</th>
                    <td>60</td>
                    <td>Expert</td>
                </tr>
                <tr>
                    <th>Héros</th>
                    <td>81</td>
                    <td>Maître</td>
                </tr>
                </tbody>
            </table>
        </div>

        <h2 id="rendre_vivant" onclick="hideContent(this)">Rendre votre personnage vivant</h2>
        <div>
            <p>Votre alter ego est prêt d'un point de vue mécaniques de jeu, mais est-il prêt d'un point de vue jeu de rôle ? Cette section va se concentrer sur l'histoire de votre personnage et ses objectifs, il vous est bien sûr possible de développer votre personnage en cours de jeu si c'est ce que vous souhaitez.</p>
            <h3 id="histoire_perso" onclick="hideContent(this)">Histoire du personnage</h3>
            <div class="hidden">
                <h4>Quel est votre nom ?</h4>
                <p>Le nom est le plus important, impossible de partir à l'aventure sans en posséder un à moins d'être anonyme. Chaque origine possède un style de nom différent que vous pouvez voir sur leurs pages respectives.</p>
                <h4>Avez vous de la famille ?</h4>
                <p>Que ce soit des parents, des frères, des sœurs ou bien même un conjoint ou encore des enfants avoir des relations familiales permet d'avoir une attache plus solide dans le monde pour votre alter ego et quelque chose à chérir et à protéger.</p>
                <h4>D'où venez vous ?</h4>
                <p>Que ce soit l'origine géographique ou sociale, cela peut avoir un impact sur la façon dont vous incarnez votre personnage. La vie n'est pas la même pour un enfant des rues du Sultanat et une princesse d'une grande maison Azuma.</p>
                <h4>Quels sont vos amis, alliés et ennemis</h4>
                <p>Avoir des camarades et des compagnons sur qui compter peut rendre la vie plus agréable. Avoir des ennemis peut à l'inverse la rendre dangereuse. Vous pourriez être poursuivi par un groupe de mercenaires après un cambriolage chez une personne influente ou être un explorateur commissionné par une faction puissante.</p>
                <h4>Que faisiez-vous avant de devenir un(e) aventurier(ère) et pourquoi avoir choisi cette voie ?</h4>
                <p>Cette question est peut-être la plus importante de toutes, les raisons peuvent être multiples et peuvent varier de la simple soif d'aventures à un désir de vengeance insatiable envers toute une catégorie de la population d'Ogma.</p>
            </div>
            <h3 id="apparence_perso" onclick="hideContent(this)">Apparence du personnage</h3>
            <div class="hidden">
                <ul>
                    <li>Taille</li>
                    <li>Poids</li>
                    <li>Couleur de peau</li>
                    <li>Cheveux</li>
                    <li>Couleur des yeux</li>
                    <li>Forme du visage</li>
                    <li>Cicatrices, tatouages ou autres signes particuliers</li>
                </ul>
                <p>Toutes ces précisions sont optionnelles dans la description de votre personnage, mais peuvent renforcer l'implication que vous avez vis-à-vis de lui. Il vous faudra tout de même rester cohérent avec l'origine que vous avez choisi, un Steinn mesurant 1m80 ou un Sakha de 120kg ont assez peu de chance d'exister.</p>
            </div>
        </div>

        <h2 id="progression_perso" onclick="hideContent(this)">Progression du personnage</h2>
        <div>
            <p>Votre personnage pourra progresser au fil de ses aventures si vous jouez sur une longue période avec lui. Votre MJ vous récompensera avec des points d'expérience(XP) pour les actions que vous avez menées. Vous pourrez dépenser ces points lors des pauses entres vos aventures pour améliorer vos caractéristiques et vos compétences.</p>
            <p>Pour améliorer une compétence au rang supérieur, il est nécessaire de posséder préalablement le palier inférieur, le coût indiqué représente la montée d'un seul palier. Le coût au total représente la quantité d'XP a dépensé pour acquérir ce palier en partant de zéro. </p>
            <table>
                <tbody>
                <tr>
                    <th>Progression</th>
                    <th>Coût en points d'XP</th>
                </tr>
                <tr>
                    <td style="border-bottom: none">Augmentation du dé de Caractéristique</td>
                    <td style="border-bottom: none">Moitié du dé de caractéristique au-dessus de l'actuel</td>
                </tr>
                <tr>
                    <td colspan="2">Passer d'un d6 à un d8 coute 4 XP, d'un d12 à un d12+1 coute 7 XP</td>
                </tr>
                <tr>
                    <td>Acquisition d'une compétence au rang Novice</td>
                    <td>1 XP</td>
                </tr>
                <tr>
                    <td>Amélioration au rang Adepte / Professionnel / Expert</td>
                    <td>2 XP</td>
                </tr>
                <tr>
                    <td>Amélioration au rang Maître / Spécialisation de compétence</td>
                    <td>3 XP</td>
                </tr>
                <tr>
                    <td>Nouvel équipement pour Style de Combat</td>
                    <td>1 XP</td>
                </tr>
                </tbody>
            </table>
            <p>La façon dont vous dépensez ces points d'XP dépend de votre façon de faire dans votre table, vous pouvez vous restreindre à les dépenser entre chaque aventure ou choisir de les dépenser dès que vous en avez la possibilité. Il est également possible d'intégrer cette progression dans la narration en expliquant à votre table comment et grâce à quoi(ou qui) vous avez pu progresser de la sorte.</p>
            <i>Note aux MJs : C'est à vous que revient la lourde de tâche de récompenser vos joueurs, vous pouvez distribuer les points d'XP de façon globale à tout le groupe à la fin de vos arcs narratifs ou de chaque session de jeu, de façon individuelle en fonction des exploits de vos joueurs voire un mélange de tout ça.<br/>En guise d'aide, comptez environ 1 point d'XP par heure de jeu pour chacun de vos joueurs. Il est tout à fait possible d'augmenter le taux d'XP par heure si vous souhaitez une progression plus rapide, ou d'inventer/utiliser un tout autre système de récompense.</i>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");