<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260815000100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Import 13 Lore pages into web_content + web_content_section (excl. bestiaire)';
    }

    public function up(Schema $schema): void
    {
        // Ensure sequences exist for id columns
        $this->addSql("CREATE SEQUENCE IF NOT EXISTS web_content_id_seq");
        $this->addSql("ALTER TABLE web_content ALTER COLUMN id SET DEFAULT nextval('web_content_id_seq')");
        $this->addSql("CREATE SEQUENCE IF NOT EXISTS web_content_section_id_seq");
        $this->addSql("ALTER TABLE web_content_section ALTER COLUMN id SET DEFAULT nextval('web_content_section_id_seq')");

        // --- histoire_ogma ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('histoire_ogma', 'Histoire', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Origines du Monde', 1, 'origine_monde', true, '<div>
        <p>Nashira et Antoraï n''étaient à l''origine qu''un seul et même continent, tellement grand qu''on pouvait y voir toute sorte de climats, des jungles luxuriantes, des déserts de sable et de pierres, des grandes plaines fertiles, des monts et volcans hauts à toucher le ciel.</p>
        <p>Des animaux de toutes sortes sont apparus au cours du temps, des centaines de millions d''années de tranquillité ont été brisé par ce que l''on appelle aujourd''hui le Grand Cataclysme. Un gigantesque météore s''écrasa sur la partie Est du super-continent, l''impact fut tel qu''il déchira le monde en trois parties.</p>
        <p>L''impact du météore détruisit une grande partie du super-continent et souleva un nuage de poussière qui cacha la lumière des astres pendant plusieurs dizaines d''années. La faune et la flore furent perturbés par ce manque de lumière et mirent des dizaines de milliers d''années à s''en remettre.</p>
        <p>Le Grand Cataclysme a apporté la magie dans le monde et cela a donné naissance des années plus tard aux origines magiques, les Sihir, les Steinn et les Sakha.</p>
    </div>' FROM wc),
            s1 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 1, 'La Grande Révolte', 1, 'grande_revolte', true, '<div>
        <p>Les siècles d''asservissement et de torture ont poussé les origines humaines et bestiales à se rebeller face aux Sihir.</p>
        <p>On raconte que ses instigateurs étaient de grands mages capables de rivaliser avec les plus éminents Sihirs.</p>
        <p>Nombre de Sihirs furent massacrés durant cette révolte, les peuples s''étant libérés de leur emprise se sont éparpillés au quatre coins du monde et y ont établis diverses civilisations.</p>
    </div>' FROM wc),
            s2 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 2, 'Les Inkarnaïs', 1, 'inkarnai', true, '<div>
        <p>Le panthéon d''Ogma est constitué d''êtres de psyché pure vivant dans le plan de Karnaï appelés Inkarnaïs, ils n''ont pas de représentation physique dans le plan réel.</p>
        <p>Ces entités peuvent être prises pour des dieux ou bien des monstres, ils se nourrissent de la psyché que les Ogmarim utilisent pour lancer des sorts, chaque entité possède un domaine bien particulier du plan Karnaï, et il faut céder sa psyché pour pouvoir en ramener une partie dans la réalité.</p>
        <ul type=\"circle\" class=\"space_list\">
            <li id=\"Aigida\"><span class=\"big_underline\">Aïgida</span>Inkarnaï des vents et des tempêtes, c''est de son territoire que viennent les bourrasques des aéromanciens. Son karnyx est Violet.</li>
            <li id=\"Agapi\"><span class=\"big_underline\">Agapi</span>Inkarnaï de la vie, les sorts provenant de son domaine guérissent blessures et maladies. Son karnyx est Or.</li>
            <li id=\"Agones\"><span class=\"big_underline\">Agones</span> Inkarnaï de la guerre et du combat, le plus puissant de tous. Il est capable d''utiliser la psyché des Chonos pour accroître son pouvoir bien qu''ils ne puissent avoir recours à la magie, les Chonos créent un lien entre Karnaï et Ogma lorsqu''ils se battent, tout comme le ferait un mage pour lancer un sort. Son karnyx est Rouge.</li>
            <li id=\"Anathos\"><span class=\"big_underline\">Anathos</span>Inkarnaï de la mort, sa puissance vient du fait qu''il absorbe la psyché restante des Ogmarim mourants, ses sorts serait capable de ramener quelqu''un à la vie. Son karnyx est Pourpre.</li>
            <li id=\"Pravoi\"><span class=\"big_underline\">Pravoï</span>Inkarnaï de la justice et de la pitié, il accorde un partie de son pouvoir sous la forme de protections et d''entraves magiques. Son karnyx est Brun.</li>
            <li id=\"Eftis\"><span class=\"big_underline\">Eftis</span>Inkarnaï des ténèbres, il est toujours dissimulé dans les ombres de son domaine. Son karnyx est Gris.</li>
            <li id=\"Horoi\"><span class=\"big_underline\">Horoï</span>Inkarnaï du feu et des flammes, il dévore la psyché de ceux qui craignent le froid. Son karnyx est Orange.</li>
            <li id=\"Kormo\"><span class=\"big_underline\">Kormo</span>Inkarnaï des plantes et des sols, Mère des Sakhas, elle gouverne la vie et la mort de la flore. Son karnyx est Kaki.</li>
            <li id=\"Kuga\"><span class=\"big_underline\">Kuga</span>Inkarnaï de l''alchimie et des maladies. Son karnyx est Vert.</li>
            <li id=\"Kynigi\"><span class=\"big_underline\">Kynigi</span>Inkarnaï de la chasse, son domaine sauvage permet de contrôler les bêtes ou même d''en devenir une. Son karnyx est Ambre.</li>
            <li id=\"Nero\"><span class=\"big_underline\">Nero</span>Inkarnaï des océans et des glaciers, son domaine est une beauté gelée. Son karnyx est Cyan.</li>
            <li id=\"Orizo\"><span class=\"big_underline\">Orizo</span>Inkarnaï du savoir, la véritable connaissance se trouve dans son domaine. Son karnyx est Indigo.</li>
            <li id=\"Ourgal\"><span class=\"big_underline\">Ourgal</span>Inkarnaï du métal et de la pierre, Père des Steinns, ses coups de marteau résonne dans tout Karnaï. Son karnyx est Argent.</li>
            <li id=\"Psema\"><span class=\"big_underline\">Psema</span>Inkarnaï des mensonges, les sorts de son domaine bercent d''illusions leurs victimes. Son karnyx est Magenta.</li>
            <li id=\"Safi\"><span class=\"big_underline\">Safi</span>Inkarnaï de la lumière, son domaine n''est que clarté et éclat de lumière. Son karnyx est d''un Blanc.</li>
            <li id=\"Tychi\"><span class=\"big_underline\">Tychi :</span>Inkarnaï de la chance, elle apporte bonne fortune ou grand malheur et aime influer sur le destin des mortels. Son karnyx est Beige.</li>
        </ul>
    </div>
    <div>

    </div>' FROM wc),
            s3 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 3, 'Économie mondiale', 1, 'economie', true, '<div>
        <p>La plupart des échanges commerciaux se font par convoi maritime, les marchandises vont et viennent, transportées par bateaux par les légendaires marins Mushuks.</p>
        <p>Les factions humaines interviennent dans le commerce, ils contrôlent les ports et taxent toutes les marchandises. Les Steinns, et principalement le clan Rakaj, fournissent la majeure partie des objets métalliques raffinées, que ce soit des armes, des armures ou des bijoux ; bien sûr, les forgerons humains et bestiaux sont capables de forger de tels objets, mais ils ne peuvent surpasser le savoir-faire des Steinns.</p>
        <p>La monnaie utilisée pour les échanges en grandes quantités est le bérylium, un métal fragile et inutilisable pour la métallurgie, il a donc été transformé en monnaie d''échange par les Ogmarim. Le bérylium prend la forme d''un petit lingot de dimensions 12cm x 7cm x 2cm. Les pièces d''or servent d''appoint pour le bérylium ou pour des objets de grande valeur. Les marchands utilisent plutôt des pièces d''argent ou de cuivre.</p>
        <p>Un lingot de bérylium vaut 100 pièces d''or, 1 000 pièces d''argent ou 10 000 pièces de cuivre. L''avantage principal des lingots de bérylium est leur poids, ils ne pèsent que 250 grammes, contrairement à 100 pièces d''or qui pèse 1 kilogramme.</p>
        <p>La majorité des Ogmarim conservent leur argent chez eux, bien à l''abri dans un coffre ou une cache secrète. Les aventuriers en revanche sont plus propices à se déplacer aux quatre coins de la civilisation à la recherche d''un emploi. C''est pourquoi il existe un système de banque organisé par les différentes factions du monde civilisé permettant aux plus aisés d''entreposer une somme quelque part et de la retirer plus tard dans une autre ville.</p>
    </div>' FROM wc),
            s4 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 4, 'Matériaux rares', 1, 'materiaux', true, '<div>
        <ul class=\"space_list\">
            <li><span class=\"big_underline\">Virgonium :</span>Métal gris clair brillant possédant des propriétés anti-magiques. Utilisé pour les talismans Chonos et autres bijoux anti-magique. Il perturbe le lien entre Karnaï et la réalité, rendant impossible l''usage de la magie à sa proximité et allant jusqu''à annuler toute forme de magie l''approchant. Ce métal météoritique est excessivement rare et cher.</li>
            <li><span class=\"big_underline\">Karnyx :</span>Essence de magie pure sous forme de cristal. Se forme sous terre dans des endroits liés à Karnaï. Le cristal peut être neutre ou bien chargé de la psyché d''un Inkarnaï en particulier. Ces pierres sont dangereuses en cas d''exposition prolongée, pouvant mener à la folie voire à la mort.</li>
            <li><span class=\"big_underline\">Gnistar :</span>Métal ultra solide d''une légèreté étonnante. On peut produire des armures impénétrables et des armes qui ne perdent jamais leur tranchant.</li>
            <li><span class=\"big_underline\">Skymma :</span>Ce métal se forme au plus profond de la terre là où la pression est écrasante. C''est un métal noir extrêmement dense, on le confond souvent avec de l''obsidienne mais le Skymma est plus malléable de part sa nature métallique. On l''utilise pour des objets d''exceptions, peu nombreux sont les artisans capables de lui donner forme.</li>
            <li><span class=\"big_underline\">Lakma :</span>Cet alliage de titane à haute teneur en carbone ne se trouve qu''en milieu naturel. Il se forme dans des volcans explosifs et ne se trouve qu''en petite quantité dans le cœur des bombes volcaniques. Presque aussi rare que le skymma, ce métal clair coûte une vraie fortune.</li>
            <li><span class=\"big_underline\">Nilaroy :</span>Cristal de roche d''une dureté remarquable pour son poids modeste. Le nilaroy est largement utilisé par les Mushuks qui ont été les premiers à le découvrir.</li>
            <li><span class=\"big_underline\">Shoren :</span>Corail des abysses, le Shoren est un matériau lourd et solide utilisé par les Azumas en tant qu''ornement et pour façonner des armes et des armures. Aussi solide que le plus solide des aciers, le Shoren possède une profonde couleur bleue.</li>
            <li><span class=\"big_underline\">Kusni :</span>Fibre végétale infusée de la psy de Kormo. Elle est utilisée par les Sakhas pour des tenues de cérémonies et pour tisser des armures pour les plus braves d''entre eux.</li>
            <li><span class=\"big_underline\">Orichalque :</span>Le métal des marais, utilisé par les chonos étant donné qu''ils sont les propriétaires des plus grosses mines. Ce métal verdâtre est plus solide que l''acier et est capable de dissiper une partie de la magie qu''il touche.</li>
            <li><span class=\"big_underline\">Alkite :</span>Métal léger aux reflets bleu-vert. Extrêmement lisse même non raffinée, fait glisser les lames et tranche comme un rasoir.</li>
        </ul>
    </div>' FROM wc),
            s5 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 5, 'Langages courants', 1, 'langages', true, '<div>
        <ul>
            <li>Ashraï (Tuskizis)</li>
            <li>Balkrunn (Kantas)</li>
            <li>Daïtorin (Azumas)</li>
            <li>Draconien (Sarpas)</li>
            <li>Igaraï (Mushuks)</li>
            <li>Karnarak (Karnarim et Inkarnaïs)</li>
            <li>Kugarite (Rodraki et autres créations de Kuga)</li>
            <li>Gortrell (cyclopes, géants, ogres, trolls)</li>
            <li>Nokoï (Chonos)</li>
            <li>Payaritt (Toris)</li>
            <li>Ralvakor (Severs)</li>
            <li>Sihiräll (Sihirs)</li>
            <li>Steinndarr (Steinns)</li>
            <li>Sylvestre (Sakhas et autres créations de Kormo)</li>
        </ul>
        <p>Les langages humains possèdent des racines communes et forment plutôt un dialecte possédant des mots spécifiques à leur zone géographique. Une marchande Steinn ne connaissant que le Ralvakor et le Steinndarr, peut sans problème négocier avec un itinérant Mushuk ne connaissant que le Daïtorin et l''Agaraï.</p>
    </div>' FROM wc),
            s6 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 6, 'Les Sentinelles', 1, 'sentinelles', true, '<div>
        <p>Apparues après la Grande Révolte dans le but de protéger les faibles contre les bêtes et les monstres, les Sentinelles sont un ordre indépendant de tout pouvoir politique n’agissant que pour le bien des êtres civilisés.</p>
        <p>Organisées en de multiples chapitres installés dans de grandioses forteresses dispersées au quatre coins du monde, elles sont capables d’intervenir rapidement où que se trouve la menace. Souvent commanditées par les villages frontaliers mais aussi par les dirigeants des plus grandes villes pour purger du mal les bastions de la civilisation. Les membres des sentinelles sont des guerriers exceptionnels, si puissants qu’ils agissent seuls la plupart du temps, ne s’alliant que pour affronter les menaces les plus grandioses.</p>
        <p>Les premières sentinelles furent les héros de la Grande Révolte qui n’ont pas été motivés par la prise de responsabilités politiques et ont continués leurs efforts au combat contre l’atrocité Sihiräll. Ce sont les fondateurs des chapitres, et les premiers à avoir entraînés la première génération de Sentinelles. Ils ont accueilli en leur sein des orphelins, des âmes en peines, des fils et des filles dont la famille trop pauvre ne pouvait plus s’occuper ; tous formés pour en vrai de véritables machine à tuer.</p>
        <p>La formation va bien au-delà de celle du soldat de base : maîtrise des armes, introduction aux arts de Karnaï, cours appliqués sur les monstres et d’autres connaissances importantes pour un chasseur ultime. Au terme de ces nombreuses années d’apprentissages, les recrues atteignent le point culminant que leur permette leur condition d’humains ou d’homme-bêtes mais ne sont pas encore considéré comme de véritables Sentinelles, il faut encore subir de multiples modifications corporelles pour atteindre un tel rang. Provoqués par des remèdes alchimiques ou des incantations magiques, ces mutations affectent le corps comme l’esprit et tracent un fossé entre l’aptitude d’une Sentinelle et celle d’un simple mortel : vision nocturne, réflexes améliorés, sens affûtés à l’extrême, régénération accrue, métabolisme endurci, etc...</p>
        <p>Une sentinelle est aussi efficace qu’une quinzaine de soldats au bas mot, leurs connaissances et leur maîtrise de la magie les mettent sur un pied d’égalité avec les puissants Soldats Sorciers de l’Empire Azuma bien que leur champ de compétences ne porte pas sur les mêmes domaines. La chasse aux monstres nécessite un matériel particulier : des armes adaptées à tel ou tel monstre, des produits alchimiques tels que des potions et des bombes. Ce matériel et son entretien coûtent cher à entretenir et les risques que prennent les Sentinelles sont grands, c’est pourquoi la récompense qu’elles réclament dépassent largement les capacités monétaires des simples roturiers. Lors d’une intervention dans un village frontalier, c’est le village entier qui se cotise pour payer la Sentinelle ; alors que les nobles peuvent se payer leurs services sans sourciller.</p>
    </div>' FROM wc)
        SELECT 1");

        // --- carte_ogma ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('carte_ogma', 'Carte d''Ogma', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, NULL, 2, NULL, false, '<div>
        <img src=\"/images/Misc/Carte_Ogma.png\" alt=\"Carte Ogma\" id=\"map\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- azuma ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('azuma', 'Azuma', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Azumas', 1, NULL, false, '<div class=\"side_by_side\">
        <div class=\"side_by_side_img\">
            <img src=\"/images/Factions/Azuma_picture.jpg\" alt=\"Générale Azuma\" width=\"100%\"/>
        </div>
        <div class=\"side_by_side_img\">
            <img src=\"/images/Factions/Azuma_picture2.jpg\" alt=\"Noble Azuma\" width=\"100%\"/>
        </div>
    </div>' FROM wc),
            s1 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 1, 'L''archipel Quan Daõ', 2, NULL, true, '<div>
        <p>Entre Nashira et Antoraï, les deux continents d’Ogma, se situe l’archipel Quan Daõ. Il se divise entre sept îles majeures et une myriade de secondaire. Le climat de tout l’archipel varie entre le tempéré et subtropicale, se qui donne une fertilité particulière aux îles, les courant marin qui passe près de l’archipel pour faire le tour de Jikaï font des lieux un paradis maritime ou la faune et la flore sous marine prospère.</p>
        <p>La population, elle est majoritairement composée d’Humains, qui sont appelés Azumas se qui réfère à la mer intérieur d’Azur au centre de l’archipel, mais une partie des habitants sont également des hommes bêtes et des métis de tout horizon, ainsi que des Hommes de différente culture. Les îles Quand Daõ sont densément peuplé et encore en croissance, réduisant de jours en jours les parcelles exploitables aux profits de cités tentaculaires.</p>
        <p>L’architecture de l’empire s’est donc naturellement tournée vers les cieux et la mer, il n’est pas rare de voir des tours d’habitations de plus de six étages, des quartiers entièrement construits sur l’eau voire des palais flottants au dessus des habitations et des mers. Le tout est possible grâce aux avancées magique des académies impérial, en particulier L’Académie Impériale de Magie qui est une source de prestige et de fierté pour les Azumas, car elle est à la pointe de la recherche magique et forme à chaque génération une partie des meilleurs mages de l’Empire et d’Ogma.</p>
        <p>Au delà d’être un archipel où la vie est facile, sa situation géographique en fait un point central du monde, entre les différentes puissances du monde que sont les clans Steinns, les différents royaumes Severs et le sultanat Tsukizi, cette position centrale dans le monde favorise le commerce et permet aux différentes îles de profiter de matières premières dont elles sont de plus en plus dépendantes. La proximité avec les cités portuaire Mushuk de Palabona et d’Edena, couplée au différent quartier Mushuk et comptoirs des cités de l’empire, favorise encore plus les relations et les échanges à travers tout le monde connu, ainsi l’empire c’est tournée vers l’importation et l’exportation massive et on peut ainsi manger des poissons géants de Salaris jusque dans les cours les plus lointaines, ou trouver divers objets enchantés dans les fabriques Azuma dans toute les terres, le tout porté par un système politique fort l’empire. </p>
    </div>' FROM wc),
            s2 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 2, 'Un ensemble politique fort', 2, NULL, true, '<div>
        <p>L’Empire Azuma, ou l’empire d’Azur, est une entité politique régie et centrée autour de l’impératrice ou de l’empereur, monarque absolu de droit magique, il s’appuie sur le soutien des Huit familles, Neuf avec celle impériale, ainsi qu’une puissance administration.</p>
        <p>L’empereur, pilier de la politique interne et externe, possède tout les pouvoirs au sein de l’empire : judiciaire, exécutif et législatif. Mais il ne les exerce pas en autocrate, il délègue une partie de ces pouvoirs aux autres entités politiques de l’empire. Ainsi le pouvoir judiciaire est réparti entre les neuf familles, chacun fait régner la loi de l’empire sur sa juridiction, les familles deviennent donc arbitres des conflits. En ce qui concerne les conflits entre familles celles ci sont réglées devant l’empereur, qui à le pouvoir d’outrepasser toute autre décision. Le pouvoir exécutif est totalement dans les mains de l’empereur mais est appliqué grâce au rouage de l’administration qui est présente sur tout le territoire. Le pouvoirs législatif est quand à lui partagé entre l’empereur, les Huit et des membres de l’administration.</p>
        <ul>
            <li>
                <h3 onclick=\"hideContent(this)\">Centré sur l''empereur</h3>
                <p>Le pouvoir de l’empereur est héréditaire, il lui vient de tout les autres empereurs qui on régner avant lui. La légende raconte que le Premier Empereur faisait partis de ces héros meneurs de la Grande Révolte, et qu’après la guerre il fonda la capitale Tsunarey et la grande famille impérial les Azuring . Cette légitimité héritée d’un des plus grand mage de son temps s’incarne à travers la bague du Premier, un bijou inestimable qui contient la psyché de tout les Empereurs qui ont régné et régneront. Avec cette bague l’empereur possède la puissance nécessaire pour lancer des sorts bien au-delà du sixième cercle. Le mythe de la bague phénix est tel que l’empereur est aussi appeler Empereur Phénix car il bénéficierait des conseils de tout les empereur passés et à terme donneront aussi des conseils, c''est pour cette raison qu’elle est aussi appelée la bague murmurante.</p>
                <p>Il est bon de noter que le mode de succession de l’empire est assez simple, c’est une succession héréditaire et magique, l’empire est laissé dans les mains du membre de la famille de l’empereur qui a la plus grande aptitude magique, que l’héritier sois une femme, un homme ou un sang-mêlé. Qu''importe son père ou sa mère, s''il est reconnu par la famille régente, il peut espérer accéder au trône. Ce mode de succession permet seulement au héritier les plus forts de devenir Empereur au prix de succession instables et de complots entre les Neuf familles pour place leurs favoris et en récolter les bénéfices. Le siège du pouvoir Impériale se situe dans le palais volant de Tsunaray, le palais de la mer, qui surplombe la ville en permanence, montrant à tous la sécurité et la prospérité apporté par l’empereur.</p>
            </li>
            <li>
                <h3 onclick=\"hideContent(this)\">S''appuyant sur la puissance des Huit</h3>
                <div>
                    <p>Les Huit familles sont le cœur de l’empire, comme pour la famille de l’empereur chaque famille possède des fondateurs illustres qui se sont démarqués lors de la Grande Révolte.</p>
                    <p>Les îles de Quan Daõ sont donc séparées en de grandes cités, fiefs de ces illustres famille :</p>
                    <ul>
                        <li>La capitale Impériale est l’immense cité de Tsunarey, une cité si haute et imposante qu’elle rogne les cieux, le palais des mers en est le centre, un rappel de la puissance des Empereurs flottant au dessus de tout, soutenue par tout le savoir faire Azuma en enchantements.
                        </li>
                        <li>Salaris la cité des mer est indissociable de ces terre-pleins et de ces armatures magique qui empêche la ville de sombré, elle est le fief de la famille Shura.
                        </li>
                        <li>Anugia est une île-cité réputé pour son industrie florissante, arme, armure et toute l’industrie sidérurgique y est tentaculaire, la famille Sukia y règne.
                        </li>
                        <li>La belle cité d’Atalora est un haut lieu de culture de l’empire et bien que l’empire possède des bibliothèque dans toutes ces villes majeurs Atalora renferme en ces murs la célèbre Académie Impérial de Magie incarné par le palais Majikku, le second palais volant de l’empire et le fleuve Maji qui en coule magiquement, cette place de culture et faste est la fierté de la famille Atia.
                        </li>
                        <li>Navalore est la dernière des très grandes cité de l’empire elle profite du commerce et de la diplomatie étrangère engagée par sa famille dirigeante : les Emishi.
                        </li>
                        <li>Valoria est la plus petite cité de l’archipel la vie y est rude car les courant marin d’eau froide ramène bon nombre de serpent marin de Jikaï la maudite, l’île en elle même à été coloniser il y à peu par la famille Minnas.
                        </li>
                        <li>Un peu plus au sud la cité de Sithas est réputé pour l’Académie Impérial Magister et bien que petite elle est prestigieuse pour l’empire et la famille Waas.
                        </li>
                        <li>La cité de Vollunis est un des rare lieu de l’archipel à être bordé par une grande forêt et toute la richesse de la ville découle de celle ci, qui est aussi bien exploitée que protégée par la familles Tetsu.
                        </li>
                        <li>Pelaril la verdoyante est la dernière cité notable de l’empire et il se trouve qu’elle est aussi le grenier de celui-ci, sur les rive de la Maji on peut voir des champs qui s’étendent jusqu’à eau salée, bien que grandes et fertiles ces plaines ne permettent pas de nourrir tout l’empire malgré la magie imprégnant le fleuve. Au centre de Pelaril se situe le vaste palais des Tiang construit sur plus d’un kilomètre de terre.
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <h3 onclick=\"hideContent(this)\">L''assemblée des Neuf, un conseil politique</h3>
                <div>
                    <p>La puissance des Huit est ainsi palpable dans tout l’empire et leurs querelles déstabilisent le pays. Ces sont les plus grands propriétaires terriens de l’archipel ce qui leur procure une grande richesse . Ils sont souvent en conflit de par l’étendue de leurs domaines et les différentes industries qu’ils contrôlent. Malgré tout ils sont, du moins en apparence pour certain, unis autour de l’empire et de l’empereur.</p>
                    <p>Ce rôle économique n’est pas à prouvé autant que leurs rôles politiques, qui s’incarne dans tout leurs pouvoirs dans leurs domaines, liés aux pouvoirs de l’empereur, ils exercent donc la justice sur leurs terres et participent à des grands conseils avec l’empereur lors de l’assemblé des Neuf.</p>
                    <p>L’assemblée des Neuf sert à légiférer au sein de l’empire, elle est composé bien évidement de l’empereur et des chefs des Huit familles de l’empire d’où son nom, mais au fils du temps avec l’évolution de l’empire et l’essor de l’administration huit autre siège s’ajoutèrent à l’assemblé des Neuf pour les huit plus grand membre de l’administration, soit les deux Haut Généraux de l’empire, les deux mage suprême de l’académie et les quatre ministres de l’empereur. Le tout porte donc l’assemblé des Neuf à dix-sept membre. C’est lors de cette assemblé que les lois sont proposées à tous puis voté, les votes s’effectue à mains levées et chacun des dix-sept membres possède une voix, même l’empereur. L’emplacement des assemblés tourne entre les Neuf familles, permettant à chacune d’entre elle de montrer ses richesses et sa capacité à entretenir ses hôtes.</p>
                </div>
            </li>
        </ul>
    </div>' FROM wc),
            s3 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 3, 'Un monde civil strict', 2, NULL, true, '<div>
        <ul>
            <li>
                <div>
                    <h3 onclick=\"hideContent(this)\">Organisé par l''administration</h3>
                    <p>Si l’empereur est la tête de l’empire, et les Huit le cœur, l’administration en est le sang. Celle-ci est très complexe et tentaculaire, elle est devenue indispensable au bon fonctionnement de l’empire malgré son coût élevé. L’administration sert à organiser toute la vie Azuma et veille à la stabilité de l’empire.</p>
                    <p>Bien que l’empire met en haute estime les grandes ascendances et la magie, l’administration est basés sur la méritocratie il n’est donc pas rare de voir des fonctionnaires ne maîtrisant pas bien la magie mais qui possèdent de réelles compétences. Mais malgré la mise en valeurs des compétences, cette méritocratie se heurte souvent aux ambitions des Neuf, il n’est pas rare de retrouver des membres de ces familles dans l’administration quelle que soient leurs compétences.</p>
                    <p>Les quatre ministres de l’empereur sont choisis par celui-ci dans les hauts fonctionnaires de l’empire, or ces places sont autant prisées par les Neuf que par les citoyens car d’une part le poste de ministre procure un vote au assemblé des Neuf mais également un prestige conséquent qui retombe sur les familles de ceux-ci.</p>
                </div>
            </li>
            <li>
                <div>
                    <h3 onclick=\"hideContent(this)\">Autour des citoyens</h3>
                    <p>Les citoyens de l’empire, sont sa chair, mais toute la population de l’empire Azuma n’est pas citoyenne. Il existe une distinction entre ceux-ci et les non citoyens mais cette distinction est juridique et n’implique pas une discrimination d’état envers les non citoyens.</p>
                    <p>La citoyenneté Azuma n’est pas foncièrement difficile à obtenir, le moyens le plus courant est d’avoir fini le temps d’étude obligatoire de quatre ans dans une académie impériale, bien que la plupart des jeunes Azuma y sois bien préparé car les écoles impériale sont très répandues et populaires de par le fait qu''elles enseignent les bases de la magie en plus du nécessaire pour vivre dans la société Azuma, incarné dans les mathématiques, l’écriture et la lecture.</p>
                    <p>Malgré la popularité de ces institutions, les tranches les plus pauvre de la population n’ont pas assez de ressources pour passer par les écoles et échouent à l’académie. L’autre voie pour prétendre à la position de citoyen est de s’engager dans la quatrième section de l’armée Azuma et plus précisément les corps auxiliaires pour une durée de huit ans, c’est une voie empruntée par tout les Azumas qui n’ont pas réussi leurs examens.</p>
                    <p>Les citoyens ont beaucoup d’avantages, le droit d’être défendus par le juriste de leurs choix dans les tribunaux, l’accès à l’Académie Impériale Magique et à l’Académie Impériale Magister, avec des possibles bourses qui récompensent les élèves les plus talentueux mais pauvres. Ils obtiennent également le droit de se présenter et de voter au poste de gestionnaire de quartier, un représentant élu qui gère avec l’administration le développement et la politique d’un quartier.</p>
                    <p>Les non citoyens ne sont pas pour autant traités comme des parasites. Ils ont le droit de commerce et celui d’être défendu par le juriste de leur choix dans un jugement commercial, alors que pour tout autre jugement le juriste serait commis d’office, ils payent aussi des taxes supplémentaire par rapport au autres citoyens. Les citoyens de l’empire sont tenus, du moins pour une partie, de s’engager dans les forces militaire en cas de crise majeure.</p>
                </div>
            </li>
            <li>
                <div>
                    <h3 onclick=\"hideContent(this)\">Défendu par une armée efficace</h3>
                    <p>Ses forces militaires sont l’une des armées les mieux organisée au monde. L’armée Azuma se divise en quatre sections :</p>
                    <ul>
                        <li>
                            <p>La première section regroupe les Haut généraux de l’empire qui aide l’empereur à commander l’armée. Ainsi que les forces d’élite Azumas les Soldats Sorciers qui se distinguent par une maîtrise totale de la magie et des armes plus conventionnelles, ils forment une force d’élite indépendante de l’armée régulière, ils effectuent des missions spéciale en temps de paix mais aussi sur le front comme percer une ligne ou de défaire des hauts gradées.</p>
                        </li>
                        <li>
                            <p>La deuxième section est composée de la Division Magique et des gradées inférieurs. La division magique Azuma est spécialiser dans le siège, les attaques de grande envergure et la division de mage médecins. Les gradés inférieurs de l’armée sont formé à une magie spécifique: la télépathie. Le développement de cette magie au sein de l’armée fut une révolution pour les Azuma et permis à leurs armée de rivaliser avec les plus grande force de frappe du monde. Mais cette magie puissante a ses défauts, en effet son utilisation prolongée lors des combats fatigue les gradés et cette fonction de relais ne convient pas à tout le monde, c’est un poste vital mais à risque car tout le monde ne supporte pas mentalement l’utilisation de la télépathie, le nombre de relais humain pour centraliser et distribuer les informations jusqu’au généraux est conséquent et la moindre erreur peu provoquer la folie suite à l’écho de milliers de voix dans la tête des lieutenants télépathes.</p>
                        </li>
                        <li>
                            <p>La troisième section est celle de l’infanterie régulière, ce sont des soldat semi-professionnels, recruté parmi les citoyens en temps de crise, on compte également les détachements privés envoyés par les Huit familles dans l’armée régulière. Ils sont l’épine dorsale de l’armée lors de conflit de grande ampleurs.</p>
                        </li>
                        <li>
                            <p>La quatrième section regroupe la force des auxiliaires qui sont le corps d’armée de l’empire en dehors des temps de crise ils s’occupent de pacifier les régions en temps de paix et sont seul présent dans tout conflits, là où le recrutement de la troisième sections demande une réunion exceptionnelle des Neuf et n''est demandée que dans les conflits de grande ampleur. Les rangs des auxiliaires ne sont pas composés que d’étrangers à la culture Azuma, un grand nombre d’Azumas qui n’ont pas validé leurs études s’engage dans les auxiliaires pour pouvoir devenir citoyens. </p>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Comme tout les autres origines Humaines, les Azumas peuvent augmenter leurs Caractéristiques par le biais de 3 amélioration de cran, au maximum 2 sur un même dé.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Étant des humains, les Azumas en bonne santé peuvent espérer vivre au moins 80 ans, il n''est pas rare de croiser des citoyens centenaires parmi les cités de Quan-Daõ. On estime qu''un Azuma atteint l''âge adulte à 20 ans. À 35 ans on considère l''individu comme mâture et expérimenté. Au delà de 60 ans, les campagnes militaires prennent fins pour la plupart des citoyens impériaux pour se consacrer aux études plus poussées.</p>
        <p><span class=\"big_underline\">Honneur du Guerrier</span>Lorsque les choses se présentent mal, il est du devoir d''un Azuma de mourir honorablement : Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et la résistance magique augmente de 1 pendant un round.</p>
        <p><span class=\"big_underline\">Endurance humaine</span>Les humains sont naturellement endurants et ne laissent jamais tomber : Ne s''évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour </p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Azumas peuvent parler, lire et écrire le Daïtorin et deux autres langues (voir <a href=\"../World/Histoire_Ogma.php#langages\">Langages</a>).</p>
    </div>
    <div>
        <h3>Noms Azumas</h3>
        <p>Les Azumas sont très attachés à leur nom de famille, il représente beaucoup pour eux. Sans ce nom ils ne sont rien, et les familles n''hésitent pas à rejeter les enfants risquant de salir leur nom.</p>
        <p><span class=\"big_underline\">Noms masculins</span>Trang, Iwasaki, Thân, Suda, Jiang, Ashina, Chakri, Ogura, Meng, Sudara, Shan, Shui, Nikaidou, Aso, Meng </p>
        <p><span class=\"big_underline\">Noms féminins</span>Kasika, Chao, Sujin, Lei, Mei, Qiao, Shui, Piam, Napha, Sua, Chang, Shinjou, Shao, Ogawa</p>
        <p><span class=\"big_underline\">Noms de famille</span>Huang, Fusomi, Tanko, Tanetame, Ling, Kazuaki, Pin, Shin, Sadanobu, Hidemasa, Toshikatsu, Wuying, Shuren, Guanyu </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Ville Azuma</h4>
        <img src=\"/images/Factions/Azuma_ville.jpg\" alt=\"Ville Azuma\" width=\"100%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- chono ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('chono', 'Chono', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Chonos', 1, NULL, false, '<img src=\"/images/Factions/Chono_picture.jpg\" alt=\"Alpha Chono\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Ce sont des humanoïdes issus des canidés : Homme-chien, Homme-loup, Homme-renard,… </p>
        <p>À la base des humains victimes des premières expérimentations Sihir, les Chonos sont un premier essai qu''on pourrait qualifier de raté. Les Sihirs souhaitaient des esclaves plus physiques et dociles, ils ont créé des bêtes sauvages assoiffés de sang.</p>
        <p>Les Chonos souffrent d''une pathologie génétique les rendant incompatible avec la magie dont sont composés les Sihir, s''ils entrent en contact avec une manifestation magique issue de Karnaï, ils entrent dans une rage primordiale qui ne prend fin qu''à la perte de connaissance du Chono.</p>
        <p>Les Sihir auraient dû exterminer cette espèce incompatible avec la leur mais cela serait revenu à admettre leur échec, ils mirent donc au point un talisman de virgonium, un métal aux propriétés anti-magiques extrêmement difficile à manipuler pour des êtres fait de magie et les implantèrent directement dans le front des Chono pour qu''ils ne puissent pas avoir recours à la rage primordiale.</p>
    </div>
    <!--suppress GrazieInspection, GrazieInspection -->
    <div>
        <h3>Société</h3>
        <p>Les Chonos sont nomades, ils vivent en groupes de taille très variables, les plus petits rassemblent quelques familles, les plus grandes dépassent les vingt mille individus. Les petits groupes vivent principalement de chasse et de cueillette tandis que les plus grands pillent les granges des fermiers pour se procurer de la nourriture.</p>
        <p>Ce sont des guerriers redoutables et belliqueux, il n''est pas rare de voir deux hordes s’entre-tuer. Les plus grandes hordes ne laissent généralement qu''horreur et désolation après leur passage, bien peu de villes sont capables de résister à leurs assauts.</p>
        <p>À la tête de chaque horde se trouve un ou une Alpha décidant de tout, tout Chono possède le droit de défier l’Alpha dans un combat singulier.</p>
        <p>Certains Chonos regrettent leurs origines bestiales et vont jusqu’à s’arracher volontairement leur talisman et embrassent alors la rage primordiale, on les appelle les Berserk.</p>
        <p>Les talismans d’anti-magie sont toujours fabriqués et donnés aux nouveaux-nés. Ce sont les forgerons qui les fabriquent mais ils ne sont pas aussi solides que ceux crées par les Sihir d''autrefois.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>Les hordes n''entretiennent pas de relation particulière avec les autres factions, si ce ne sont les raids et pillages qu''elles effectuent et les rares opérations de vendetta ayant lieu suite à des raids trop fructueux.</p>
        <p>Quelques Chonos lassés des pillages se laissent tentés par l''appel de l''aventure et quittent leur horde pour explorer la civilisation. D''autres ont été laissés pour mort après un affrontement entre hordes et cherche la redemption par la vengeance.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Chonos sont des combattants inégalés aux sens de prédateurs, ils obtiennent un d8 en force, agilité et vigueur ainsi qu''un d10 en perception. Ils souffrent cependant d''un intellect et d''une capacité de communication inférieurs aux autres origines, ils subissent un d4 en intelligence et éloquence.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Les Chonos ont une croissance plus rapide que les humains, un individu termine sa croissance aux alentours de ses 12 ans et reste au pic de sa puissance jusqu''à ses 35 ans. Ils ne survivent guère plus longtemps parmi la horde, même s''ils rejoignent la civilisation les Chonos meurent autour des 50 ans.</p>
        <p><span class=\"big_underline\" id=\"rage\">Rage primordiale</span>Si un Chono entre en contact avec de la magie, il doit réussir un jet de Volonté DC 6 en l''absence du pendentif de Virgonium. Si le jet est un échec, le personnage subit un trauma et perd tout contrôle et attaque tout individu se trouvant à proximité. Cet état n''est interrompu que par une période prolongée de calme (sommeil, perte de connaissance, etc..).</p>
        <p><span class=\"big_underline\">Chasseur hors-pair</span>Les Chonos possèdent la <a href=\"../Rules/Glossaire.php#vision_nocturne\">Vision Nocturne</a> et peuvent relancer un jet de Perception raté une fois par jour. Ils possèdent également un <a href=\"../Rules/Glossaire.php#estomac_solide\">Estomac Solide</a>.</p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Chonos savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d6).</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Chonos parlent le Nokoï mais ne savent ni écrire ni lire pour la plupart. Les quelques Chonos vivants parmi la civilisation ont adopté la langue de la région.</p>
    </div>
    <!--suppress GrazieInspection -->
    <div>
        <h3>Noms Chonos</h3>
        <p>Les Chonos n''ont pas de nom de famille, ils appartiennent à la horde, un nom leur est donné à la naissance mais ils s''en forgent rapidement un nouveau au combat.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Dez, Ruzz, Ezzyk, Rurg, Kroc, Raxet, Grarg, Thirkat, Ruhir, Giak, Ukx, Xyrr, Gheryrrg, Xorrok, Trox, Tyrir</p>
        <p><span class=\"big_underline\">Noms Féminins</span>Sny, Tris, Srhyn, Khy, Yrth, Tsia, Zahr, Snora, Dysh, Irgirt, Hyle, Muzno, Hiar, Tserta, Nuissir, Seth </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Chonos lors d''un raid</h4>
        <img src=\"/images/Factions/Chono_raid.jpg\" alt=\"Raid Chono\" width=\"60%\"/>
        <h4>Chono loup</h4>
        <img src=\"/images/Factions/Chono_wolf.jpg\" alt=\"Chono loup\" width=\"50%\"/>
        <h4>Chono hyène</h4>
        <img src=\"/images/Factions/Chono_hyena.jpg\" alt=\"Chono hyene\" width=\"55%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- kanta ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('kanta', 'Kanta', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Kantas', 1, NULL, false, '<img src=\"/images/Factions/Kanta_picture.jpg\" alt=\"Matriarche Kanta\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Ce sont les plus imposantes créations Sihir. Issus des ursidés, les Kanta possèdent une endurance et une force à toute épreuve. Leur taille est très variable, allant d''un mètre cinquante pour les Kantas issus des panda et ours noir, jusqu''à trois mètres pour ceux issus des ours blancs et bruns. Ils sont également extraordinairement lourds pour des humanoïdes, de 150 à 500kg. Leur épaisse fourrure les protège du froid et peut faire office d''armure de fortune</p>
        <p>Ils sont troisième origine bestiale à voir le jour suite aux expériences des Sihir, ils devaient remplacer les Chonos, mais la fortitude des uns et la volonté de survie des autres rendirent impossible ce remplacement. Les Kanta ne se soumirent pas si facilement et cela força les Sihir à limiter leur population.</p>
        <p>Les Kanta se sont isolés sur des îles où personne ne souhaitait s''installer pour ne plus avoir de contact avec le reste du monde. Ils vivent dans la taïga de Diamant au nord d''Antoraï, et dans les plaines silencieuses à l''ouest de Nashira pour la plupart.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Les Kanta sont sages et patients, ils préfèrent la parole au conflit. Ils vivent en communautés dirigées par la plus ancienne Kanta de la tribu. Si la communauté devient trop importante, les membres les plus jeunes doivent partir et en créer une nouvelle.</p>
        <p>Ils mènent ainsi une vie paisible, éloigné de tout les conflits du monde. Les archives Azumas ne mentionne presque jamais les Kanta tant ils sont discrets dans la politique mondiale.</p>
        <p>Contrairement aux rumeurs, les Kantas n''hibernent pas.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>Ils n''entretiennent que peu de relations avec le reste du monde, quelques fois un messager vient pour demander l''aide et la sagesse de la matriarche. Se voir attribuer ce genre de missions est un grand honneur car rencontrer une matriarche est une histoire que l''on peut conter au coin du feu à ses petits enfants.</p>
        <p>Les Kantas hors de leurs communautés sont rares, mais ils existent, certains sont trop curieux et décident de partir seul pour explorer le monde. Ils ne passent pas inaperçus dans les tavernes au vu de la quantité de nourriture qu''ils peuvent absorber.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Kantas sont puissants et endurants, ils obtiennent un d10 en force et un d12 en vigueur. Leur masse rend leur démarche lourde, et leur grosse patte les empêchent d''accomplir des tâches précises, ils subissent un d4 en agilité et dextérité.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Ce sont les représentants des origines bestiales les plus endurants aux ravages du temps si l''on exclue les Sarpas. Un Kanta est considéré comme adulte par ses pairs à l''âge de 30 ans, on reconnait sa maturité à 60 et sa sagesse à 90. Les Kantas s''éteignent 120 ans après leur venue au monde.</p>
        <p><span class=\"big_underline\">Fourrure épaisse</span>Les poils et la graisse des Kantas leur accorde une <a href=\"../Rules/Glossaire.php#resistance\">Résistance(Froid, 3)</a> et le trait <a href=\"../Rules/Glossaire.php#robuste\">Robuste(1)</a> .</p>
        <p><span class=\"big_underline\">Imposante stature</span>Les kanta dominent les autres peuples en termes de carrure, ce sont des créatures de <a href=\"../Rules/Gabarit.php#gabarit_creatures\">Gabarit</a> G. Ils possèdent également un <a href=\"../Rules/Glossaire.php#estomac_solide\">Estomac Solide</a>.</p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Kantas savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d8).</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Kantas peuvent parler, écrire et lire le Balkrunn et parlent parfois le Gortrell puisqu''ils leur arrivent d''en rencontrer des êtres l''utilisant dans les contrées lointaines.</p>
    </div>
    <div>
        <h3>Noms Kantas</h3>
        <p>Les noms Kanta ne sont pas significatifs, ils n''ont pas de nom de famille comme les autres origines bestiales. Leur nom est l''unique chose à laquelle leurs pairs font référence pour s''adresser à eux.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Osrong, Kyudda, Jonehn, Jotang, Ohahn, Takkon, Masum, Hakosh, Ingoll, Sedda, Okish </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Mefali, Atesim, Shohe, Sirsu, Amoha, Ishibi, Logeru, Phelethi, Fethin, Lahni, Thenra </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Guerrier Kanta</h4>
        <img src=\"/images/Factions/Kanta_guerrier.jpg\" alt=\"Guerrier Kanta\" width=\"50%\"/>
        <h4>Village Kanta</h4>
        <img src=\"/images/Factions/Kanta_village.jpg\" alt=\"Village Kanta\" width=\"90%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- mushuk ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('mushuk', 'Mushuk', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Mushuks', 1, NULL, false, '<img src=\"/images/Factions/Mushuk_picture.jpg\" alt=\"Capitaine Mushuk\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Ce sont des humanoïdes issus des félins : Homme-chat, Homme-lion, Homme-tigre,...</p>
        <p>Ils sont plus légers que les Chonos mais pas vraiment plus petits, ce ne sont pas des brutes comme eux non plus, ils préfèrent user de leur langue aiguisée si habile pour marchander. Ils sont également nyctalopes et ont une bonne ouïe.</p>
        <p>Ils ont été la deuxième origine créée par les Shir, ils ne possèdent pas la même capacité musculaire que les Chono mais ne sont pas intolérants à la magie, leur permettant d''accomplir des tâches impossibles pour les Chonos. Parmi ces nouvelles tâches, la plus importante était sûrement l''exploration marine, les Sihir ne voulaient pas se risquer dans l''océan, ils envoyaient donc des expéditions de Mushuk et restaient en contact par magie.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Les Mushuks se rassemblent dans des villages côtiers, ils sont présents sur presque toutes les côtes du monde, si l''on sait où chercher.</p>
        <p>Ils ont conservés leurs techniques de marins et sont d''excellents charpentiers navaux. Il n''est pas rare de voir des expéditions navales entièrement composées de Mushuks tant ils sont habiles.</p>
        <p>Les Mushuk s''organisent en ligues marchandes, ils sont constamment à la recherche de nouveaux contrats et les différentes ligues se livrent une concurrence commerciale sans fin. Certaines sont mêmes devenues hors-la-loi en ne respectant pas le pacte de la Griffe.</p>
        <p>Les Mushuks sont aussi cupides que les Steinn, l''appât du gain peut leur faire perdre la raison, ils sont extrêmement joueurs et ne réfléchissent pas deux fois avant de faire une affaire fructueuse.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>La plupart des marchands du monde reposent sur un approvisionnement naval, c''est pourquoi la majorité des factions souhaitent à tout prix conserver de bonnes relations avec les différentes ligues marchandes</p>
        <p>Les Mushuks ont toujours eu le désir de partir en exploration, c''est pourquoi bon nombre d''entre eux ne travaillent pas pour les ligues et préfèrent voguer où le vent les poussent, les aventuriers Mushuks sont monnaie courante et sont très appréciés car ils rapportent souvent des marchandises exotiques et n''hésitent pas à les échanger contre de l''or.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Mushuks sont agiles et éloquents mais sont souvent peureux, ils obtiennent un d10 en agilité, un d8 en éloquence et en perception mais subissent un d4 en volonté.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Les Mushuks possèdent une durée de vie étonnante étant donné leur croissance rapide. Ils deviennent des adultes à 15 ans, des marchands avisés à 30 et des sages à 50. Leur étincelle de vie s''éteint à 65 ans. </p>
        <p><span class=\"big_underline\">Héritage félin</span>Les yeux des Mushuks peuvent se fendre en amande en cas de faible luminosité, ce qui leur accorde une <a href=\"../Rules/Glossaire.php#vision_nocturne\">vision nocturne</a>. Ils ne subissent que la moitié des dégâts dûs aux chutes. Ils possèdent également un <a href=\"../Rules/Glossaire.php#estomac_solide\">Estomac Solide</a>.</p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Mushuks savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d6).</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Mushuks savent parler, écrire et lire l''Igaraï, mais la plupart savent au moins parler une autre langue selon avec qui ils commercent (voir <a href=\"../World/Histoire_Ogma.php#langages\">Langages</a>).</p>
    </div>
    <div>
        <h3>Noms Mushuks</h3>
        <p>Les Mushuks n''avait pas de nom avant de se libérer du joug des Sihir, ils ont décidés d''en adopter, mais n''ayant pas de racines ou d''origines particulières, ils décidèrent de copier les Azumas et d''y appliquer leur propre patte. Ils choisirent de ne pas garde le concept de nom de famille, ils se considèrent plus ou moins comme une seule et même fratrie.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Katsuo, Akira, Sake, Kioko, Nobu, Nicarr, Taiko, Chakar, Shiro, Naoki, Koji, Jiro, Isamu</p>
        <p><span class=\"big_underline\">Noms Féminins</span>Haru, Kyo, Oki, Hikaru, Mako, Shizumi, Chaneni, Sayuri, Hatyna, Xemiss, Miki, Keiko, Miyoshi </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Guerrier Mushuk</h4>
        <img src=\"/images/Factions/Mushuk_warrior.jpeg\" alt=\"Guerrier Mushuk\"/>
        <h4>Ville Mushuk</h4>
        <img src=\"/images/Factions/Mushuk_port.jpg\" alt=\"Port Mushuk\" width=\"95%\"/>
        <h4>Cache de contrebandiers Mushuks</h4>
        <img src=\"/images/Factions/Mushuk_base.jpg\" alt=\"Base Mushuk\" width=\"90%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- sakha ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('sakha', 'Sakha', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Tribus Sakha', 1, NULL, false, '<img src=\"/images/Factions/Sakha_picture.jpg\" alt=\"Chaman Sakha\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Enfants des arbres, les Sakha sont apparus suite au Grand Cataclysme. Ils sont liés à Kormo, l''Inkarnaï des forêts</p>
        <p>Ils ne sont pas aussi solide et grands que leurs ancêtres boisés, mesurant en moyenne un mètre cinquante pour moins de quarante kilos, ils ont la peau sombre pour pouvoir se fondre dans l''obscurité des arbres</p>
        <p>Ils ont toujours été discrets, se dissimulant au plus profond des forêts de ce monde. Il est possible de passer toute une vie dans la forêt sans jamais les apercevoir. La forêt Éternelle abriterait l''Arbre Maison, un arbre gigantesque haut de plusieurs centaines de mètres.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>On sait peu de choses sur les Sakhas, il s''agit d''un peuple mystérieux, vivant constamment cachés, les quelques membres ayant rejoint la civilisation ne parlent presque jamais de leur façon de vivre.</p>
        <p>Les Sakha protègent les forêts, ce sont à la fois leur maison et leurs ancêtres. Elles leur fournissent un lien puissant avec Karnaï, ce qui leur permet de lancer plus facilement des sortilèges, quand ils en sortent, le lien s''estompe et il leur est alors difficile d''avoir recours à la magie.</p>
        <p>Ils vivent en petits groupes, occupants des habitations en harmonie avec la forêt, être l’hôte d’un clan de Sakha est un privilège que peu peuvent se vanter d’avoir eu.</p>
    </div>
    <div>
        <h3>Relations avec les autres factions/origines</h3>
        <p>Ils sont presque devenus des créatures de légendes de par le manque de contact avec la civilisation humaine.</p>
        <p>On dit que les meilleurs espions du monde sont des Sakha mais rares sont ceux pouvant s’offrir leurs services.</p>
        <p>Ils ne commercent que très peu, ils n''en éprouvent pas le besoin, certains marchands tentent de pénétrer dans les forêts dans l''espoir de pouvoir échanger une quelconque richesse contre un de leurs arcs qui sont réputés pour être les meilleurs du monde.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Sakhas sont incroyablement agiles et leur habileté est légendaire, ils obtiennent un d10 en agilité et en dextérité. Vivants en autarcie, ils ne sont pas habitués à parlementer avec les autres origines, ils subissent un d4 en éloquence.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>On ne sait que peu de choses sur l''espérance de vie des Sakhas, d''aucun pense qu''ils vivent plus longtemps que les humaines de par leur ascendance magique, les estimations varient mais la plupart s''accordent que leur croissance s''aboutit aux alentours des 25 ans et qu''ils maintiennent un état de forme durant une centaine d''années et déclinent rapidement après leur 130ᵉ anniversaire.</p>
        <p><span class=\"big_underline\">Peuple sylvestre</span>Les Sakhas sont faits pour vivre dans la forêt, ce sont des entités de <a href=\"../Rules/Gabarit.php#gabarit_creatures\">Gabarit</a> P, possédant une <a href=\"../Rules/Glossaire.php#immunite\">Immunité(Poison)</a> et un <a href=\"../Rules/Glossaire.php#estomac_solide\">Estomac Solide</a>.</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Sakhas parlent naturellement le Sylvestre. Il arrive que des Sakhas vivent hors des forêts, auquel cas ils adoptent souvent un autre dialecte pour pouvoir communiquer (voir <a href=\"../World/Histoire_Ogma.php#langages\">Langages</a>). </p>
    </div>
    <div>
        <h3>Noms Sakhas</h3>
        <p>Les enfants des bois n''ont que rarement recours à leur véritable nom, celui-ci ayant un caractère sacré lié à Kormo, ils préfèrent s''adresser à leurs pairs via un surnom choisis par le village. Ils n''ont pas de nom de famille.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Girgadoth, Ungoren, Bolwdor, Erasronor, Haymdus, Aengronir, Bravenin, Arawin, Errus, Nornim, Gwiros </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Aranael, Dagadra, Thiieneth, Naetene, Gelthia, Laenalin, Faliena, Wylaras, Dondweneth, Felgael, Andaelin </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Druide Sakha</h4>
        <img src=\"/images/Factions/Sakha_picture2.jpg\" alt=\"Druide Sakha\" width=\"50%\"/>
        <h4>Village Sakha</h4>
        <img src=\"/images/Factions/Sakha_village.jpg\" alt=\"Village Sakha\" width=\"90%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- sarpa ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('sarpa', 'Sarpa', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Sarpas', 1, NULL, false, '<img src=\"/images/Factions/Sarpa_picture.jpg\" alt=\"Mages Sarpa\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Les plus fous des Sihir les ont créé en utilisant d''autres sihir comme sujets d''expérience, les Sarpa sont la cinquième et dernière origine bestiales.</p>
        <p>Ils possèdent une peau écailleuse, une longue queue et ont le sang-froid comme les reptiles, ils ont besoin de chaleur pour survivre. Ils sont d''apparence variable, il s''agit de l''origine bestiale la plus diversifiée mais on distingue trois grands groupes : les Sarpas-lézards, les plus communs et les plus proches de Sihir d''un point de vue physique ; les Sarpas-serpents n''ont pas de jambes et se déplacent donc comme les serpents ; les Sarpas-crocodiles sont plus imposants que les autres Sarpas dépassant les deux mètres et les 400 kilogrammes.</p>
        <p>Peu après leur création, la Grande Révolte éclata, ils ne subirent pas le massacre des Sihir mais vivent cachés depuis cet évènement de peur de subir le même sort.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Les Sarpas vivent rassemblés dans des cités souterraines et sont souvent soumis à la cruauté des sarpa les plus impitoyables. Ils ont développé un sens moral radicalement différent des peuples de la surface, chez eux le meurtre est un moyen comme un autre pour arriver à ses fins.</p>
        <p>Les Sarpas comblent leur besoin en chaleur par l''usage de la magie, il n''est pas rare de les voir porter un objet enchanté générant de la chaleur. Ils se servent également de la magie pour produire de la lumière quand les grottes se fond trop profondes.</p>
        <p>Certains Sarpas souhaitent rétablir la suprématie des Sihir et projettent de réduire en esclavage le reste du monde, ils se font appeler les Fils de l''Écaille.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>Ils sont devenus légèrement paranoïaques depuis la Grande Révolte et de ce fait évitent les contacts avec les autres origines mais cette paranoïa n''est pas justifiée partout dans le monde. Les personnes les détestant autant que les Sihir sont rares et ils sont généralement vus comme d''autres victimes de la folie des Sihirs.</p>
        <p>Certains d''entre eux sortent à la surface pour échapper à la barbarie de leurs pairs et tentent de vivre parmi les autres origines.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <span class=\"underline\">Communs</span>
        <p><span class=\"big_underline\">Espérance de vie</span>Les Sarpas n''ont pas hérités de l''immortalité Sihir mais surpassent les humains dans ce domaine. Un Sarpa abouti sa croissance vers ses 50 ans, il accumule ainsi de l''expérience et est considéré mâture aux alentours de son premier siècle de vie. Après 180 ans, leur santé décline peu à peu et ils s''éteignent au crépuscule de leur second siècle de vie. </p>
        <p><span class=\"big_underline\">Sang-froid</span>Les Sarpas ne produisent pas naturellement de la chaleur, ils doivent s''exposer quotidiennement à une source de chaleur. Ils possèdent une <a href=\"../Rules/Glossaire.php#vulnerabilite\">Vulnérabilité(Froid, 2)</a>. Ils possèdent également un <a href=\"../Rules/Glossaire.php#estomac_solide\">Estomac Solide</a>.</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Sarpas savent parler, écrire et lire le Draconien. Les plus attachés à leur héritage sihir connaissent le Sihiräll. D''autres ont adoptés le dialecte utilisé dans les environs de leurs cités (voir <a href=\"../World/Histoire_Ogma.php#langages\">Langages</a>).</p>

        <span class=\"underline\">Crocodiles</span>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Sarpas-Crocodiles sont beaucoup plus physiques que leurs pairs, ils obtiennent un d12 en force, d10 en vigueur et d8 en volonté. Leur corpulence les rend patauds et peu attentifs, ils subissent d4 en dextérité, agilité et perception.</p>
        <p><span class=\"big_underline\">Monstre écailleux</span>Les Sarpas-Crocodiles sont massifs et protégés par une couche d''écailles solide, ils possèdent le trait <a href=\"../Rules/Glossaire.php#robuste\">Robuste(2)</a> et sont des créatures de <a href=\"../Rules/Gabarit.php#gabarit_creatures\">Gabarit</a> G.</p>
        <p><span class=\"big_underline\">Prédateur aquatique</span>Les Sarpas-Crocodiles sont habiles dans l''eau, ils possèdent le trait <a href=\"../Rules/Glossaire.php#amphibien\">Amphibien</a>. </p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Sarpas-Crocodiles savent se servir de leur queue et de leurs crocs pour se battre : Arme Naturelle(Queue/Crocs, 1d8).</p>

        <span class=\"underline\">Lézards</span>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Sarpas-Lézards sont habiles de leur main et sont capables de maintenir leurs sorts longtemps dans le plan réel, ils obtiennent un d8 en intelligence, volonté et dextérité.</p>
        <p><span class=\"big_underline\">Écailles</span>Les Sarpas-Lézards ont une peau recouverte d''écailles, ils possèdent le trait <a href=\"../Rules/Glossaire.php#robuste\">Robuste(1)</a>. </p>
        <p><span class=\"big_underline\">Régénération</span>Les Sarpas-Lézards bénéficient d''une régénération à long terme de leurs membres perdus (un jour pour un doigt, une semaine pour une main, un mois pour un bras et deux pour une jambe) et lorsqu''ils récupèrent des blessures le test se fait avec une DC 2 et tout les paliers de 2 DR récupèrent d''une blessure supplémentaire.</p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Sarpas-Lézard savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d6).</p>

        <span class=\"underline\">Serpents</span>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Sarpas-Serpents sont de puissants mages, ils obtiennent un d10 en intelligence et un d12 en volonté. Leurs bras sont courts et assez faibles, ils subissent un d4 en force. Leur corps serpentin n''est pas le plus pratique pour se déplacer rapidement, ils subissent 1d4 en agilité.</p>
        <p><span class=\"big_underline\">Écailles</span>Les Sarpas-Serpents sont couvert d''écailles, ils possèdent le trait <a href=\"../Rules/Glossaire.php#robuste\">Robuste(1)</a>. </p>
        <p><span class=\"big_underline\">Héritage serpentin</span>Les Sarpas-Serpents bénéficient d''une vision thermique, ils sont capables de voir la chaleur dans le noir complet et sont des créatures <a href=\"../Rules/Glossaire.php#rampant\">Rampantes</a>.</p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Sarpas-Serpents peuvent utiliser leurs crochets pour empoisonner leurs victimes : Arme Naturelle(Crochets, 1d4), Débilitant(5).</p>
 </div>
    <div>
        <h3>Noms Sarpas</h3>
        <p>Les Sarpas ont pu développer leur propre culture, leurs noms ne font pas échos à celui des Sihir qui sont si harmonieux. Les Sarpas ont des noms difficiles à prononcer pour les gens ne parlant pas le Draconien.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Throx, Gazzik, Brakuknoxl, Iurlochusk, Arzuuzk, Chukxishk, Agoaszushk, Jikzioz, Goxotrusk, Bhushojasz, Gaxuathrozk </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Botegya, Iceja, Crixadrus, Jekkuh, Crexiknix, Othluju, Jix, Ogzesos, Asarso, Crenzoxas, Kenqu, Izajex </p>
        <p><span class=\"big_underline\">Noms de famille</span>Endoreseus, Casdes, Cayathees, Xermarush, Xemlus, Caclesh, Tiberdorees, Kaysareeth, Galdorus, Xernes</p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Fils de l''Écaille</h4>
        <img src=\"/images/Factions/Sarpa_filsecaille.jpg\" alt=\"Fils de l''Écaille\" width=\"40%\"/>
        <h4>Ville souterraine</h4>
        <img src=\"/images/Factions/Sarpa_ville.jpg\" alt=\"Ville souterraine\" width=\"95%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- sever ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('sever', 'Sever', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Severs', 1, NULL, false, '<img src=\"/images/Factions/Sever_picture.jpg\" alt=\"Guerrière Sever\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Les Sever sont un peuple occupant la majeure partie de Nashira, ce sont des humains de grande taille dépassant pour la plupart le mètre quatre-vingt, leur peau est claire tout comme leurs cheveux, ils disposent d''une force physique impressionnante pouvant rivaliser avec celle des Chonos.</p>
        <p>Ce peuple de guerriers éprouve un profond respect pour les exploits guerriers. L''ordre et la loi sont d''une grande importance pour eux, ils se battent dans l''honneur et pour la gloire.</p>
        <p>Les Severs se font parfois tatouer des symboles sacrés par les mages. Ces tatouages sont jalousement gardés par les Severs, ils accordent des capacités extraordinaires.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>La société Sever s''articule autour des grandes cités dirigées par des jarls. Tous les villages entourants une ville appartiennent au jarl, la ville en elle-même est un lieu de commerce par lequel transite toutes sortes de marchandises venues des quatre coins du monde. Les nombreux fleuves de Nashira facilitent le transport des marchandises par bateau, chaque ville est construite autour d''un gigantesque port fluvial, maritime ou lacustre.</p>
        <p>Les Severs sont des artisans de renom, nombre de leurs forgerons et maroquiniers sont connus à travers tout le continent. Ils n''égalent pas l''art des Steinn, mais leur prix sont bien plus raisonnables.</p>
        <p>En cas de nécessité absolue, les jarls se réunissent pour choisir un roi qui les gouvernera jusqu''à la fin de la crise. Cela est déjà arrivé en de multiples occasions par le passé, le plus souvent ces crises sont déclenchées par des invasions Chonos.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>Il est assez difficile de se déplacer en Nashira sans croiser des Severs, que ce soit une patrouille de gardes ou un village de paysans, bien heureusement, ils ne sont pas aussi agressifs que leur voisin canins du Sud. À moins d''être un bandit recherché, vous serez accueillis où que vous alliez.</p>
        <p>Les villes Sever entretiennent des relations commerciales avec les autres factions humaines via la mer, ils commercent aussi avec les Nains du clan Rakaj vivants encore plus loin dans la chaîne d''Hortak. La cité de Norvar entretient des relations privilégiées avec les communautés Kanta des plaines silencieuses.</p>
        <p>Nombreux sont les jeunes Sever voulant se forger un nom qui partent à l''aventure, ils sont souvent trop intrépides et causent une grande peine à leur famille.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Comme toutes les autres origines Humaines, les Severs peuvent augmenter leurs Caractéristiques par le biais de 3 améliorations de cran, au maximum 2 sur un même dé.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Étant des humains, les Severs peuvent espérer vivre 80 ans, cependant leurs traditions martiales leur ôte pour la plupart la vie avant d''atteindre cet âge vénérable. Du point de vue de la société, un Sever est adulte après son 15ᵉ hiver, il conservera son plein potentiel physique jusqu''au 50ᵉ après quoi sa force commence à décliner ce qui cause la mort au combat de nombreux Severs trop fiers pour voir les ravages du temps sur leur corps meurtris.</p>
        <p><span class=\"big_underline\">Rage du Combat</span>Quand un Sever est blessé, il ne pose pas le genou à terre, il se bat pour la gloire du combat ! Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et le trait <a href=\"../Rules/Glossaire.php#robuste\">Robuste(1)</a> pendant un round. </p>
        <p><span class=\"big_underline\">Endurance humaine</span>Les humains sont naturellement endurants et ne laissent jamais tomber : Ne s''évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour </p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Sever savent parler, écrire et lire le Ralvakor. Ceux qui côtoient fréquemment les Steinn connaissent les rudiments du Steindarr.</p>
    </div>
    <div>
        <h3>Noms Severs</h3>
        <p>Les Severs ont souvent un surnom en plus de leur prénom et nom de famille. Ils acquièrent ce surnom au cours des batailles et des aventures qu''ils vivent.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Grim, Jovar, Bjorn, Guthorm, Haenir, Galdur, Stigur, Vilhelm, Oddvar, Otto </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Aslaug, Inga, Nina, Hilde, Valka, Drifa, Gervif, Erika, Meja, Gyrid, Sofie </p>
        <p><span class=\"big_underline\">Noms de famille</span>Bergstrom, Ahlander, Brodd, Morner, Bergh, Hedenstam, Hellberg, Rusnak, Urusov, Huso, Morgensen </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Guerrier Sever</h4>
        <img src=\"/images/Factions/Sever_picture2.jpg\" alt=\"Guerrier Sever\" width=\"50%\"/>
        <h4>Village Sever</h4>
        <img src=\"/images/Factions/Sever_village.jpg\" alt=\"Village montagnard Sever\" width=\"90%\"/>
        <h4>Ville Sever</h4>
        <img src=\"/images/Factions/Sever_ville.jpg\" alt=\"Ville fluviale Sever\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- sihir ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('sihir', 'Sihir', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Sihirs', 1, NULL, false, '<img src=\"/images/Factions/Sihir_picture.jpg\" alt=\"Mage Sihir\" height=\"600\"/>

    <div>
        <h3>Présentation</h3>
        <p>Les Sihirs sont les premiers êtres intelligents à avoir foulé le sol d''Ogma. Ils sont nés suite au Grand Cataclysme, ils en sont sa manifestation la plus pure. On raconte que ce sont des descendants d''Inkarnaïs car les ravages du temps n''ont aucuns effets sur eux.</p>
        <p>Ils ont les traits fins et la peau bleutée d''un ton variant selon les individus, allant du bleu presque blanc jusqu''au bleu si sombre qu''il paraît noir. Leur stature est haute mais frêle, ils sont plus grands que les Sever mais sont beaucoup plus minces.</p>
        <p>Ils régnait autrefois sur Ogma grâce à leur maîtrise de la magie, ils ont bâti la fabuleuse cité Jikaï au cœur du cratère créée par le météore leur ayant donné la vie. Ils ont asservi les humains alors qu’ils n’étaient encore que des êtres primitifs, leur ont fait subir des expériences atroces qui ont donné vie aux origines bestiales.</p>
        <p>Les esclaves se sont retournés contre leurs maîtres lors de la Grande Révolte et depuis ce jour, les Sihir sont chassés et haï de tous. Leur savoir a été perdu dans sa quasi-totalité, la cité Sihir est devenu un lieu instable magiquement, les sujets d’expériences ratées se sont libérées et tous les trésors des Sihir sont restés à l’intérieur.</p>
        <p>Les Sihir ne sont plus qu’un peuple en lambeaux, décimés par leur propre ambition de dominer le monde. Nul ne sait où se cachent les Sihir, ce genre d''information vaut son pesant d''or tant la haine envers eux est encore brûlante</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Ce peuple n''avait pas de véritable chef, les mages les plus puissants étaient respectés, tandis que les autres négligés, c''était en quelque sorte la loi du plus fort qui régnait. Ce code moral peut être retrouvé chez les Sarpas qui l''ont perpétué depuis la fin de l''âge Sihir.</p>
        <p>Les Sihir vivaient dans l''opulence avant leur déclin, leurs esclaves faisaient tout à leur place. La Grande Révolte les a poussés à se cacher dans la nature, l''usage de la magie s''est fait plus rare. À cause de l''isolement et de la destruction de leur cité, les mœurs des Sihir ont peu à peu disparu au cours des âges, il ne subsiste aujourd''hui que quelques coutumes que bien peu connaissent.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>Les survivants vivent cachés car même s''ils n’ont pas forcément participé aux atrocités commises par leurs pairs, la haine envers les Sihir est trop forte pour la plupart des habitants d’Ogma. Certaines personnes ayant vraiment besoin de leur habilité magique ont parfois recours à leurs capacités dans l''espoir de pouvoir sauver un proche d''un destin funeste ou de conquérir le monde à leurs côtés.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Sihirs sont les maîtres de la magie et de beaux parleurs, ils obtiennent un d10 en intelligence et volonté et un d8 en éloquence. Leurs capacités physiques et leur endurance sont cependant limitées, ils subissent un d4 en force et en vigueur.</p>
        <p><span class=\"big_underline\">Héritage Karnarim</span>Les Sihirs seraient une manifestation physique des Inkarnaïs selon les légendes, le lien qu''ils possèdent avec Karnaï est quant à lui incontestable, ils possèdent une spécialisation dans un domaine de Karnaï pour toutes les compétences pouvant l''être et sont <a href=\"../Rules/Glossaire.php#immortel\">Immortels</a>. </p>
        <p><span class=\"big_underline\">Sensibilité magique</span>Ce lien avec Karnaï est à double tranchant, ils possèdent le trait <a href=\"../Rules/Glossaire.php#vulnerabilite\">Vulnérabilité(Magique,3)</a> et le trait <a href=\"../Rules/Glossaire.php#absorption_magique\">Absorption Magique(3)</a>.</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Sihirs savent parler, écrire et lire le Sihiräll et au moins un autre dialecte, celui utilisés à proximité de l''endroit où ils se cachent.</p>
    </div>
    <div>
        <h3>Noms Sihirs</h3>
        <p>Les Sihirs ont des noms très harmonieux, mélodieux. Leurs noms nobles accentuent encore plus leur comportement hautain.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Les Sihirs sont immortels mais leur croissance est courte comparé à leur durée de vie moyenne. Il ne leur faut qu''un siècle pour obtenir un corps d''adulte, cependant ils ne sont pas considérés comme tel avant d''avoir vécu au moins 3 siècles. Leur respect de leur pairs leur parvient après un millénaire d''expérience. </p>
        <p><span class=\"big_underline\">Noms Masculins</span>Phraan, Aquilan, Elluin, Ilbryen, Elaith, Saelethil, Aumanas, Sihnion, Simimarr, Ardryll, Vaalyun, Alaion </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Elea, Ysildea, Haera, Eirina, Irhaal, Jastira, Shaerra, Elora, Nimeroni, Shalaeva, Aerith, Helartha </p>
        <p><span class=\"big_underline\">Noms de famille</span>Olavalur, Iarrona, Waesberos, Ravamys, Eiltoris, Krisren, Valaris, Naefina </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Mage Sihir</h4>
        <img src=\"/images/Factions/Sihir_picture2.jpg\" alt=\"Mage Sihir\" width=\"60%\"/>
        <h4>Jikaï</h4>
        <img src=\"/images/Factions/Sihir_ville.jpg\" alt=\"Jikai\" width=\"90%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- steinn ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('steinn', 'Steinn', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Steinns', 1, NULL, false, '<img src=\"/images/Factions/Steinn_picture.jpg\" alt=\"Noble Steinn\" height=\"600\"/>
    <div>
        <h3>Description Physique</h3>
        <p>Ils sont nés de la pierre, ce sont les gardiens des montagnes. Les Steinns sont des êtres de petite taille ne dépassant pas le mètre quarante mais de constitution robuste, ils aiment arborer leurs longues barbes tressées</p>
        <p>On raconte qu''un conflit entre deux frères de la famille royale serait à l''origine de la scission des Steinn, créant deux clans portant le nom du frère choisis comme légitime, ils forment depuis deux peuples bien distincts. Le clan Khazun dans les Monts Ardents au Nord d''Antoraï et le clan Rakaj au Nord de Nashira de la chaîne d’Hortak.</p>
        <p>Les Steinns n’utilisent que rarement la magie de manière conventionnelle, ils préfèrent la manier sous sa forme physique. Les Grumdarr, à la fois prêtre et artisan, effectuent des rituels en communion avec Ourgal pour imprégner de karnyx leurs créations. Ces objets sertis de cristaux permettent diverses choses selon la façon dont ils ont étés créés, certains s''embrasent, d’autres gèlent.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Les deux clans sont d’excellents artisans, même les Sever ne peuvent rivaliser avec eux, leur longue durée de vie couplée à leur accès aux matières premières leur permet d’accumuler une expérience incomparable avec celle des autres artisans non-Steinn.</p>
        <p>Les cités Steinndarr sont creusées dans les montagnes, reliées entre elle tantôt par des routes dotées de ponts majestueux, tantôt par des passages souterrains.</p>
        <p>Le clan Rakaj est mené par l’ingénieur élu comme étant le meilleur du clan au cours d’un concours ayant lieu tous les 5 ans, le clan Khazun a quant à lui conservé son système oligarchique où les grandes familles nobles se disputent le pouvoir, menant le clan à d’incessantes guerres civiles.</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>Le clan Rakaj commerce avec les Sever mais nombreux sont ceux qui viennent directement commander une pièce aux maître-artisans.</p>
        <p>L’instabilité du clan Khazun rend toute relation avec d’autres factions impossible, les batailles incessantes entre les Steinn et les Tuskizis pour mines de pierres précieuses du bois de cristal en sont un parfait exemple.</p>
        <p>Les Steinns sont assez rares en dehors de leurs cités de pierre, ce sont souvent des marchands itinérants ou des guerriers trop avides de batailles.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Steinns sont robustes, forts et de bons artisans, ils obtiennent un d10 en vigueur et un d8 en force et dextérité. Leur corps de pierre les rend moins agiles que les autres origines, ils subissent un d4 en agilité.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Leur corps sculté par Ourgal résiste aux dégâts du temps, les Steinns vivent jusqu''à 250 ans, sont des anciens parmis les leurs après deux siècles passés à arpenter les mines, des Steinns mâtures et respectés après 100 ans d''artisanat, et deviennent adulte 50 ans après leur naissance. </p>
        <p><span class=\"big_underline\">Vision souterraine</span>Les Steinns ont passés beaucoup de temps à creuser la pierre dans des galeries sombres, ils ont obtenu la capacité <a href=\"../Rules/Glossaire.php#vision_nocturne\">vision nocturne</a>.</p>
        <p><span class=\"big_underline\">Taillé dans le Roc</span>Les Steinns sont créés à partir de roche avant de devenir des êtres vivants, ce sont des entités de <a href=\"../Rules/Gabarit.php#gabarit_creatures\">Gabarit</a> P possédant le obtiennent le trait <a href=\"../Rules/Glossaire.php#robuste\">Robuste(1)</a>. </p>
        <p><span class=\"big_underline\">Froideur d''Hortak</span>Le clan Rakaj vit dans les montagnes enneigées de la chaîne d''Hortak, ils obtiennent le trait <a href=\"../Rules/Glossaire.php#resistance\">Résistance(Froid, 3)</a>.</p>
        <p><span class=\"big_underline\">Chaleur des Monts Ardents</span>Le clan Khazun vit dans les volcans d''Antoraï, ils obtiennent le trait <a href=\"../Rules/Glossaire.php#resistance\">Résistance(Feu, 3)</a>.</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Steinns savent parler, écrire et lire le Steindarr. Une partie du clan Rakaj connait les bases du Ralvakor et une partie plus petite encore du clan Khazun parle l''Ashraï.</p>
    </div>
    <div>
        <h3>Noms Steinns</h3>
        <p>Les Steinns sont fiers de leurs noms, que ce soit le leur, ou celui de leur famille, ils aiment lui faire honneur en accomplissant de grandes choses. Il n''est pas rare de voir un Steinn porter un surnom selon sa profession. Les noms de famille Steinn sont souvent dû à un acte héroïque accomplit par un aïeul.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Bhaklour, Strosgrum, Elrbok, Bamnuil, Dwelo, Torek, Ozzorlim, Naldrog, Haldric, Dhufrun, Nudurim </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Anmaesli, Dalomneala, Throsatrud, Dhossosli, Snasseala, Barinubo, Hulmikara, Yoghitryd, Glaferra </p>
        <p><span class=\"big_underline\">Noms de famille</span>Arlban, Gorosten, Folmas, Gorver, Saelac, Arrat, Durka, Alcan</p>
        <p><span class=\"big_underline\">Surnoms</span>Crâne-de-fer, Mine-lave, Barbe-de-feu, Poing-de-pierre, Marteau-sanglant, Brise-corne, Dent-givrée </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Ville du clan Rakaj</h4>
        <img src=\"/images/Factions/Steinn_Rakaj_ville.jpg\" alt=\"Ville Rakaj\" width=\"95%\"/> <br/> <br/>
        <h4>Ville du clan Khazun</h4>
        <img src=\"/images/Factions/Steinn_Khazun_ville.jpg\" alt=\"Ville Khazun\" width=\"90%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- tori ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('tori', 'Tori', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Toris', 1, NULL, false, '<img src=\"/images/Factions/Tori_picture.jpg\" alt=\"Moine Tori\" height=\"600\"/>
    <div>
        <h3>Présentation</h3>
        <p>Ce sont des humanoïdes issus des oiseaux : Homme-aigle, Homme-ara, Homme-chouette,... Ils possèdent des ailes et sont capables de voler sur de grandes distances</p>
        <p>Ils sont la quatrième origine bestiale créée par les Sihir, ils devaient accomplir des tâches complexes irréalisables par les autres origines bestiales. Depuis la Grande Révolte ils se sont dispersés à travers le monde et se déplacent sans cesse. </p>
        <p>Les Toris sont des poètes, des colporteurs de légendes, des conteurs, des musiciens, ils apportent la joie et la bonne humeur partout où ils passent. Ils sont très habiles avec la magie et apprécient accompagner leurs histoires et chansons d''une démonstration de leur talent.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Les Toris n''apprécient guère de rester en place trop longtemps, ils ne cessent de vagabonder de villes en villages. Ils accumulent de ce fait un grand savoir et le répande partout où ils passent.</p>
        <p>Ils sont un peuple indépendant et pacifiste, ils n''apprécient pas de se battre pour rien. Ils n''en sont pas pour autant inoffensifs, ils maîtrisent des techniques de combat exploitant à merveille leurs capacités aviaires</p>
    </div>
    <div>
        <h3>Relations</h3>
        <p>L''arrivée d''un Tori chez vous est généralement synonyme d''informations sur le reste du monde, ils apportent également avec eux nombre de chansons apprises au cours de leurs voyageurs.</p>
        <p>Tout les Toris sont considérés comme des aventuriers par le commun des mortels, et tous apprécient de les entendre chanter.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Les Toris sont des poètes itinérants, ils obtiennent un d10 en éloquence et un d8 en agilité.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Leur constitution ne permet pas aux Toris de vivre très longtemps, ils atteignent l''âge adulte après leur 15ᵉ printemps, sont devenus des puits de savoir à leur 30ᵉ anniversaire et déclinent physiquement après leur 60ᵉ printemps pour s''éteindre après 65 ans à arpenter le monde. </p>
        <p><span class=\"big_underline\">Héritage Aviaire</span>Les Toris sont dotés d''ailes puissantes et savent s''en servir peu après leur naissance, ils possèdent le trait <a href=\"../Rules/Glossaire.php#volant\">Volant(Vitesse*2)</a>. Ils possèdent également un <a href=\"../Rules/Glossaire.php#estomac_solide\">Estomac Solide</a></p>
        <p><span class=\"big_underline\">Beau parleur</span>Les Toris savent trouver les mots justes, ils peuvent relancer un jet d''éloquence raté une fois par jour.</p>
        <p><span class=\"big_underline\">Armes Naturelles</span>Les Toris savent se servir de leurs serres et de leur bec pour se battre : Arme Naturelle(Bec/Serres, 1d6).</p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Toris savent parler, écrire et lire le Payaritt et deux autres langues <a href=\"../World/Histoire_Ogma.php#langages\">au choix</a>.</p>
    </div>
    <div>
        <h3>Noms Toris</h3>
        <p>Les Toris n''ont pas de noms de famille comme les autres origines bestiales, ils possèdent tous un surnom unique qu''ils obtiennent au cours de leurs voyages, souvent donnés par les enfants écoutant leurs chansons. Leurs noms de naissance sont unisexes.</p>
        <p><span class=\"big_underline\">Noms Toris</span>Cref, Qhi, Aiakerrk, Ekkac, Kis, Krurrel, Kha, Yif, Acic, Oocarrk, Khef, Klecarc, Qoor, Clil, Aial, Rukkaak, Griccec, Uss, Dag, Aerk, Krires </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Guerrier Tori</h4>
        <img src=\"/images/Factions/Tori_picture2.jpg\" alt=\"Guerrier Tori\" width=\"70%\"/>
    </div>' FROM wc)
        SELECT 1");

        // --- tuskizi ---
        $this->addSql("WITH
            wc AS (INSERT INTO web_content (page, title, category) VALUES ('tuskizi', 'Tuskizi', 'lore') RETURNING id),
            s0 AS (INSERT INTO web_content_section (web_content_id, position, title, level, anchor, collapsible, content) SELECT id, 0, 'Les Tuskizis', 1, NULL, false, '<img src=\"/images/Factions/Tuskizi_picture.jpg\" alt=\"Citoyen du Sultanat\" height=\"600\"/>
    <div>
        <h3>Présentation</h3>
        <p>Ce sont les humains vivant sur Antoraï, ils ont la peau et les cheveux sombres. Ils occupent presque l''intégralité du sud d''Antoraï, leur territoire s''étend des Terres Écarlates jusqu''aux Bois de Cristal disputé avec le clan Khazun.</p>
        <p>Les plus grandes villes du Sultanat sont situées sur le littoral d''Antoraï. Quelques tributs nomades parcourent les Terres Écarlates et commercent entre les villages intra-désertiques. Hebsys, Ishta et Akhrun sont trois villes portuaires gigantesques construites sur l''eau à l''embouchure de trois fleuves différents. D''autres villes situées à l''intérieur des terres sont consacrées principalement à l''agriculture permettant de subvenir aux besoins des trois villes majeures.</p>
    </div>
    <div>
        <h3>Société</h3>
        <p>Le dirigeant des Tuskizi est un sultan, le trône revient à son fils lors de la mort du souverain. Le sultan gouverne depuis son palais à Ishta, tandis que des personnes de confiance qu''il a lui-même nommés s''occupent de la gérance des autres villes du sultanat, ce sont les vizirs.</p>
        <p>Le sultanat possèdent les mines de pierres précieuses du Bois de Cristal, disputés avec les nains du clan Khazun.</p>
        <p>La majeure partie des habitants du sultanat sont des Tuskizis mais il n''est pas rare de voir des Mushuks ou même des Chonos posséder le statut de citoyen du sultanat.</p>

    </div>
    <div>
        <h3>Relations</h3>
        <p>Les soldats du sultanat sont sans cesse sur le qui-vive à la frontière Nord, le clan Khazun ayant des vues sur leurs mines</p>
        <p>Le Sultanat profite également de son accès à la mer pour échanger leurs gemmes et autres marchandises exotiques aux autres factions humaines.</p>
    </div>
    <div>
        <h3>Traits</h3>
        <p><span class=\"big_underline\">Caractéristiques</span>Comme toutes les autres origines Humaines, les Tuskizis peuvent augmenter leurs Caractéristiques par le biais de 3 améliorations de cran, au maximum 2 sur un même dé.</p>
        <p><span class=\"big_underline\">Espérance de vie</span>Résilients aux climats comme au temps, les Tuskizis vivent en moyenne un siècle entier avant de s''éteindre, ils sont considérés comme des adultes responsables après leur 15ᵉ anniversaire, comme des adultes mâtures après 40 de services auprès du Sultanat et des êtres avisés 75 ans après leur naissance.</p>
        <p><span class=\"big_underline\">Poussée d''Adrénaline</span>Un Tuskizi ne se laisse jamais abattre et se battra jusqu''à la fin : Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et les tests d''esquive se font avec un bonus de 2 pendant un round.</p>
        <p><span class=\"big_underline\">Endurance humaine</span>Les humains sont naturellement endurants et ne laissent jamais tomber : Ne s''évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour </p>
        <p><span class=\"big_underline\"><a href=\"../World/Histoire_Ogma.php#langages\">Langages</a></span>Les Tuskizis savent parler, écrire et lire l''Ashraï, certains habitants du sultanat parlent le Draconien pour communiquer avec les Sarpas, d''autres utilisent l''Igaraï lors des échanges avec les Mushuks.</p>
    </div>
    <div>
        <h3>Noms Tuskizis</h3>
        <p>Les Tuskizis ne sont pas comme les autres origines humaines, leur nom n''a pas de signification particulière, et celui de famille n''a pas d''autre fonction que d''indiquer la lignée de l''individu. Chez les Tuskizis, ce sont les actes qui définissent les gens et pas leur nom.</p>
        <p><span class=\"big_underline\">Noms Masculins</span>Abdalla, Selim, Haisam, Ishaq, Radames, Ashraf, Qaseem, Jaleel, Dakuri, Ozi </p>
        <p><span class=\"big_underline\">Noms Féminins</span>Miria, Nannosa, Alia, Zuleika, Aralu, Monireh, Ishtar, Nitza, Irit, Shirli </p>
        <p><span class=\"big_underline\">Noms de famille</span>Safar, Kattan, Asghar, Wasem, Nazari, Nasri, Sahnoun </p>
    </div>
    <div>
        <h2>Galerie</h2>
        <h4>Ville Tuskizi</h4>
        <img src=\"/images/Factions/Tuskizi_ville.jpg\" alt=\"Ville Tuskizi\" width=\"90%\"/>
    </div>' FROM wc)
        SELECT 1");
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DELETE FROM web_content_section');
        $this->addSql("DELETE FROM web_content WHERE category = 'lore'");
    }
}