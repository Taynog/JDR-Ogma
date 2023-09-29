<?php
$title = "Ogma";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>
    <h1 class="center">Encyclopédie des Origines d'Ogma</h1>

    <div class="center">
        <p>Ce site rassemble une partie du processus de création d'un monde imaginaire nommé "Ogma".<br/> Il rassemble la majorité des factions civilisées de ce monde de high-fantasy.<br/> Ogma a été créé dans l'optique d'y faire évoluer des joueurs par le biais du jeu de rôle.<br/>
        </p>
    </div>
    <br/>
    <div class="center">
        <a href="Data/Factions/Azuma.php"><img src="Images/Factions/Azuma_picture.jpg" alt="Noble Azuma" height="320" title="Azuma"/></a>
        <a href="Data/Factions/Sever.php"><img src="Images/Factions/Sever_picture.jpg" alt="Guerrier Sever" height="320" title="Sever"/></a>
        <a href="Data/Factions/Tuskizi.php"><img src="Images/Factions/Tuskizi_picture.jpg" alt="Pirate Tuskizi" height="320" title="Tuskizi"/></a>

        <a href="Data/Factions/Sakha.php"><img src="Images/Factions/Sakha_picture.jpg" alt="Chaman Sakha" height="320" title="Sakha"/></a>
        <a href="Data/Factions/Sihir.php"><img src="Images/Factions/Sihir_picture.jpg" alt="Mage Sihir" height="320" title="Sihir"/></a>
        <a href="Data/Factions/Steinn.php"><img src="Images/Factions/Steinn_picture.jpg" alt="Noble Steinn" height="320" title="Stein"/></a>

        <a href="Data/Factions/Chono.php"><img src="Images/Factions/Chono_picture.jpg" alt="Alpha Chono" height="320" title="Chono"/></a>
        <a href="Data/Factions/Kanta.php"><img src="Images/Factions/Kanta_picture.jpg" alt="Matriarche Kanta" height="320" title="Kanta"/></a>
        <a href="Data/Factions/Mushuk.php"><img src="Images/Factions/Mushuk_picture.jpg" alt="Capitaine Mushuk" height="320" title="Mushuk"/></a>
        <a href="Data/Factions/Sarpa.php"><img src="Images/Factions/Sarpa_picture.jpg" alt="Mages Sarpa" height="320" title="Sarpa"/></a>
        <a href="Data/Factions/Tori.php"><img src="Images/Factions/Tori_picture.jpg" alt="Moine Tori" height="320" title="Tori"/></a>
    </div>
    <hr/>
    <ul class="changelog">
        <li><h3>Version actuelle du site : 3.1 06/06/2022</h3>
        <ul>
            <li>Refonte technique du site</li>
        </ul>
        </li>
        <li><h3 onclick="hideContent(this)">Anciens changelogs</h3>
            <div class="hidden">
            <ul class="space_list">
                <li><strong>Version 3.0 07/02/2022</strong>
                    <ul>
                        <li>Changement du d100 à un système basé sur des dés de caractéristiques de différentes tailles.</li>
                        <li>La magie a été rééquilibrée pour soutenir le nouveau système de dés, les <a href="Data/Rules/Magie.php#rituels">rituels</a> sont désormais encadrés par des règles.
                        </li>
                        <li>L'armure a été simplifiée : suppression de la localisation, matériaux organisés en différents tiers, boucliers entièrement revus.</li>
                        <li>Les armes et leurs propriétés ont été revues pour soutenir la nouvelle mécanique de dés.</li>
                        <li>Les compétences ont été regroupés pour certaines, évitant ainsi les chevauchements.</li>
                        <li>Les règles de spécialisation ont changé, aucun prérequis et effets modifiés.</li>
                        <li><a href="Data/Rules/Survie.php#capacite_port">Capacité de port simplifiée</a>.</li>
                        <li>Combat légèrement modifié pour plus de clarté, réaparition des <a href="Data/Rules/Combat.php#postures_combat">postures</a>.</li>
                        <li>Disparition des jauges de vitalité, psy et endurance vers un système de <a href="Data/Rules/Personnage.php#blessures">blessures</a> et de <a href="Data/Rules/Personnage.php#traumas">traumas</a> plus simple à suivre.
                        </li>
                        <li>Ajouts d'exemples de traits de personnages pour stimuler l'imagination des joueurs</li>
                        <li>Nombreux changements sur le glossaire pour soutenir la nouvelle mécanique de dés.</li>
                        <li>Nouveau Matériau : Alkite</li>
                        <li>Dikaï change de nom et devient Pravoï.</li>
                    </ul>
                </li>
                <li><strong>Version 2.4.1 15/10/2021</strong>
                    <ul>
                        <li>Supression de la localisation Jambe G et Jambe D pour les fusionner.</li>
                        <li>Changements sur l'encombrement et la capacité de port.</li>
                        <li>Changements au niveau de la <a href="Data/Rules/Tableaux.php#gabarit_creatures">taille/gabarit</a> des créatures.</li>
                        <li>Changements au niveau de l'endurance, notamment dans la formule de calcul et ajouts d'actions consommants des PE.</li>
                        <li>Changements sur l'impact des BdCarac : le SCMax est déterminé par le BdInt, le BdVig augmente la robustesse, le BdVol augmente la sérénité.</li>
                    </ul>
                </li>
                <li><strong>Version 2.4 20/09/2021</strong>
                    <ul>
                        <li><a href="Downloads/Fiche%20Perso%20Ogma.xlsx">Nouvelle fiche de personnage</a></li>
                        <li>Ajout de l'<a href="Data/Rules/Artisanat.php#alchimie">Alchimie</a></li>
                        <li>Nouvelles formules pour le calcul de la Vitalité des entités. La catégorie de taille est désormais prise en compte, les entités sont désormais plus frêles, à l'exception des entités Grandes ou plus.
                        </li>
                        <li>Révision de la création de personnage pour intégrer l'XP dès les premiers pas du personnage, permettant ainsi à l'XP de mesurer la puissance d'un personnage.
                        </li>
                        <li>Révision de la page Survie, certaines choses n'étaient plus au goût du jour.</li>
                        <li>Nouvelle propriété d'armes : Anti-Large : +10 pour toucher les cibles plus grandes.</li>
                        <li>Révision partielle des sorts, certains devaient voir leurs effets encadrées (Réécriture mémorielle), d'autres ont simplement reçus un coup de polish.
                        </li>
                        <li>Réarrangement des compétences : Calme a fusionné avec Résistance, Équitation avec Dressage et Bluff avec Persuasion.</li>
                        <li>Correction de coquilles</li>
                    </ul>
                </li>
                <li><strong>Version 2.3 28/07/2021</strong>
                    <ul>
                        <li>Réorganisation du site.</li>
                        <li>La Rupture, règle optionnelle trop peu utile et utilisée, disparaît du système de jeu.</li>
                        <li>Refonte des <a href="Data/Rules/Personnage.php#table_carac_origine">bonus d'origines</a>.</li>
                        <li>Combat Rapide : Mise à jour du système de combat pour le rendre plus mortel, limiter la perte de temps à chaque tour de jeu et le nombre de round.</li>
                        <li>Légères modifications d'équilibrage des sorts, clarification des formes de sorts</li>
                    </ul>
                </li>
                <li><strong>Version 2.2.2 14/04/2021</strong>
                    <ul>
                        <li>Corrections de divers coquilles, notamment dans les <a href="Data/Rules/Armes.php#proprietes_armes">propriétés des armes</a>.</li>
                        <li>Fusion des écoles de magie : L'élémentalisme rejoint la Conjuration, et l'Illusion rejoint la Domination. La création d'illusion rejoint la Conjuration et l'invisibilité rejoint l'Altération.
                        </li>
                        <li>L'école de Divination devient l'école du Mysticisme, école de magie générale pour tout les effets non étudiés par les autres écoles.</li>
                    </ul>
                </li>
                <li><strong>Version 2.2.1 11/04/2021</strong>
                    <ul>
                        <li>Changement au niveau de l'équipement, ajout de malus individuels aux pièces d'armure selon leur catégorie.</li>
                        <li>Corrections et changement sur les <a href="Data/Rules/Personnage.php#table_carac_origine">bonus aux caractéristique d'origine</a>.</li>
                    </ul>
                </li>
                <li><strong>Version 2.2 09/04/2021</strong>
                    <ul>
                        <li>Allègement de certaines règles, suppression des points d'actions(PA), prix de l'équipement revisité</li>
                        <li>Rework du système de capacité de port notamment au niveau des contenants et du poids des objets</li>
                        <li>Ajout de la mécanique de points d'expérience dans la partie <a href="Data/Rules/Personnage.php#progression_perso">Progression</a>.</li>
                    </ul>
                </li>
                <li><strong>Version 2.1 29/01/2021</strong>
                    <ul>
                        <li>Corrections de quelques problèmes dans toutes les catégories dans la <a href="Data/Rules/Personnage.php#creation_perso">création de personnage</a>, la <a href="Data/Rules/Magie.php#Magie">magie</a> et le <a href="Data/Rules/Combat.php#Combat">combat</a>.
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        </li>
    </ul>

    <hr/>
    <h3 onclick="hideContent(this)">Remerciements aux associés et beta-testeurs</h3>
    <div>
        <table>
            <tbody>
            <tr>
                <th colspan="2">Merci à eux</th>
            </tr>
            <tr>
                <th>Associés</th>
                <td>
                    Ollierovsky, Tabernak, Lulux
                </td>
            </tr>
            <tr>
                <th>Beta-testeurs</th>
                <td>
                    Ollierovsky, Tabernak, Okami, Tsuyuky, Crodragon, Lulux, Pirate73, Mathias-Mathias, Battosai_99
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");