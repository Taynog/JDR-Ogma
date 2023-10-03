<?php
$title = "Gabarit";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?> 

    <h1 id="gabarit_creatures" onclick="hideContent(this)">Gabarit des créatures</h1>
    <div>
        <p>Le monde d'Ogma contient de nombreuses créatures de tailles et formes très diverses. Il y a 9 gabarits possibles :</p>
        <ul>
            <li><span class="big_underline">Infime (I) :</span>Les créatures infimes sont parfois si petites qu'il est difficile de les apercevoir, parmi elles les araignées, les vers et les papillons.</li>
            <li><span class="big_underline">Minuscule (Min) :</span>Cette catégorie inclue les animaux les plus petits comme les rats, les grenouilles ou les moineaux.</li>
            <li><span class="big_underline">Très petite (TP) :</span>Les créatures très petites inclue les chats, les petites races de chiens, les renards.</li>
            <li><span class="big_underline">Petite (P) : </span>Cette catégorie inclue la plupart des quadrupèdes et les bipèdes les plus petits comme les Rodraki, les Steinns et les Sakhas.</li>
            <li><span class="big_underline">Moyenne (M) :</span>Les créatures de gabarit moyen sont d'une carrure équivalente à celles des humains.</li>
            <li><span class="big_underline">Grande (G) :</span>Cette catégorie inclue les créatures plus imposantes que les humains, parmi elles les Kanta, les Sarpas Crocodiles et les chevaux.</li>
            <li><span class="big_underline">Très Grande (TG) :</span>Les créatures très grandes sont particulièrement imposantes, parmi elles les éléphants, les griffons et les géants les plus petits.</li>
            <li><span class="big_underline">Gigantesque (Gig) :</span>Cette catégorie rassemble la plupart des géants, les baleines et bien d'autres.</li>
            <li><span class="big_underline">Colossale (C) :</span>Les créatures colossales sont de véritables calamités annonciatrices de désastres sans précédents : léviathans et dragons sont les plus dangereux.</li>
        </ul>
        <p>La différence entre chaque catégorie est un facteur de 2. Ainsi une créature plus petite d'une catégorie est deux fois moins imposante en termes de taille et/ou de masse, à l'inverser une créature plus grande de deux catégories est quatre fois plus imposante.</p>
        <p>Si vous utilisez une grille pour le combat tactique, une créature M ou P tient sur une seule case, une créature G tient sur 2x2 cases, une créature TG tient sur 3x3 cases, une créature Gig tient sur 4x4 cases et une créature C tient sur 5x5 cases. Les créatures TP tiennent à 2 sur une même case, à 4 pour les Min, à 8 pour les I.</p>

        <h2>Impact du gabarit</h2>
        <ul style="list-style-type: none">
            <li><h3>Combat</h3>
                <p>Tirer sur une petite cible avec une attaque à distance se fait avec des désavantages (P -> -1 AD ; TP -> -2 AD; Min -> -3 AD ; I -> -4 AD). Un tir sur une cible massive se fait avec des avantages (G -> +1 AD ; TG -> +2 AD ; Gig -> +3 AD; C -> +4 AD).</p>
                <p>Une créature plus petite que son adversaire obtient un bonus de +1 à ses tests de combat en mêlée par catégorie d'écart.</p>
            </li>
            <li><h3>Équipement</h3>
                <p>L'équipement est fait pour un certain gabarit, celle par défaut étant la Moyenne. Un objet fait pour une entité plus petite voit son prix divisé par deux par gabarit inférieur à Moyen et inversement le prix double par gabarit au-dessus.</p>
                <p>Pour manier une arme d'un gabarit différent du sien il doit exister un type d'arme similaire plus grand ou plus petit, par exemple une épée longue de gabarit M est une épée courte pour un gabarit G ou une grande épée pour un gabarit P. Manier une arme créée pour une créature d'un gabarit différent du sien se fait avec un désavantage et il est impossible d'utiliser des armes faites pour des créatures ayant 2 gabarit ou plus d'écart.</p>
                <p>Les armes faites pour les Grandes créatures ou plus voient leur dé de dégâts augmenter d'un <a href="Systeme.php#cran_des">cran</a> par catégorie au-dessus de Moyenne.</p>
            </li>
            <li><h3>Exploration et Survie</h3>
                <p>Une créature peut se faufiler dans un espace d'un gabarit inférieur au sien voire deux si la créature est exceptionnellement souple.</p>
            </li>
        </ul>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");