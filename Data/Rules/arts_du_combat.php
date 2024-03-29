<?php
$title = "Arts du Combat";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?>

<h1 id="manoeuvres_combat" onclick="hideContent(this)">Manoeuvres de combat</h1>
<div>
    <p>Ici sont répertoriés quelques règles pour les manoeuvres spéciales en combat, la liste n'est pas exhaustive et les joueurs sont encouragés à chercher toujours plus d'actions en combat. Par exemple, si on a une main libre, on peut écarter le bouclier de son adversaire, lui projetter du sable dans les yeux, lui baisser son pantalon ou lui dérober un objet à sa ceinture.</p>
    <p>La répétition et l'abus de ces manoeuvres les rendent de moins en moins efficaces, les ennemis seront capables de s'y préparer et se défendront plus facilement.</p>
    <p>Si rien n'est précisé en cas de réussite/échec critique, on considère que le MJ décide du résultat.</p>
    <p id="arts_du_combat_basiques" class="caption" onclick="hideContent(this)">Arts du combat basiques</p>
    <div>
        <p>Ces manoeuvres sont utilisables par quiconque maîtrise les bases du combat</p>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Condition(s)</th>
                <th>Épreuve<br/>(pour le joueur)</th>
                <th>Épreuve<br/>(pour l'adversaire)</th>
                <th>Effets si réussite</th>
                <th>Critique</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Balayette</th>
                <td>Le héros tente de faire tomber son adversaire au sol</td>
                <td>-</td>
                <td>Action bonus : DEX</td>
                <td>AGI</td>
                <td>La cible est au sol et passe son prochain tour, elle subit 2 dégâts</td>
                <td>R: La cible s'assome et sombre dans l'inconscience<br/>E: Le héros chute et passe son prochain tour</td>
            </tr>
            <tr>
                <th>Charge d'épaule</th>
                <td>Le héros bouscule son adversaire pour le faire tomber au sol</td>
                <td>-</td>
                <td>Action bonus : FOR</td>
                <td>VIG</td>
                <td>La cible est au sol et passe son prochain tour, elle subit 4 dégâts</td>
                <td>R: La cible s'assome et sombre dans l'inconscience<br/>E: Le héros trébuche et passe son prochain tour</td>
            </tr>
            <tr>
                <th>Coup dans les yeux</th>
                <td>Avec un rapide coup de dague au visage, le héros aveugle momentanément son adversaire</td>
                <td>Dague<br/>Cible sans casque</td>
                <td>Action simple :<br/>Jet d'Atq à -20</td>
                <td>Parade/Esquive à +10</td>
                <td>cible aveuglée partiellement : Atq et Prd -20 (3 tours)</td>
                <td>R: Dégâts + 2, cible aveugle 5 tours<br/>E: /</td>
            </tr>
            <tr>
                <th>Désarmement</th>
                <td>Le héros lutte habilement pour ôter son arme à son adversaire</td>
                <td>Après une attaque réussie</td>
                <td>Action bonus : DEX ou FOR</td>
                <td>DEX</td>
                <td>La cible est désarmée</td>
                <td>R: /<br/>E: Le héros fait tomber son arme à ses pieds.</td>
            </tr>
            <tr>
                <th>Feinte</th>
                <td>Le héros distrait son adversaire avant de frapper. La forme de la feinte est à préciser par le joueur</td>
                <td>Arme de corps-à-corps pouvant infliger des dégâts perforants</td>
                <td colspan="2">Action bonus :<br/>Le joueur lance un d100 avant de faire son jet d'attaque (avec bonus éventuels selon le personnage et au choix du MJ), son adversaire lance aussi un d100 (encore bonus et malus au choix du MJ). Le plus haut score l'emporte.</td>
                <td>La cible ne peut pas se défendre</td>
                <td>R: dégâts + 4<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité</td>
            </tr>
            <tr>
                <th>Fente</th>
                <td>Le héros s'appuie sur sa jambe avant pour frapper de loin</td>
                <td>Arme de corps-à-corps pouvant infliger des dégâts perforants</td>
                <td>Action simple :<br/>Moyenne Atq/AGI</td>
                <td>Parade/Esquive classique</td>
                <td>La portée augmente d'un mètre</td>
                <td>R: /<br/>E: Le héros trébuche et tombe au sol</td>
            </tr>
            <tr>
                <th>Lacération</th>
                <td>Le héros frappe pour ouvrir les veines de son adversaire</td>
                <td>Cible sans armure à l'endroit ciblé</td>
                <td>Action simple :<br/>Jet d'Atq à -10, les dégâts sont divisés par deux</td>
                <td>Parade/Esquive classique, si le coup touche, épreuve de VIG pour contrer le saignement</td>
                <td>la cible saigne (1d6/tour) pendant 3 tours</td>
                <td>R: 5 tours de saignement<br/>E: /</td>
            </tr>
            <tr>
                <th>Lutte</th>
                <td>Le héros agrippe son adversaire pour entraver ses options de combat</td>
                <td>Une main libre (si deux mains libres bonus de +20)</td>
                <td>Action simple : DEX ou FOR</td>
                <td>DEX ou FOR pour contrer la prise</td>
                <td colspan="2">Le héros doit réussir un jet par tour pour maintenir sa prise (FOR ou DEX du héros - FOR ou DEX de cible + 5 par tour). Durant la lutte, le héros peut déplacer la cible de la moitié de sa vitesse de déplacement, l'attaquer (ignore l'armure à 30 ou moins), l'immobiliser ou l'attacher (avec cordes ou autre) via une épreuve de DEX à -30.</td>
            </tr>
            <tr>
                <th>Provocation</th>
                <td>Le héros provoque son/ses adversaire(s) et le(s) pousse(nt) à l'attaquer en priorité</td>
                <td>-</td>
                <td>Action bonus : ELO</td>
                <td>Un jet de VOL pour chaque adversaire provoqué</td>
                <td>La cible se concentre sur le héros et attaque désormais avec deux désavantages les autres cibles pendant 3 rounds</td>
                <td>R: La durée de provocation passe à 5 rounds, la cible ne frappe que le héros<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité</td>
            </tr>
            <tr>
                <th>Ralliement</th>
                <td>Le héros motive ses alliés à continuer le combat</td>
                <td>-</td>
                <td>Action bonus : ELO</td>
                <td>-</td>
                <td>Les alliés récupèrent 1d6+(marge de réussite/10) points d'endurance</td>
                <td>R: /<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité</td>
            </tr>
            <tr>
                <th>Repositionnement</th>
                <td>Le héros lutte pour déplacer son adversaire</td>
                <td>-</td>
                <td>Action de mouvement : DEX ou FOR</td>
                <td>AGI ou VIG</td>
                <td>La cible est déplacée de 1m + 1m par 10 points de marge de réussite.</td>
                <td>R: /<br/>E: /</td>
            </tr>
            <tr>
                <th>Tranche</th>
                <td>Le héros saisit son arme à deux mains pour un violent coup horizontal</td>
                <td>Arme polyvalente ou à deux mains</td>
                <td>Action complexe :<br/>Un seul jet d'Atq à -15</td>
                <td>Chaque cible peut parer ou esquiver</td>
                <td>Touche toutes les cibles en face et à portée</td>
                <td>R: Dégâts + 2<br/>E: /</td>
            </tr>
            <tr>
                <th>Tranche-tendons</th>
                <td>Le héros frappe la cible dans les articulations des jambes pour l'empêcher de bouger.</td>
                <td>-</td>
                <td>Action simple :<br/>Jet d'attaque d'Atq à -25</td>
                <td>Parade/Esquive à -10</td>
                <td>Déplacement de la cible limité à un mètre par round</td>
                <td>R: dégâts + 3<br/>E: /</td>
            </tr>
            </tbody>
        </table>
    </div>
    <p id="arts_du_combat_specialistes" class="caption" onclick="hideContent(this)">Arts du combat de spécialiste</p>
    <div>
        <p>Les arts du combat de spécialiste ne sont utilisables que pour les personnages possédant des maîtrises d'armes.</p>
        <table>
            <thead>
            <tr>
                <th>Compétence</th>
                <th>Palier</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Condition(s)</th>
                <th>Épreuve (pour le joueur)</th>
                <th>Épreuve (pour l'adversaire)</th>
                <th>Effets si réussite</th>
                <th>Critique</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th rowspan="8">Arbalétrier</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="tir_precis_arbalete">
                <th>Tir précis</th>
                <td>L'arbalétrier prend son temps pour viser sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir à +15</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="tir_destabilisant_arbalete">
                <th>Tir déstabilisant</th>
                <td>L'arbalétrier prépare un tir particulièrement puissant pour faire chuter sa cible</td>
                <td>Jet rupture pour l'arme à +1</td>
                <td>Action complexe :<br/>Tir classique</td>
                <td>VIG pour ne pas tomber</td>
                <td>La cible est à terre</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="3">Expert</th>
            </tr>
            <tr id="tir_rapide_arbalete">
                <th>Tir rapide</th>
                <td>L'arbalétrier effectue un tir rapide à la hanche</td>
                <td>-</td>
                <td>Action bonus :<br/>Tir à -15</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr id="tir_penetrant">
                <th>Tir pénétrant</th>
                <td>L'arbalétrier tire sur deux cibles alignées et transperce la première pour atteindre la seconde</td>
                <td>2 cibles alignées</td>
                <td>Action complexe :<br/>Tir classique</td>
                <td>-</td>
                <td>Dégâts normaux pour la première cible, -3 pour la deuxième</td>
                <td>R : le carreau frappe une troisième cible si possible avec -6 dégâts.<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="7">Archer</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="tir_precis_arc">
                <th>Tir précis</th>
                <td>L'archer prend son temps pour viser sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir à +15</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="tir_destabilisant_arc">
                <th>Tir déstabilisant</th>
                <td>L'archer prépare un tir particulièrement puissant pour faire chuter sa cible</td>
                <td>Jet rupture pour l'arme à +1</td>
                <td>Action complexe :<br/>Tir classique</td>
                <td>VIG pour ne pas tomber</td>
                <td>La cible est à terre</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Expert</th>
            </tr>
            <tr id="volee_fleches">
                <th>Volée de flèches</th>
                <td>L'archer tire une flèche sur chacun des opposants qu'il a en ligne de mire (max 5)</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif</td>
                <td>-</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : La corde de l'arc se brise (Rupture)</td>
            </tr>
            <tr>
                <th rowspan="5">Assassin</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="frappe_assassine">
                <th>Frappe assassine</th>
                <td>L'assassin frappe un point faible de l'adversaire</td>
                <td>Attaque avec avantage</td>
                <td>Action simple :<br/>Atq classique</td>
                <td>Parade/Esquive classique</td>
                <td>Degâts x1,5</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Expert</th>
            </tr>
            <tr id="coup_mortel">
                <th>Coup mortel</th>
                <td>L'assassin élimine une cible incapable de se défendre</td>
                <td>Cible vulnérable(aveuglée, immobilisée, inconscient, etc...)</td>
                <td>Acton complexe :<br/>Jet d'Atq à -20</td>
                <td>Jet de Vigueur</td>
                <td>Mort instantanée de la cible</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="5">Barbare</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="frappe_lourde_barbare">
                <th>Frappe lourde</th>
                <td>Le barbare envoie son adversaire au sol en le frappant avec un force surhumaine</td>
                <td>FOR du barbare supérieure à celle de sa cible</td>
                <td>Action complexe<br/>Atq à -10</td>
                <td>jet d'AGI pour esquiver puis VIG pour résister à la mise au sol</td>
                <td>Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="destruction_barbare">
                <th>Destruction</th>
                <td>Le barbare tente de briser l'équipement de son adversaire avec son arme</td>
                <td>Rupture du barbare supérieure à l'adversaire</td>
                <td>Action simple :<br/>FOR</td>
                <td>AGI pour l'armure ou DEX pour l'arme suivi d'un test de rupture</td>
                <td>L'équipement ciblé est endommagé (arme: Atq et Prd -15, Dgt -2; armure : PR -2)</td>
                <td>R : L'équipement ciblé est détruit<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="5">Épéiste</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="double_attaque">
                <th>Double attaque</th>
                <td>Le héros frappe deux fois avec son arme dans un mouvement fluide</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Expert</th>
            </tr>
            <tr id="triple_attaque">
                <th>Triple attaque</th>
                <td>Le héros délivre un déluge de coup sur son adversaires et frappe trois fois</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="7">Faucheur</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="deplacement_force">
                <th>Déplacement forcé</th>
                <td>À l'aide de son arme, le faucheur force sa cible à se déplacer sous peine de subir une autre blessure</td>
                <td>Après une attaque réussie</td>
                <td>Action de mouvement :<br/>DEX pour coincer l'adversaire puis FOR pour le tirer</td>
                <td>AGI pour passer sous la lame puis VIG pour résister au déplacement</td>
                <td>La cible est déplacée de 1m + 1m par 10 points de marge de réussite</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="frappe_dos">
                <th>Frappe dans le dos</th>
                <td>Le faucheur utilise son arme pour frapper sa cible dans le dos, où l'armure est plus fine</td>
                <td>-</td>
                <td>Action simple :<br/>Jet d'Atq à -10</td>
                <td>Parade/Esquive classique</td>
                <td>Ignore 2 points de PR de l'armure</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Expert</th>
            </tr>
            <tr id="frappe_faucheuse">
                <th>Frappe de la faucheuse</th>
                <td>Le faucheur frappe deux fois en un seul et large mouvement</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="5">Fusilier</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="tir_precis_fusil">
                <th>Tir précis</th>
                <td>Le fusilier prend son temps pour viser sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir à +15</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="tir_destabilisant_fusil">
                <th>Tir déstabilisant</th>
                <td>Le fusilier prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible</td>
                <td>2 doses de poudres au lieu d'une</td>
                <td>Action complexe :<br/>Tir classique</td>
                <td>VIG pour ne pas tomber</td>
                <td>La cible est à terre</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="7">Hallebardier</th>
            </tr>
            <tr>
                <th rowspan="2">Novice</th>
            </tr>
            <tr id="reception_charge_hallebarde">
                <th>Réception de charge</th>
                <td>Le hallebardier se prépare à infliger une attaque d'opportunité à quiconque pénètre sa zone de contrôle</td>
                <td>-</td>
                <td>Action de mouvement :<br/>Aucune épreuve pour se préparer</td>
                <td>-</td>
                <td>Le hallebardier peut porter une attaque d'opportunité (avec un bonus de 10 à l'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="mise_au_sol">
                <th>Mise au sol</th>
                <td>Le hallebardier profite d'une attaque réussie pour agripper son adversaire avec le croc de son fer et l'amener au sol</td>
                <td>Après une attaque réussie</td>
                <td>Action bonus :<br/>FOR</td>
                <td>VIG pour ne pas tomber</td>
                <td>La cible est à terre</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="frappe_hampe">
                <th>Frappe de la hampe</th>
                <td>Le hallebardier enchaîne après une attaque par un coup de la hampe</td>
                <td>Après une attaque</td>
                <td>Action bonus :<br/>Atq</td>
                <td>Parade/Esquive classique</td>
                <td>1d4 de dégâts contondants</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="5">Lanceur</th>
            </tr>
            <tr>
                <th rowspan="3">Apprenti</th>
            </tr>
            <tr id="tir_precis_lanceur">
                <th>Tir précis</th>
                <td>Le lanceur prend son temps pour viser sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir à +10</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="tir_destabilisant_lanceur">
                <th>Tir déstabilisant</th>
                <td>Le lanceur prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir classique</td>
                <td>VIG pour ne pas tomber</td>
                <td>La cible est à terre</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="7">Lancier</th>
            </tr>
            <tr>
                <th rowspan="2">Novice</th>
            </tr>
            <tr id="reception_charge_lance">
                <th>Réception de charge</th>
                <td>Le lancier se prépare à infliger une attaque d'opportunité à quiconque pénètre sa zone de contrôle</td>
                <td>-</td>
                <td>Action de mouvement :<br/>Aucune épreuve pour se préparer</td>
                <td>-</td>
                <td>Le lancier peut porter une attaque d'opportunité (avec un bonus de 10 à l'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="double_estoc">
                <th>Double estoc</th>
                <td>Le lancier frappe deux fois de la pointe de sa lance</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Expert</th>
            </tr>
            <tr id="triple_estoc">
                <th>Triple estoc</th>
                <td>Le lancier délivre un déluge d'estoc sur son adversaires et frappe trois fois</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="5">Martelier</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="frappe_lourde_martelier">
                <th>Frappe lourde</th>
                <td>Le martelier envoie son adversaire au sol en le frappant avec un force surhumaine</td>
                <td>FOR du martelier supérieure à celle de sa cible</td>
                <td>Action complexe<br/>Atq à -10</td>
                <td>VIG pour résister à la mise au sol</td>
                <td>Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="destruction_martelier">
                <th>Destruction</th>
                <td>Le martelier tente de briser l'équipement de son adversaire avec son arme</td>
                <td>Rupture du martelier supérieure à l'adversaire</td>
                <td>Action simple :<br/>FOR</td>
                <td>AGI pour l'armure ou DEX pour l'arme suivi d'un test de rupture</td>
                <td>L'équipement ciblé est endommagé (arme: Atq et Prd -10,Dgt -2; armure : PR -2)</td>
                <td>R : L'équipement ciblé est détruit<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="7">Moine</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="coup_etourdissant">
                <th>Coup étourdissant</th>
                <td>Le moine frappe son adversaire au visage pour l'étourdir</td>
                <td>-</td>
                <td>Action complexe :<br/>Jet d'Atq à -10</td>
                <td>VIG pour résister</td>
                <td>La cible est étourdie</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="enchainement">
                <th>Enchaînement</th>
                <td>Le moine enchaîne les coups et frappe deux fois avec son bâton</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Expert</th>
            </tr>
            <tr id="enchainement_superieur">
                <th>Enchaînement supérieur</th>
                <td>Le moine délivre un déluge de coups sur son adversaires et frappe trois fois avec son bâton</td>
                <td>-</td>
                <td>Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire</td>
                <td>Parade/Esquive classique pour chaque frappe</td>
                <td>Autant de jets que d'attaques réussies</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="7">Pistolier</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="tir_precis_pistolet">
                <th>Tir précis</th>
                <td>Le pistolier prend son temps pour viser sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir à +15</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="tir_destabilisant_pistolet">
                <th>Tir déstabilisant</th>
                <td>Le pistolier prépare un tir particulièrement puissant avec une charge de poudre supplémentaire pour faire chuter sa cible</td>
                <td>2 doses de poudre au lieu d'une</td>
                <td>Action complexe :<br/>Tir classique</td>
                <td>VIG pour ne pas tomber</td>
                <td>La cible est à terre</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="3">Expert</th>
            </tr>
            <tr id="tir_rapide_pistolet">
                <th>Tir rapide</th>
                <td>Le pistolier effectue un tir rapide à la hanche</td>
                <td>-</td>
                <td>Action bonus :<br/>Tir à -10</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="5">Tirailleur</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="tir_precis_tirailleur">
                <th>Tir précis</th>
                <td>Le tirailleur prend son temps pour viser sa cible</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir à +15</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="2">Adepte</th>
            </tr>
            <tr id="harcelement">
                <th>Harcelement</th>
                <td>Le tirailleur harcèle ses adversaires avec trois tirs consécutifs</td>
                <td>-</td>
                <td>Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif</td>
                <td>-</td>
                <td>Dégâts normaux</td>
                <td>R : /<br/>E : /</td>
            </tr>
            </tbody>
        </table>
    </div>
    <p id="arts_du_combat" class="caption" onclick="hideContent(this)">Arts du combat</p>
    <div>
        <p>Ces arts du combat ne sont utilisables que pour les personnages possédant des compétences de combat.</p>
        <table>
            <thead>
            <tr>
                <th>Compétence</th>
                <th>Palier</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Condition(s)</th>
                <th>Épreuve (pour le joueur)</th>
                <th>Épreuve (pour l'adversaire)</th>
                <th>Effets si réussite</th>
                <th>Critique</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th rowspan="3">Coup précis</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="frappe_precision">
                <th>Frappe de précision</th>
                <td>Le héros vise un un point faible de l'armure</td>
                <td>-</td>
                <td>Action simple :<br/>Atq - 10</td>
                <td>Parade/Esquive classique</td>
                <td>Ignore 2 PR supplémentaire</td>
                <td>R : Dégâts + 4<br/>E : /</td>
            </tr>
            <tr>
                <th rowspan="3">Défenseur</th>
            </tr>
            <tr>
                <th rowspan="2">Apprenti</th>
            </tr>
            <tr id="coup_bouclier">
                <th>Coup de bouclier</th>
                <td>Le héros utilise son bouclier pour étourdir son adversaire en le frappant à la tête</td>
                <td>-</td>
                <td>Action bonus<br/>Atq du bouclier</td>
                <td>jet d'AGI pour esquiver puis VIG pour résister à l'étourdissement</td>
                <td>Atq et Prd de la cible -10 (3 rounds)</td>
                <td>R : Cible passe son prochain tour<br/>E : /</td>
            </tr>
            </tbody>
        </table>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");