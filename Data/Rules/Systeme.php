<?php
                $title = "Système de jeu";
        include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
        ?>

    <div id="rules">
        <p>Bienvenue sur la page des règles du jeu de rôle Ogma. Ce projet est encore en cours de construction et de nombreuses choses peuvent encore subir des modifications ou tout simplement disparaître.</p>
        <p>Les règles présentées ne sont pas la loi absolue, s'il vous prend l'envie de les modifier pour qu'elle vous corresponde mieux à vous et votre table, faites donc. Si vous avez des propositions ou des retours à faire, n'hésitez pas à <a href="../../index.php#contact">me contacter</a>.</p>
        <p>Certaines règles sont volontairement indiquées comme optionnelles et sont représentées ainsi : <span class="boxed">Règle optionnelle</span></p>
        <h1 id="resolution_action" onclick="hideContent(this)">Résolution des actions</h1>
        <div>
            <h3 id="des_utilises" onclick="hideContent(this)">Dés utilisés</h3>
            <div>
                <p>Dans le jeu de rôle Ogma, les dés polyédriques standards allant du d4 au d12 sont utilisés. À ceux-ci on rajoute de quoi faire un d2, que ce soit une pièce de monnaie, un d4 divisé par 2 ou autre.</p>
                <p>Le système de dés est conçu pour que les valeurs les plus grandes soient les meilleures.</p>
            </div>

            <h3 id="type_epreuves" onclick="hideContent(this)">Types de test</h3>
            <div>
                <p>Les tests parfois appelées épreuves, jets ou lancers de dés ne sont qu'une seule et même chose et fonctionnent sur le même principe : le maître de jeu (MJ) détermine une certaine valeur appelée degré de complexité (DC) qui représente la difficulté de l'action entreprise, le joueur devra lancer le dé demandé par le MJ en y ajoutant des modificateurs tels que les compétences de son personnage. Si le résultat est supérieur ou égal au DC fixé par le MJ, le jet est réussi. Plus le résultat dépasse le DC, plus l'action est réussie et au contraire, plus le résultat est en dessous du DC en cas d'échec, plus celui-ci est cuisant.</p>
                <p>Les tests étendus nécessitent un certain nombre de degrés de réussite (NDR) pour être menés à bien. À chaque fois que le personnage qui passe l'épreuve réussit, il ajoute son ou ses degré(s) de réussite à un total, si ce total excède celui fixé par le MJ pour la réussite de l'épreuve alors le test étendu est réussi.<br/> Ces tests se font dans une situation où le temps est compté, qu'il y a un enjeu à réussir rapidement ou que l'épreuve prend beaucoup de temps à effectuer. Exemple d'épreuve étendue : trouver la combinaison d'un coffre à l'ouïe alors que le propriétaire rôde non loin, négocier un prix avec un marchand pour un objet très prisé, défoncer une porte dans un bâtiment en flammes.</p>
                <p>Les tests opposés sont un type d'épreuve mettant en scène plusieurs participants tentant d'accomplir un but similaire ou une action contraire. Les participants font leurs jets et celui qui obtient le résultat le plus élevé l'emporte.<br/> Exemple d'épreuve opposée : un personnage en attaque un autre avec une arme de mêlée, trois personnes tentent d'attraper le même objet au vol, un défi au bras de fer.</p>
            </div>

            <h3 id="degre_reussite" onclick="hideContent(this)">Degré de réussite (DR)</h3>
            <div>
                <p>Lors d'un jet, on évalue le résultat d'un dé par rapport au DC. Le degré de réussite (DR) représente la différence entre le résultat du personnage et le DC.</p>
                <p>Le degré de réussite (DR) sont utilisées pour déterminer ce que produit le résultat d'un dé d'un point de vue scénaristique et mécanique.</p>
                <p>Exemple : Sur un test avec un DC de 8, on obtient 11, le degré de réussite est égal à 11-8=2. Sur un autre test avec un DC de 12, on obtient 6, le degré de réussite vaut 6-12=-6.</p>

                <table id="table_DR">
                    <tbody>
                    <tr>
                        <th>DR</th>
                        <th>Effet</th>
                    </tr>
                    <tr>
                        <td>+6 ou plus</td>
                        <td>Réussite parfaite, un maître n'aurait pas fait mieux, vous avez réussi un exploit.</td>
                    </tr>
                    <tr>
                        <td>+4 ou +5</td>
                        <td>Réussite exemplaire, vous atteignez votre objectif de façon spectaculaire.</td>
                    </tr>
                    <tr>
                        <td>+2 ou +3</td>
                        <td>Réussite incontestable, vous avez réussi ce que vous avez entrepris et personne ne se plaindra.</td>
                    </tr>
                    <tr>
                        <td>+0 ou +1</td>
                        <td>Réussite de justesse, vous êtes parvenu à votre objectif mais non sans encombre, ça s'est joué à peu de choses.</td>
                    </tr>
                    <tr>
                        <td>-0 ou -1</td>
                        <td>Échec de justesse, vous n'avez pas réussi aussi bien que vous le souhaiteriez, mais vous avez tout de même fait un pas en avant vers votre objectif.</td>
                    </tr>
                    <tr>
                        <td>-2 ou -3</td>
                        <td>Échec, vous n'avez pas progressez d'un pouce lors de votre tentative, vous vous y prenez mal.</td>
                    </tr>
                    <tr>
                        <td>-4 ou -5</td>
                        <td>Échec cuisant, non seulement vous avez raté votre coup, mais en plus vous empirez la situation.</td>
                    </tr>
                    <tr>
                        <td>-6 ou moins</td>
                        <td>Échec retentissant, personne n'aurait pu faire pire, c'est à croire que vous vouliez saboter votre plan. La situation s'envenime gravement et aura certainement des conséquences imprévues.</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h3 id="degre_complexite" onclick="hideContent(this)">Degré de complexité (DC)</h3>
            <div>
                <p>Lors d'un jet, on évalue le résultat d'un dé par rapport au DC. Le degré de complexité (DC) représente la difficulté de la tâche entreprise par le personnage.</p>

                <table id="table_DC">
                    <tbody>
                    <tr>
                        <th>DC</th>
                        <th>Difficulté</th>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Facile : Presque n'importe qui est capable de faire ça</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Normal : La plupart du monde en est capable, mais cela prendra peut-être plus de temps à certain</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Difficile : Sans entraînement ou des talents innés, cette tâche est inaccessible aux gens du commun</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Très difficile : Seules les personnes bien entraînées ou les force de la nature en sont capables</td>
                    </tr>
                    <tr>
                        <td>11+</td>
                        <td>Extrême : Sans entraînement, vous n'avez aucune chance</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <h3 id="avantage" onclick="hideContent(this)">Avantage et désavantage (AD)</h3>
            <div>
                <p>Selon la situation dans laquelle se fait le jet, il est possible de recevoir un ou plusieurs modificateurs nommés avantage(s) et désavantage(s). Un avantage reflète des circonstances favorables à une action, le désavantage implique le contraire.</p>
                <p>Si le jet se fait avec avantage(s), on lance un dé et on l'ajoute au résultat, avec désavantage(s), on l'enlève au résultat. Si le jet se fait avec avantage(s) et désavantage(s), ils s'annulent mutuellement, par exemple si on possède 2 avantage et 1 désavantage, on effectue le test avec un seul avantage.</p>
                <p>La taille du dé lancé augmente avec le nombre d'avantages/désavantages(AD) avec lesquels on effectue le jet : 1 AD -> d2, 2 AD -> d4, 3 AD -> d6, 4 AD -> d8, 5 AD -> d10, 6 AD -> d12. Il est impossible de lancer un dé plus grand qu'un d12, tout avantage supplémentaire ne ferait que compenser pour un désavantage supplémentaire.</p>
                <p>Par exemple : Bardin, un Steinn, souhaite défoncer une porte avec un bélier portatif ce qui lui procure 2 avantages, mais il pleut et le sol boueux le fait glisser ce qui lui inflige 1 désavantage. Il passe donc cette épreuve avec un avantage (+1 AD), il lance son d10 de force face à un DC de 6 et obtient 7, il a donc un DR de +1, il lance son d2 d'avantage et obtient 1, son DR passe à +2. La porte se brise sous les coups répétés de Bardin en quelques secondes malgré le sol glissant.</p>
                <p onclick="hideContent(this)">Exemples d'avantages :</p>
                <ul>
                    <li>Frapper un ennemi au sol, immobilisé, inconscient du danger, aveuglé, dans le dos, étourdi</li>
                    <li>Posséder un objet facilitant une action (examiner avec une loupe, ouvrir une porte avec un pied-de-biche/bélier portatif</li>
                </ul>
                <p onclick="hideContent(this)">Exemples de désavantages :</p>
                <ul>
                    <li>Effectuer une action délicate sous pression</li>
                    <li>Nager, escalader ou se faire discret avec une armure lourde</li>
                    <li>Porter une charge trop importante, tenter quelque chose en dehors de son champ d'expertise</li>
                </ul>
            </div>

            <h3 id="aide" onclick="hideContent(this)">Aide lors d'un test</h3>
            <div>
                <p>Dans certaines, il arrive que les joueurs se retrouvent face un obstacle imposant un test pour être passé, la personne la plus compétente commence le plus souvent et si elle échoue quelqu'un d'autre essaiera à son tour ainsi de suite jusqu'à ce qu'un personnage y parvienne ou que tous échouent.</p>
                <p>Pour éviter ce genre de situations où des personnages se relaient pour échouer, il est possible d'aider un autre personnage. Faire cette action nécessitent d'être capable d'aider le personnage effectuant le jet, c'est-à-dire posséder une compétence utile, un attribut suffisamment développé ou autre.</p>
                <p>Aider un autre personnage lui octroie un ou plusieurs avantages selon la qualité de l'aide fournie.</p>
            </div>

            <h3 id="cran_des" onclick="hideContent(this)">Cran des dés</h3>
            <div>
                <p>Les crans de dés sont ainsi représenté : 1d2 &#8594; 1d4 &#8594; 1d6 &#8594; 1d8 &#8594; 1d10 &#8594; 1d12 &#8594; 1d12+1 &#8594; 1d12+2 &#8594; 1d12+3 et ainsi de suite</p>
            </div>
        </div>

        <h3 id="arrondi_virgule" onclick="hideContent(this)">Arrondi des nombres décimaux</h3>
        <div>
            <p>Si jamais au cours d'un calcul le résultat est un nombre décimal (ou à virgule), l'arrondi se fait à l'entier le plus proche. Dans le cas d'un demi-entier derrière la virgule (ex : 0,5) l'arrondi se fera à l'entier supérieur. Ainsi 2,3 devient 2 ; 5,66 devient 6 et 8,5 devient 9.</p>
        </div>
    </div>

    <h1 id="form_contact" onclick="hideContent(this)">Formulaire de contact</h1>
    <div>
        <form action="https://formspree.io/mdowgeba" method="post">
            <label for="mail">Email (optionnel) : </label> <input name="mail" id="mail"/><br/><br/>
            <label for="objet" style="padding-right: 3px">Objet du contact : </label>
            <input name="objet" required/><br/><br/>
            <label for="contenu">Contenu :</label><br/>
            <textarea required cols="100" rows="15" id="contenu" name="contenu"></textarea><br/><br/>
            <input type="submit" value="Envoyer"/>
        </form>
    </div>

        <?php

                include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");