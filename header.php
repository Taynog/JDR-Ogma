<?php
require_once("params.php");
?>
<html xml:lang="fr" lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
    <link type="text/css"  rel="stylesheet" href="/Styles/common_rules.css">
    <link rel="icon" type="image/ico" href="/favicon.ico"/>
</head>
<body>
<div id="mySidenav" style="display: block">
    <ul class="sidenav ">
        <li><span class="index"><a href="/index.php">Accueil</a></span></li>
        <li><span class="partie" onclick="hideContent(this)">Lore</span>
            <ul>
                <li><span class="medium"><a href="/Data/World/Histoire_Ogma.php">Histoire du monde</a></span></li>
                <li><span class="medium"><a href="/Data/World/Carte_Ogma.php">Carte du monde</a></span></li>
                <li><span class="medium"><a href="/Data/World/Bestiaire.php">Bestiaire</a></span></li>
                <li><span class="dossier" onclick="hideContent(this)">Origines</span>
                    <ul class="hidden">
                        <li><span class="sous-dossier" onclick="hideContent(this)">Humaines</span>
                            <ul class="hidden">
                                <li><span class="little"><a href="/Data/Factions/Azuma.php">Azuma</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Sever.php">Sever</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Tuskizi.php">Tuskizi</a></span></li>
                            </ul>
                        </li>
                        <li><span class="sous-dossier" onclick="hideContent(this)">Magiques</span>
                            <ul class="hidden">
                                <li><span class="little"><a href="/Data/Factions/Sakha.php">Sakha</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Sihir.php">Sihir</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Steinn.php">Steinn</a></span></li>
                            </ul>
                        </li>
                        <li><span class="sous-dossier" onclick="hideContent(this)">Bestiales</span>
                            <ul class="hidden">
                                <li><span class="little"><a href="/Data/Factions/Chono.php">Chono</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Kanta.php">Kanta</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Mushuk.php">Mushuk</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Sarpa.php">Sarpa</a></span></li>
                                <li><span class="little"><a href="/Data/Factions/Tori.php">Tori</a></span></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><span class="partie" onclick="hideContent(this)">Jeu de Rôle</span>
            <ul>
                <li><span class="medium"><a href="/Data/Rules/Systeme.php">Système de jeu</a></span></li>
                <li><span class="sous-dossier"><a href="/Data/Rules/Personnage.php">Personnage</a></span> <span class="sidenav_expand" onclick="hideContent(this)">+</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#table_origine">Origine</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#Caracteristiques">Caractéristiques</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#Attributs">Attributs</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#Competences">Compétences</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#traits_perso">Traits de personnage</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#faveur_tychi">Faveurs de Tychi</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#richesse_depart">Richesse de départ</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Personnage.php#progression_perso">Progression</a></span></li>
                    </ul>
                </li>
                <li><span class="sous-dossier"><a href="/Data/Rules/Magie.php">Magie</a></span> <span class="sidenav_expand" onclick="hideContent(this)">+</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Magie.php#table_forme_sort">Forme des sorts</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Magie.php#table_alteration">École d'Altération</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Magie.php#table_conjuration">École de Conjuration</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Magie.php#table_domination">École de Domination</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Magie.php#table_mysticisme">École du Mysticisme</a> </span></li>
                    </ul>
                </li>
                <li><span class="sous-dossier"><a href="/Data/Rules/Combat.php">Combat</a></span> <span class="sidenav_expand" onclick="hideContent(this)">+</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Combat.php#deroulement_combat">Déroulement d'un combat</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#tour_de_jeu">Tour de Jeu</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#reactions">Réactions</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#style_combat">Style de Combat</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#engagement">Engagement en mêlée</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#passe_armes">Passe d'Armes</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#combat_cac">Combat en mêlée</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#combat_distance">Combat à distance</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Combat.php#blessures_mort">Blessures et mort</a> </span></li>
                    </ul>
                </li>
                <li><span class="sous-dossier"><a href="/Data/Rules/Survie.php">Survie</a></span> <span class="sidenav_expand" onclick="hideContent(this)">+</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Survie.php#besoins_journaliers">Besoins journaliers</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Survie.php#voyage">Voyage</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Survie.php#eclairage">Éclairage</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Survie.php#biomes">Biomes</a> </span></li>
                        <li><span class="little"><a href="/Data/Rules/Survie.php#dangers_naturels">Dangers naturels</a> </span></li>
                    </ul>
                </li>
                <li><span class="sous-dossier"><a href="/Data/Rules/Artisanat.php">Artisanat</a></span> <span class="sidenav_expand" onclick="hideContent(this)">+</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Artisanat.php#alchimie">Alchimie</a> </span></li>
                    </ul>
                </li>
                <li><span class="sous-dossier" onclick="hideContent(this)">Équipement</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Armes.php">Armes</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Armures.php">Armures</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Armures.php#boucliers">Boucliers</a></span></li>
                    </ul>
                </li>
                <li><span class="dossier" onclick="hideContent(this)">Glossaire</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Glossaire.php#etats">États</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Glossaire.php#traits">Traits</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Gabarit.php#gabarit_creatures">Gabarit des créatures</a></span></li>
                    </ul>
                </li>
                <li><span class="dossier" onclick="hideContent(this)">Objets et Services</span>
                    <ul class="hidden">
                        <li><span class="little"><a href="/Data/Rules/Objets.php#monnaie">Monnaie et conversions</a></span></li>
                        <li><span class="little"><a href="/Data/Rules/Objets.php#materiel_aventurier">Matériel</a></span></li>
                        <li><span class="sous-dossier" onclick="hideContent(this)">Services</span>
                            <ul class="hidden">
                                <li><span class="little"><a href="/Data/Rules/Objets.php#taverne">Taverne</a></span></li>
                                <li><span class="little"><a href="/Data/Rules/Objets.php#transports">Transports</a></span></li>
                                <li><span class="little"><a href="/Data/Rules/Objets.php#montures">Montures</a></span></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><span class="nav_ajout"><a href="/Data/Rules/Systeme.php#form_contact">Formulaire de contact</a></span></li>
        <li><a href="https://discord.gg/nTauBEU6MM"><img src="https://www.freepnglogos.com/uploads/discord-logo-png/discord-logo-logodownload-download-logotipos-1.png" alt="discord" width="25px"></a></li>
    </ul>
</div>
<div id="main" class="main" style="margin-left: 200px;">
    <button onclick="toggleNav()" class="openbtn">MENU</button>