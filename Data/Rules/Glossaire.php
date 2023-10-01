<?php
include($_SERVER['DOCUMENT_ROOT'] . "/params.php");
$title = "Glossaire";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
?> 
    <h1 id="etats" onclick="hideContent(this)">États</h1>
    <div>
        <p>Si plus d’un état affecte le personnage, appliquez-en tous les effets. Si les effets ne peuvent se combiner, appliquez les plus handicapants.</p>

        <h3 id="a_terre" onclick="hideContent(this)">À Terre</h3>
        <div>
            <p>Le personnage se trouve étendu sur le sol. Sa vitesse est divisée par 2. Certaines actions comme tirer à l'arc sont impossibles ou se font avec une grande difficulté lorsque l'on est allongé sur le sol.</p>
            <p>Se coucher au sol ne coûte rien mais se relever coûte la moitié de la vitesse du personnage et provoque une attaque d’opportunité.</p>
            <p>Cibler une créature à terre se fait avec 2 désavantages.</p>
        </div>

        <h3 id="assourdi" onclick="hideContent(this)">Assourdi</h3>
        <div>
            <p>L'entité perd l'usage de l'ouïe et subit les malus suivants :</p>
            <ul>
                <li>L'entité n'entend plus rien</li>
                <li>3 désavantages aux épreuves bénéficiant de l'ouïe</li>
                <li>Rate automatiquement toutes les épreuves se basant uniquement sur l'ouïe</li>
            </ul>
        </div>

        <h3 id="aveugle" onclick="hideContent(this)">Aveuglé</h3>
        <div>
            <p>L'entité perd l'usage de la vision et subit les malus suivants :</p>
            <ul>
                <li>L'entité ne voit plus rien</li>
                <li>3 désavantages aux épreuves bénéficiant de la vision</li>
                <li>Rate automatiquement toutes les épreuves se basant uniquement sur la vision</li>
            </ul>
        </div>

        <h3 id="brulure" onclick="hideContent(this)">Brûlure(X)</h3>
        <div>
            <p>L'entité est en feu, l'intensité des flammes est déterminé par un nombre X. Une entité souffrant de l'état brûlure :</p>
            <ul>
                <li>subit X points de dégâts de feu sur la partie de son corps en train de brûler. Cette quantité de dégâts augmente de 1 par round. Si le personnage subit deux sources de brûlure en même temps, les deux X se cumulent. </li>
                <li>doit passer un test de Volonté DCX pour entreprendre une action autre que tenter d'éteindre le feu.</li>
                <li>peut tenter d'éteindre les flammes en se roulant au sol. Cela consomme votre mouvement pour ce tour et nécessite de passer un test d'Agilité DCX. L'entité passe <a href="Glossaire.xhtml#a_terre">à terre</a> et perds l'état brûlure si le test est une réussite.</li>
            </ul>
        </div>

        <h3 id="cache" onclick="hideContent(this)">Caché</h3>
        <div>
            <p>Le personnage est dissimulé dans son environnement et échappe à la vue de ses ennemis. Le personnage doit dépenser le double de mouvement pour se déplacer en restant caché. Les cibles qui subissent une attaque d'une entité cachée ne peuvent se défendre mais l'entité perd alors son état caché.</p>
            <p>Si le personnage entre dans la ligne de vue d'une entité, il doit passer un test de Furtivité(Agilité) opposé à un test d'Observation(Perception) de l'entité. S'il réussit, il reste caché sinon il perd cet état.</p>
        </div>

        <h3 id="confus" onclick="hideContent(this)">Confus</h3>
        <div>
            <p>Le personnage a du mal à coordonner ses mouvements et ne peut faire qu'une action ou un déplacement lors de son tour.</p>
        </div>

        <h3 id="effraye" onclick="hideContent(this)">Effrayé(Source)</h3>
        <div>
            <p>Une créature effrayée fait tout pour s'éloigner de la source de sa peur. Si la créature voit la source de sa peur et que son action n'est pas de s'en éloigner, elle effectue cette action avec 3 désavantages.</p>
        </div>

        <h3 id="entrave" onclick="hideContent(this)">Entravé</h3>
        <div>
            <p>Une entité entravée est limitée dans ses mouvements par des liens. Elle se déplace à la moitié de sa vitesse et effectue toute épreuve physique avec deux désavantages.</p>
        </div>

        <h3 id="empoisonnement" onclick="hideContent(this)">Empoisonnement(X)</h3>
        <div>
            <p>La créature est affectée par une toxine nocive et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude de l'Empoisonnement diminue de 1 à la fin du tour de l'entité.</p>
            <p>Une créature empoisonnée effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l'amplitude de l'empoisonnement.</p>
            <p>Il est possible de réduire la magnitude de l'Empoisonnement en passant un test de Medicine DC X, en cas de réussite, la magnitude de l'Empoisonnement est réduite du DR de ce jet. Lorsque deux sources infligent un empoisonnement, appliquez seulement celui ayant la plus grande magnitude.</p>
        </div>

        <h3 id="etourdi" onclick="hideContent(this)">Étourdi</h3>
        <div>
            <p>Un personnage étourdi laisse tomber ce qu’il avait en main, ne peut intenter aucune action et se défend avec 2 désavantages durant toute cette période.</p>
        </div>

        <h3 id="fascine" onclick="hideContent(this)">Fasciné</h3>
        <div>
            <p>Une créature est fascinée par un sort ou un effet surnaturel. Tant que l’effet persiste, une créature fascinée reste assise ou debout, dans l’incapacité d’effectuer d’autre action que se concentrer sur l’effet en question. Elle subit 2 désavantages sur tous les jets. L’arrivée d’une menace potentielle (comme une créature hostile) donne droit à un nouveau jet pour contrer l’effet de fascination. Toute menace évidente, comme dégainer une arme, lancer un sort ou tirer sur la créature, rompt immédiatement l’effet de fascination. En dépensant sa réaction, il est possible de secouer une créature fascinée pour lui faire reprendre ses esprits.</p>
        </div>

        <h3 id="immobilise" onclick="hideContent(this)">Immobilisé</h3>
        <div>
            <p>Une créature immobilisée ne peut plus se déplacer. Elle peut effectuer toute action n'incluant pas de déplacement.</p>
        </div>

        <h3 id="inconscient" onclick="hideContent(this)">Inconscient</h3>
        <div>
            <p>Un personnage inconscient est incapable de faire quoi que ce soit et s'effondre à terre sauf s'il est maintenu dans une autre position.</p>
        </div>

        <h3 id="invisible" onclick="hideContent(this)">Invisible</h3>
        <div>
            <p>Les créatures invisibles ne peuvent être vues. Les personnages ratent automatiquement les jets pour les détecter basés sur la vision. Attaquer une entité invisible se fait avec 3 désavantages, et ce, même si on sait à peu près ou elle se trouve.</p>
        </div>

        <h3 id="maitrise_paralysie" onclick="hideContent(this)">Maîtrisé / Paralysé</h3>
        <div>
            <p>Un personnage maîtrisé est retenu par une créature, un piège ou un effet. Il ne peut ni bouger ni attaquer ni se défendre.</p>
        </div>

        <h3 id="mort" onclick="hideContent(this)">Mort</h3>
        <div>
            <p>Le personnage était mourant et n'est pas parvenu à se stabiliser. La psyché du personnage quitte son enveloppe corporelle. On ne peut plus soigner un personnage mort que ce soit par des moyens ordinaires ou magiques, mais il peut être ramené à la vie par magie. Un corps sans vie se décompose normalement si on ne le préserve pas.</p>
        </div>

        <h3 id="mourant" onclick="hideContent(this)">Mourant</h3>
        <div>
            <p>Le personnage est inconscient et en train de mourir. Une entité mourante ne peut pas entreprendre la moindre action et doit passer un test de Vigueur DC 1 par minute ou à chaque fois qu'elle subit des dégâts, après 3 échecs l'entité meurt. Après 3 réussites l'intervalle entre chaque jet passe à une heure, après 3 autres réussites, l'entité devient stable et n'est plus mourante.</p>
            <p>Un personnage mourant peut être stabilisé par l'intervention d'une personne extérieure.</p>
        </div>

        <h3 id="ralenti" onclick="hideContent(this)">Ralenti</h3>
        <div>
            <p>Une créature ralentie se déplace à la moitié de sa vitesse.</p>
        </div>

        <h3 id="saignement" onclick="hideContent(this)">Saignement(X)</h3>
        <div>
            <p>La créature saigne abondamment et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude du Saignement diminue de 1 à la fin du tour de l'entité.</p>
            <p>Une créature qui saigne effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l'amplitude du saignement.</p>
            <p>Il est possible de réduire la magnitude du Saignement en passant un test de Medicine DC X, en cas de réussite, la magnitude du Saignement est réduite du DR de ce jet. Lorsque deux sources infligent un saignement, appliquez seulement celui ayant la plus grande magnitude.</p>
        </div>

        <h3 id="stable" onclick="hideContent(this)">Stable</h3>
        <div>
            <p>Le personnage a été stabilisé, il n’est plus mourant mais reste inconscient. Un personnage stable redevient conscient après 2d6 - la moitié du dé de Vigueur/Volonté du personnage.</p>
        </div>

        <h3 id="surpris" onclick="hideContent(this)">Surpris</h3>
        <div>
            <p>Prise de court, cette entité ne peut effectuer qu'un mouvement ou une action et ne peut pas entreprendre de <a href="Combat.php#reactions">réactions</a>.</p>
        </div>
    </div>

    <h1 id="traits" onclick="hideContent(this)">Traits</h1>
    <div>

        <h3 id="absorption_magique" onclick="hideContent(this)">Absorption magique(X)</h3>
        <div>
            <p>Cette entité peut absorber la psy d'un sort dont elle est la cible. Si cette entité vient à être touchée par un sort lancez un d10, si le résultat est inférieur ou égale à X le sort n'a aucun effet sur la créature et elle récupère d'un trauma.</p>
        </div>

        <h3 id="amphibien" onclick="hideContent(this)">Amphibien</h3>
        <div>
            <p>Cette entité se déplace à vitesse normale dans l'eau, n'est pas limité par sa compétence d'Athlétisme et inflige des dégâts normaux lorsqu'elle se bat dans l'eau.</p>
        </div>

        <h3 id="arme_naturelle" onclick="hideContent(this)">Arme naturelle(Z, X)</h3>
        <div>
            <p>Une partie du corps Z de cette entité peut être utilisé comme une arme infligeant X dégâts. L'entité ne perd l'usage de cette arme que si elle perd cette partie de son corps.</p>
        </div>

        <h3 id="artificiel" onclick="hideContent(this)">Artificiel</h3>
        <div>
            <p>Cette entité n'est pas vivante mais animé par d'autres moyens. Elle n'a besoin ni de respirer, ni d'organes fonctionnels. Elle est immunisée aux effets tels que les maladies, les poisons, les blessures, le vieillissement, le sommeil et la fatigue.</p>
        </div>

        <h3 id="debilitant" onclick="hideContent(this)">Débilitant(X)</h3>
        <div>
            <p>Cette entité peut empoisonnée sa cible si elle inflige une perte de vitalité avec ses armes naturelles. L'entité touchée doit passer un test de Résistance(Vig) DCX, si elle échoue, elle contracte un <a href="Glossaire.xhtml#empoisonnement">Empoisonnement</a> d'une amplitude équivalente à son DR négatif.</p>
        </div>

        <h3 id="endommage" onclick="hideContent(this)">Endommagé(X)</h3>
        <div>
            <p>Cet objet est abîmé et tous les tests dans lesquels il est utilisé se font avec un malus de X désavantages. Si cet objet est une arme, elle inflige 1 point de dégâts en moins, si c'est une armure, sa PR diminue de 1.</p>
            <p>Un objet endommagé peut être réparé pour un coût équivalent à X*10% du prix de base de l'objet. Si la magnitude de l'endommagement dépasse 3, cet objet est détruit.</p>
        </div>

        <h3 id="estomac_solide" onclick="hideContent(this)">Estomac solide</h3>
        <div>
            <p>Cette entité possède un estomac particulièrement tolérant vis-à-vis des aliments ingérés. Cette entité peut consommer de la viande crue et de l'eau non purifiée sans craindre les maladies.</p>
        </div>

        <h3 id="etheree" onclick="hideContent(this)">Éthérée</h3>
        <div>
            <p>Cette entité est immatérielle, capable de passer au travers des objets et d'apparence translucide. Elle obtient le trait Volant(Vitesse) et peuvent se déplacer librement dans l'espace même à travers des objets solides. Elles peuvent être ciblées par des attaques mais ne subissent des dommages que de la part d’armes en virgonium, de sorts, de pouvoirs magiques et d’effets surnaturels.</p>
            <p>Les entités éthérées ne peuvent normalement pas interagir avec le monde matériel mais peuvent utiliser la magie et des attaques capables d'infliger des dégâts aux êtres vivants. Ces attaques ignorent la PR des armures ne possédant pas un revêtement en virgonium et ne peuvent être bloqués ou parés par des boucliers et des armes sans ce même revêtement.</p>
        </div>

        <h3 id="extraplanaire" onclick="hideContent(this)">Extraplanaire(Z)</h3>
        <div>
            <p>Cette entité provient d'un autre plan d'existence noté Z. Si elle meurt, est détruite ou bannie, elle retourne dans son plan d'origine.</p>
        </div>

        <h3 id="grimpeur" onclick="hideContent(this)">Grimpeur(X)</h3>
        <div>
            <p>Cette entité peut escalader n'importe quel paroi qu'importe son inclinaison à une vitesse de X mètres par tour.</p>
        </div>

        <h3 id="immortel" onclick="hideContent(this)">Immortel</h3>
        <div>
            <p>Cette entité ne subit pas les effets du vieillissement et peut vivre éternellement en bonne santé.</p>
        </div>

        <h3 id="immunite" onclick="hideContent(this)">Immunité(X)</h3>
        <div>
            <p>Cette entité est immunisé à un type de dégâts X, tous les dégâts subis par cet élément sont nullifiés. L'entité réussit automatiquement tous les jets visant à résister à un effet provoqué par cet élément.</p>
        </div>

        <h3 id="inflexible" onclick="hideContent(this)">Inflexible(X)</h3>
        <div>
            <p>Cette entité est naturellement résistante à la magie, sa résistance magique augmente de X.</p>
        </div>

        <h3 id="lien" onclick="hideContent(this)">Lien(Source)</h3>
        <div>
            <p>Cette entité est liée par magie à son monde ou à quelqu'un.</p>
            <p>Elle doit obéir aux ordres de son maître sauf s'il s'agit de sa défense personnelle. Elles ne pèsent pratiquement rien et l'on considère leur encombrement comme nul (ENC0).</p>
        </div>

        <h3 id="photosensibilité" onclick="hideContent(this)">Photosensibilité(X)</h3>
        <div>
            <p>Cette entité ne supporte pas la lumière, que ce soit celle du Soleil ou de Safi. En plus de posséder une Vulnérabilité(lumière, X), cette entité doit passer un test de Vigueur DC X par heure d'exposition à la lumière du soleil, chaque heure consécutive augmente le DC de 1. Les nuages et autres évènements météorologiques du même genre divise par deux le DC.</p>
        </div>

        <h3 id="rampant" onclick="hideContent(this)">Rampant</h3>
        <div>
            <p>Cette créature se déplace en rampant plutôt qu'en marchant. Elle n'est pas ralentie pas les terrains difficiles tels que les hautes herbes et les terrains mous (boue, sable humide).</p>
        </div>

        <h3 id="regeneration" onclick="hideContent(this)">Régénération(X)</h3>
        <div>
            <p>Cette entité cicatrise à une vitesse incroyable, à chaque début de round, elle lance un d10, si le résultat est inférieur ou égal à X, la créature récupère d'une blessure.</p>
        </div>

        <h3 id="resistance" onclick="hideContent(this)">Résistance(Z, X)</h3>
        <div>
            <p>Cette entité est résistante à un type de dégâts, ce qui signifie qu'elle subira des dommages réduits face à ce genre de dégâts. On note ainsi la résistance d'une créature : Résistance(Z, X) où Z est l'élément infligeant X points de dégâts en moins si la créature est touchée par cet élément.</p>
            <p>Ce trait accorde Z avantages aux tests réalisés pour résister à un effet de l'élément X.</p>
            <p>Le trait Résistance s'applique après toutes les autres sources de réductions de dégâts.</p>
        </div>

        <h3 id="robuste" onclick="hideContent(this)">Robuste(X)</h3>
        <div>
            <p>Cette entité est naturellement résistante aux coups, sa résistance physique augmente de X.</p>
        </div>

        <h3 id="telepathe" onclick="hideContent(this)">Télépathe</h3>
        <div>
            <p>Cette entité peut communiquer des mots, des images ou même des sentiments par la pensée. Les entités recevant un message télépathique peuvent passer un test de Perception opposé à un test d'Intelligence pour localiser le télépathe à l'origine du message.</p>
        </div>

        <h3 id="telekinesiste" onclick="hideContent(this)">Télékinésiste(X)</h3>
        <div>
            <p>Cette entité peut manipuler des objets situés à moins de 50 mètres par la pensée. Le gabarit des objets déplaçables de cette manière dépendent de la magnitude X : 1 pour des objets Minuscules et ainsi de suite jusqu'à 8 pour des objets Colossaux</p>
            <p>Cette entité peut utiliser des objets pour attaquer ses adversaires. Cette action compte comme une attaque à distance utilisant la compétence Domination(Volonté) pour le test d'attaque. Les objets utilisés de cette manière comptent comme des <a href="Armes.php#armes_improvisees">armes improvisées</a>.</p>
            <p>Il est possible de déplacer des créatures sentientes via la télékinésie. Si la cible souhaite résister, elle doit passer un test de Force ou de Volonté avec un DC équivalent à la magnitude X.</p>
        </div>

        <h3 id="vulnerabilite" onclick="hideContent(this)">Vulnérabilité(Z, X)</h3>
        <div>
            <p>Cette entité est vulnérable à un type de dégâts, ce qui signifie qu'elle subira des dommages accrus face à ce genre de dégâts. On note ainsi la vulnérabilité d'une créature : Vulnérabilité(Z, X) où Z est l'élément infligeant X points de dégâts supplémentaires si la créature est touché par cet élément.</p>
            <p>Ce trait inflige Z désavantages aux tests réalisés pour résister à un effet de l'élément X.</p>
            <p>Le trait Vulnérabilité s'applique après toutes les autres sources de réduction de dégâts.</p>
        </div>

        <h3 id="vision_dans_le_noir" onclick="hideContent(this)">Vision dans le noir</h3>
        <div>
            <p>La vision dans le noir permet de voir en l’absence de source de lumière. Certaines créatures possèdent cette vision à cause de leurs sens développés spécialement pour une vie sans lumière, d'autre la possède par magie.</p>
            <p>La vision dans le noir se fait uniquement en noir et blanc (elle ne permet pas de distinguer les couleurs)</p>
            <p>La présence de lumière n’entrave pas la vision dans le noir.</p>
        </div>

        <h3 id="vision_nocturne" onclick="hideContent(this)">Vision nocturne</h3>
        <div>
            <p>Les personnages dotés de vision nocturne ont une rétine tellement sensible que leur acuité visuelle exacerbée leur permet de voir plus distinctement que la normale dans des conditions de faible éclairage (clarté de la lune ou des étoiles, torche, etc.).</p>
            <p>La vision nocturne permet de voir en couleur.</p>
            <p>Une lumière vive et soudaine <a href="Glossaire.xhtml#aveugle">aveugle</a> les créatures ayant recours à la vision nocturne pendant 2 rounds. </p>
            <p>En extérieur, les personnages pourvus de vision nocturne voient aussi bien à la clarté de la lune qu’en plein jour.</p>
        </div>

        <h3 id="vision_thermique" onclick="hideContent(this)">Vision thermique</h3>
        <div>
            <p>La vision thermique permet de voir la chaleur qui émane des êtres vivants et des corps chauds. De ce fait, il est possible de voir dans le noir le plus complet les entités dégageant de la chaleur.</p>
            <p>La vision thermique fait apparaître les zones chaudes en rouge vif, déclinant en orange, jaune, vert puis bleu à mesure que la température diminue. L'absence de chaleur ne produit aucune couleur.</p>
        </div>

        <h3 id="vision_veritable" onclick="hideContent(this)">Vision véritable</h3>
        <div>
            <p>La vision véritable permet de voir des choses invisibles à l'œil nu. Ce type de vision n'est accessible que par magie et permet de voir la psy émaner des entités d'Ogma.</p>
            <p>La vision véritable fait percevoir le monde dans une teinte bleutée voire violacée et permet de voir dans le noir.</p>
        </div>

        <h3 id="volant" onclick="hideContent(this)">Volant(X)</h3>
        <div>
            <p>Cette entité peut se déplacer en volant. Elle possède une vitesse en vol de X mètres.</p>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");