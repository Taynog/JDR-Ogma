--
-- PostgreSQL database dump
--

\restrict DSetLbr9qHWY1zbWOyr90H316GcchvV5UCM97lpJldYaKHP7kbHZgUUs9BfnVYz

-- Dumped from database version 17.10 (Debian 17.10-0+deb13u1)
-- Dumped by pg_dump version 17.10 (Debian 17.10-0+deb13u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: armor; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.armor (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    description text,
    protection smallint NOT NULL,
    protection_magical smallint NOT NULL,
    price character varying(255) NOT NULL,
    enc smallint NOT NULL,
    speed_penalty character varying(255) DEFAULT NULL::character varying,
    movement_check_disadvantage character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.armor OWNER TO www_data;

--
-- Name: armor_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.armor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.armor_id_seq OWNER TO www_data;

--
-- Name: armor_material; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.armor_material (
    armor_material integer NOT NULL,
    armor_category integer NOT NULL
);


ALTER TABLE public.armor_material OWNER TO www_data;

--
-- Name: changelog; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.changelog (
    id integer NOT NULL,
    version character varying(255) NOT NULL,
    content text NOT NULL
);


ALTER TABLE public.changelog OWNER TO www_data;

--
-- Name: changelog_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.changelog_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.changelog_id_seq OWNER TO www_data;

--
-- Name: combat_art_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.combat_art_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.combat_art_id_seq OWNER TO www_data;

--
-- Name: combat_art; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.combat_art (
    id integer DEFAULT nextval('public.combat_art_id_seq'::regclass) NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    conditions text,
    effect text NOT NULL,
    cost character varying(255) DEFAULT NULL::character varying,
    assaillant_test text NOT NULL,
    defender_test text NOT NULL,
    category character varying(255) DEFAULT NULL::character varying,
    tier character varying(255) DEFAULT NULL::character varying,
    critique text,
    order_index integer DEFAULT 0 NOT NULL,
    section integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.combat_art OWNER TO www_data;

--
-- Name: combat_art_weapon_category; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.combat_art_weapon_category (
    combat_art_id integer NOT NULL,
    weapon_category_id integer NOT NULL
);


ALTER TABLE public.combat_art_weapon_category OWNER TO www_data;

--
-- Name: damage_type; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.damage_type (
    id integer NOT NULL,
    type character varying(255) NOT NULL,
    description text,
    effect text
);


ALTER TABLE public.damage_type OWNER TO www_data;

--
-- Name: damage_type_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.damage_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.damage_type_id_seq OWNER TO www_data;

--
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO www_data;

--
-- Name: glossary_condition; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.glossary_condition (
    id integer NOT NULL,
    condition character varying(255) NOT NULL,
    description text,
    effect text NOT NULL
);


ALTER TABLE public.glossary_condition OWNER TO www_data;

--
-- Name: glossary_condition_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.glossary_condition_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.glossary_condition_id_seq OWNER TO www_data;

--
-- Name: glossary_trait; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.glossary_trait (
    id integer NOT NULL,
    trait character varying(255) NOT NULL,
    description text,
    effect text NOT NULL
);


ALTER TABLE public.glossary_trait OWNER TO www_data;

--
-- Name: glossary_trait_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.glossary_trait_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.glossary_trait_id_seq OWNER TO www_data;

--
-- Name: item; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.item (
    id integer NOT NULL,
    category_id integer NOT NULL,
    item character varying(255) NOT NULL,
    description text,
    price character varying(255) NOT NULL,
    enc smallint NOT NULL
);


ALTER TABLE public.item OWNER TO www_data;

--
-- Name: item_category; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.item_category (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    description text
);


ALTER TABLE public.item_category OWNER TO www_data;

--
-- Name: item_category_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.item_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.item_category_id_seq OWNER TO www_data;

--
-- Name: item_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.item_id_seq OWNER TO www_data;

--
-- Name: material; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.material (
    id integer NOT NULL,
    material character varying(255) NOT NULL,
    description text,
    weapon_bonus_dmg character varying(255) DEFAULT NULL::character varying,
    weapon_passive_effect text,
    weapon_active_effect text,
    armor_bonus_protection character varying(255) DEFAULT NULL::character varying,
    armor_bonus_proctection_magical character varying(255) DEFAULT NULL::character varying,
    armor_passive_effect text,
    armor_active_effect text,
    weapon_price_multiplier character varying(255) DEFAULT NULL::character varying,
    armor_price_multiplier character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.material OWNER TO www_data;

--
-- Name: material_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.material_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.material_id_seq OWNER TO www_data;

--
-- Name: skill; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.skill (
    id integer NOT NULL,
    skill character varying(255) NOT NULL,
    description text,
    main_carac character varying(255) DEFAULT NULL::character varying,
    specialisation_example text,
    test_example text
);


ALTER TABLE public.skill OWNER TO www_data;

--
-- Name: skill_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.skill_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.skill_id_seq OWNER TO www_data;

--
-- Name: sort_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.sort_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.sort_id_seq OWNER TO www_data;

--
-- Name: sort; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.sort (
    id integer DEFAULT nextval('public.sort_id_seq'::regclass) NOT NULL,
    effet character varying(255) NOT NULL,
    propriete text,
    ecole character varying(255) NOT NULL,
    dc character varying(255) NOT NULL,
    magnitude text NOT NULL,
    description text,
    inkarnai character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public.sort OWNER TO www_data;

--
-- Name: stance; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.stance (
    id integer NOT NULL,
    stance character varying(255) NOT NULL,
    description text,
    effect text NOT NULL
);


ALTER TABLE public.stance OWNER TO www_data;

--
-- Name: stance_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.stance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.stance_id_seq OWNER TO www_data;

--
-- Name: user; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    email character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    is_verified boolean NOT NULL
);


ALTER TABLE public."user" OWNER TO www_data;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.user_id_seq OWNER TO www_data;

--
-- Name: weapon; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.weapon (
    id integer NOT NULL,
    category_id integer NOT NULL,
    type character varying(50) NOT NULL,
    damage_type character varying(255) NOT NULL,
    damage character varying(255) NOT NULL,
    handling character varying(255) NOT NULL,
    reach character varying(25) NOT NULL,
    enc smallint NOT NULL,
    price character varying(255) NOT NULL
);


ALTER TABLE public.weapon OWNER TO www_data;

--
-- Name: weapon_category; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.weapon_category (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    description text,
    effect text
);


ALTER TABLE public.weapon_category OWNER TO www_data;

--
-- Name: weapon_category_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.weapon_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.weapon_category_id_seq OWNER TO www_data;

--
-- Name: weapon_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.weapon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.weapon_id_seq OWNER TO www_data;

--
-- Name: weapon_property; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.weapon_property (
    id integer NOT NULL,
    property character varying(255) NOT NULL,
    description text,
    effect text,
    example text
);


ALTER TABLE public.weapon_property OWNER TO www_data;

--
-- Name: weapon_property_details; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.weapon_property_details (
    id integer NOT NULL,
    weapon_property_id integer NOT NULL,
    x character varying(20) DEFAULT NULL::character varying,
    y character varying(20) DEFAULT NULL::character varying,
    z character varying(20) DEFAULT NULL::character varying
);


ALTER TABLE public.weapon_property_details OWNER TO www_data;

--
-- Name: weapon_property_details_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.weapon_property_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.weapon_property_details_id_seq OWNER TO www_data;

--
-- Name: weapon_property_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.weapon_property_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.weapon_property_id_seq OWNER TO www_data;

--
-- Name: weapon_property_weapon; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.weapon_property_weapon (
    weapon_id integer NOT NULL,
    weapon_property_details_id integer NOT NULL
);


ALTER TABLE public.weapon_property_weapon OWNER TO www_data;

--
-- Name: web_content; Type: TABLE; Schema: public; Owner: www_data
--

CREATE TABLE public.web_content (
    id integer NOT NULL,
    page character varying(255) NOT NULL,
    title character varying(255) NOT NULL,
    content text,
    category character varying(255) NOT NULL
);


ALTER TABLE public.web_content OWNER TO www_data;

--
-- Name: web_content_id_seq; Type: SEQUENCE; Schema: public; Owner: www_data
--

CREATE SEQUENCE public.web_content_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.web_content_id_seq OWNER TO www_data;

--
-- Data for Name: armor; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.armor (id, category, description, protection, protection_magical, price, enc, speed_penalty, movement_check_disadvantage) FROM stdin;
31	Légère	\N	1	0	75 pa	1	\N	\N
32	Légère	\N	2	0	150 pa	1	\N	\N
33	Légère	\N	3	1	375 pa	1	\N	\N
34	Légère	\N	4	2	1000 pa	1	\N	\N
35	Légère	\N	5	3	1800 pa	1	\N	\N
36	Intermédiaire	\N	2	0	100 pa	2	\N	\N
37	Intermédiaire	\N	3	1	200 pa	2	\N	\N
38	Intermédiaire	\N	4	2	500 pa	2	\N	\N
39	Intermédiaire	\N	5	3	1200 pa	2	\N	\N
40	Intermédiaire	\N	6	4	2500 pa	2	\N	\N
41	Lourde	\N	3	1	125 pa	3	\N	\N
42	Lourde	\N	4	2	300 pa	3	\N	\N
43	Lourde	\N	5	3	750 pa	3	\N	\N
44	Lourde	\N	6	4	1500 pa	3	\N	\N
45	Lourde	\N	7	5	3000 pa	3	\N	\N
\.


--
-- Data for Name: armor_material; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.armor_material (armor_material, armor_category) FROM stdin;
31	31
32	32
33	33
34	34
35	35
36	36
37	37
38	38
39	39
40	40
41	41
42	42
43	43
44	44
45	45
\.


--
-- Data for Name: changelog; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.changelog (id, version, content) FROM stdin;
\.


--
-- Data for Name: combat_art; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.combat_art (id, name, description, conditions, effect, cost, assaillant_test, defender_test, category, tier, critique, order_index, section) FROM stdin;
157	Balayette	Le héros tente de faire tomber son adversaire au sol	\N	La cible est au sol et passe son prochain tour, elle subit 2 dégâts	\N	Action bonus : DEX	AGI	\N	\N	R: La cible s'assome et sombre dans l'inconscience<br/>E: Le héros chute et passe son prochain tour	1	1
158	Charge d'épaule	Le héros bouscule son adversaire pour le faire tomber au sol	\N	La cible est au sol et passe son prochain tour, elle subit 4 dégâts	\N	Action bonus : FOR	VIG	\N	\N	R: La cible s'assome et sombre dans l'inconscience<br/>E: Le héros trébuche et passe son prochain tour	2	1
159	Coup dans les yeux	Avec un rapide coup de dague au visage, le héros aveugle momentanément son adversaire	Dague<br/>Cible sans casque	cible aveuglée partiellement : Atq et Prd -20 (3 tours)	\N	Action simple :<br/>Jet d'Atq à -20	Parade/Esquive à +10	\N	\N	R: Dégâts + 2, cible aveugle 5 tours<br/>E: /	3	1
160	Désarmement	Le héros lutte habilement pour ôter son arme à son adversaire	Après une attaque réussie	La cible est désarmée	\N	Action bonus : DEX ou FOR	DEX	\N	\N	R: /<br/>E: Le héros fait tomber son arme à ses pieds.	4	1
161	Feinte	Le héros distrait son adversaire avant de frapper. La forme de la feinte est à préciser par le joueur	Arme de corps-à-corps pouvant infliger des dégâts perforants	R: dégâts + 4<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité	\N	Action bonus :<br/>Le joueur lance un d100 avant de faire son jet d'attaque (avec bonus éventuels selon le personnage et au choix du MJ), son adversaire lance aussi un d100 (encore bonus et malus au choix du MJ). Le plus haut score l'emporte.	La cible ne peut pas se défendre	\N	\N	R: dégâts + 4<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité	5	1
162	Fente	Le héros s'appuie sur sa jambe avant pour frapper de loin	Arme de corps-à-corps pouvant infliger des dégâts perforants	La portée augmente d'un mètre	\N	Action simple :<br/>Moyenne Atq/AGI	Parade/Esquive classique	\N	\N	R: /<br/>E: Le héros trébuche et tombe au sol	6	1
163	Lacération	Le héros frappe pour ouvrir les veines de son adversaire	Cible sans armure à l'endroit ciblé	la cible saigne (1d6/tour) pendant 3 tours	\N	Action simple :<br/>Jet d'Atq à -10, les dégâts sont divisés par deux	Parade/Esquive classique, si le coup touche, épreuve de VIG pour contrer le saignement	\N	\N	R: 5 tours de saignement<br/>E: /	7	1
164	Lutte	Le héros agrippe son adversaire pour entraver ses options de combat	Une main libre (si deux mains libres bonus de +20)	Le héros doit réussir un jet par tour pour maintenir sa prise (FOR ou DEX du héros - FOR ou DEX de cible + 5 par tour). Durant la lutte, le héros peut déplacer la cible de la moitié de sa vitesse de déplacement, l'attaquer (ignore l'armure à 30 ou moins), l'immobiliser ou l'attacher (avec cordes ou autre) via une épreuve de DEX à -30.	\N	Action simple : DEX ou FOR	DEX ou FOR pour contrer la prise	\N	\N	\N	8	1
165	Provocation	Le héros provoque son/ses adversaire(s) et le(s) pousse(nt) à l'attaquer en priorité	\N	La cible se concentre sur le héros et attaque désormais avec deux désavantages les autres cibles pendant 3 rounds	\N	Action bonus : ELO	Un jet de VOL pour chaque adversaire provoqué	\N	\N	R: La durée de provocation passe à 5 rounds, la cible ne frappe que le héros<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité	9	1
166	Ralliement	Le héros motive ses alliés à continuer le combat	\N	Les alliés récupèrent 1d6+(marge de réussite/10) points d'endurance	\N	Action bonus : ELO		\N	\N	R: /<br/>E: Le héros baisse sa garde et subit une attaque d'opportunité	10	1
167	Repositionnement	Le héros lutte pour déplacer son adversaire	\N	La cible est déplacée de 1m + 1m par 10 points de marge de réussite.	\N	Action de mouvement : DEX ou FOR	AGI ou VIG	\N	\N	R: /<br/>E: /	11	1
168	Tranche	Le héros saisit son arme à deux mains pour un violent coup horizontal	Arme polyvalente ou à deux mains	Touche toutes les cibles en face et à portée	\N	Action complexe :<br/>Un seul jet d'Atq à -15	Chaque cible peut parer ou esquiver	\N	\N	R: Dégâts + 2<br/>E: /	12	1
169	Tranche-tendons	Le héros frappe la cible dans les articulations des jambes pour l'empêcher de bouger.	\N	Déplacement de la cible limité à un mètre par round	\N	Action simple :<br/>Jet d'attaque d'Atq à -25	Parade/Esquive à -10	\N	\N	R: dégâts + 3<br/>E: /	13	1
170	Tir précis	L'arbalétrier prend son temps pour viser sa cible	\N	Dégâts normaux	\N	Action complexe :<br/>Tir à +15		Arbalétrier	Apprenti	R: /<br/>E: /	1	2
171	Tir déstabilisant	L'arbalétrier prépare un tir particulièrement puissant pour faire chuter sa cible	Jet rupture pour l'arme à +1	La cible est à terre	\N	Action complexe :<br/>Tir classique	VIG pour ne pas tomber	Arbalétrier	Adepte	R: /<br/>E: /	2	2
172	Tir rapide	L'arbalétrier effectue un tir rapide à la hanche	\N	Dégâts normaux	\N	Action bonus :<br/>Tir à -15		Arbalétrier	Expert	R: /<br/>E: /	3	2
173	Tir pénétrant	L'arbalétrier tire sur deux cibles alignées et transperce la première pour atteindre la seconde	2 cibles alignées	Dégâts normaux pour la première cible, -3 pour la deuxième	\N	Action complexe :<br/>Tir classique		Arbalétrier	Expert	R: le carreau frappe une troisième cible si possible avec -6 dégâts.<br/>E: /	4	2
174	Volée de flèches	L'archer tire une flèche sur chacun des opposants qu'il a en ligne de mire (max 5)	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif		Archer	Expert	R: /<br/>E: La corde de l'arc se brise (Rupture)	3	2
175	Frappe assassine	L'assassin frappe un point faible de l'adversaire	Attaque avec avantage	Degâts x1,5	\N	Action simple :<br/>Atq classique	Parade/Esquive classique	Assassin	Apprenti	R: /<br/>E: /	1	2
176	Coup mortel	L'assassin élimine une cible incapable de se défendre	Cible vulnérable(aveuglée, immobilisée, inconscient, etc...)	Mort instantanée de la cible	\N	Acton complexe :<br/>Jet d'Atq à -20	Jet de Vigueur	Assassin	Expert	R: /<br/>E: /	2	2
177	Frappe lourde	Le barbare envoie son adversaire au sol en le frappant avec un force surhumaine	FOR du barbare supérieure à celle de sa cible	Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.	\N	Action complexe<br/>Atq à -10	jet d'AGI pour esquiver puis VIG pour résister à la mise au sol	Barbare	Apprenti	R: /<br/>E: /	1	2
178	Destruction	Le barbare tente de briser l'équipement de son adversaire avec son arme	Rupture du barbare supérieure à l'adversaire	L'équipement ciblé est endommagé (arme: Atq et Prd -15, Dgt -2; armure : PR -2)	\N	Action simple :<br/>FOR	AGI pour l'armure ou DEX pour l'arme suivi d'un test de rupture	Barbare	Adepte	R: L'équipement ciblé est détruit<br/>E: /	2	2
179	Double attaque	Le héros frappe deux fois avec son arme dans un mouvement fluide	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10	Parade/Esquive classique pour chaque frappe	Épéiste	Apprenti	R: /<br/>E: /	1	2
180	Triple attaque	Le héros délivre un déluge de coup sur son adversaires et frappe trois fois	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire	Parade/Esquive classique pour chaque frappe	Épéiste	Expert	R: /<br/>E: /	2	2
181	Déplacement forcé	À l'aide de son arme, le faucheur force sa cible à se déplacer sous peine de subir une autre blessure	Après une attaque réussie	La cible est déplacée de 1m + 1m par 10 points de marge de réussite	\N	Action de mouvement :<br/>DEX pour coincer l'adversaire puis FOR pour le tirer	AGI pour passer sous la lame puis VIG pour résister au déplacement	Faucheur	Apprenti	R: /<br/>E: /	1	2
182	Frappe dans le dos	Le faucheur utilise son arme pour frapper sa cible dans le dos, où l'armure est plus fine	\N	Ignore 2 points de PR de l'armure	\N	Action simple :<br/>Jet d'Atq à -10	Parade/Esquive classique	Faucheur	Adepte	R: /<br/>E: /	2	2
183	Frappe de la faucheuse	Le faucheur frappe deux fois en un seul et large mouvement	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10	Parade/Esquive classique pour chaque frappe	Faucheur	Expert	R: /<br/>E: /	3	2
184	Réception de charge	Le hallebardier se prépare à infliger une attaque d'opportunité à quiconque pénètre sa zone de contrôle	\N	Le hallebardier peut porter une attaque d'opportunité (avec un bonus de 10 à l'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.	\N	Action de mouvement :<br/>Aucune épreuve pour se préparer		Hallebardier	Novice	R: /<br/>E: /	0	2
185	Mise au sol	Le hallebardier profite d'une attaque réussie pour agripper son adversaire avec le croc de son fer et l'amener au sol	Après une attaque réussie	La cible est à terre	\N	Action bonus :<br/>FOR	VIG pour ne pas tomber	Hallebardier	Apprenti	R: /<br/>E: /	1	2
186	Frappe de la hampe	Le hallebardier enchaîne après une attaque par un coup de la hampe	Après une attaque	1d4 de dégâts contondants	\N	Action bonus :<br/>Atq	Parade/Esquive classique	Hallebardier	Adepte	R: /<br/>E: /	2	2
187	Double estoc	Le lancier frappe deux fois de la pointe de sa lance	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10	Parade/Esquive classique pour chaque frappe	Lancier	Apprenti	R: /<br/>E: /	1	2
188	Triple estoc	Le lancier délivre un déluge d'estoc sur son adversaires et frappe trois fois	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire	Parade/Esquive classique pour chaque frappe	Lancier	Expert	R: /<br/>E: /	2	2
189	Coup étourdissant	Le moine frappe son adversaire au visage pour l'étourdir	\N	La cible est étourdie	\N	Action complexe :<br/>Jet d'Atq à -10	VIG pour résister	Moine	Apprenti	R: /<br/>E: /	1	2
190	Enchaînement	Le moine enchaîne les coups et frappe deux fois avec son bâton	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique<br/>2ème coup : Jet d'Atq à -10	Parade/Esquive classique pour chaque frappe	Moine	Adepte	R: /<br/>E: /	2	2
191	Enchaînement supérieur	Le moine délivre un déluge de coups sur son adversaires et frappe trois fois avec son bâton	\N	Autant de jets que d'attaques réussies	\N	Action complexe :<br/>1er coup : Attaque classique, malus de -10 par attaque supplémentaire	Parade/Esquive classique pour chaque frappe	Moine	Expert	R: /<br/>E: /	3	2
192	Harcelement	Le tirailleur harcèle ses adversaires avec trois tirs consécutifs	\N	Dégâts normaux	\N	Action complexe :<br/>Tir classique pour le premier, les tirs suivants subissent un malus de -10 par tir consécutif		Tirailleur	Adepte	R: /<br/>E: /	2	2
193	Tir précis	L'archer prend son temps pour viser sa cible	\N	Dégâts normaux	\N	Action complexe :<br/>Tir à +15		Archer	Apprenti	R: /<br/>E: /	1	2
194	Tir déstabilisant	L'archer prépare un tir particulièrement puissant pour faire chuter sa cible	Jet rupture pour l'arme à +1	La cible est à terre	\N	Action complexe :<br/>Tir classique	VIG pour ne pas tomber	Archer	Adepte	R: /<br/>E: /	2	2
195	Tir précis	Le fusilier prend son temps pour viser sa cible	\N	Dégâts normaux	\N	Action complexe :<br/>Tir à +15		Fusilier	Apprenti	R: /<br/>E: /	1	2
196	Tir déstabilisant	Le fusilier prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible	2 doses de poudres au lieu d'une	La cible est à terre	\N	Action complexe :<br/>Tir classique	VIG pour ne pas tomber	Fusilier	Adepte	R: /<br/>E: /	2	2
197	Tir précis	Le lanceur prend son temps pour viser sa cible	\N	Dégâts normaux	\N	Action complexe :<br/>Tir à +10		Lanceur	Apprenti	R: /<br/>E: /	1	2
198	Tir déstabilisant	Le lanceur prépare un tir particulièrement puissant en ajoutant une dose de poudre pour faire chuter sa cible	-	La cible est à terre	\N	Action complexe :<br/>Tir classique	VIG pour ne pas tomber	Lanceur	Adepte	R: /<br/>E: /	2	2
199	Réception de charge	Le lancier se prépare à infliger une attaque d'opportunité à quiconque pénètre sa zone de contrôle	\N	Le lancier peut porter une attaque d'opportunité (avec un bonus de 10 à l'Atq) supplémentaire sur un adversaire pénétrant sa zone de contrôle.	\N	Action de mouvement :<br/>Aucune épreuve pour se préparer		Lancier	Novice	R: /<br/>E: /	0	2
200	Frappe lourde	Le martelier envoie son adversaire au sol en le frappant avec un force surhumaine	FOR du martelier supérieure à celle de sa cible	Dégâts x1,5, cible mise au sol et envoyée à 1m + 1m par 10 points de marge de réussite.	\N	Action complexe<br/>Atq à -10	VIG pour résister à la mise au sol	Martelier	Apprenti	R: /<br/>E: /	1	2
201	Destruction	Le martelier tente de briser l'équipement de son adversaire avec son arme	Rupture du martelier supérieure à l'adversaire	L'équipement ciblé est endommagé (arme: Atq et Prd -10, Dgt -2; armure : PR -2)	\N	Action simple :<br/>FOR	AGI pour l'armure ou DEX pour l'arme suivi d'un test de rupture	Martelier	Adepte	R: L'équipement ciblé est détruit<br/>E: /	2	2
202	Tir précis	Le pistolier prend son temps pour viser sa cible	\N	Dégâts normaux	\N	Action complexe :<br/>Tir à +15		Pistolier	Apprenti	R: /<br/>E: /	1	2
203	Tir déstabilisant	Le pistolier prépare un tir particulièrement puissant avec une charge de poudre supplémentaire pour faire chuter sa cible	2 doses de poudre au lieu d'une	La cible est à terre	\N	Action complexe :<br/>Tir classique	VIG pour ne pas tomber	Pistolier	Adepte	R: /<br/>E: /	2	2
204	Tir rapide	Le pistolier effectue un tir rapide à la hanche	\N	Dégâts normaux	\N	Action bonus :<br/>Tir à -10		Pistolier	Expert	R: /<br/>E: /	3	2
205	Tir précis	Le tirailleur prend son temps pour viser sa cible	\N	Dégâts normaux	\N	Action complexe :<br/>Tir à +15		Tirailleur	Apprenti	R: /<br/>E: /	1	2
206	Frappe de précision	Le héros vise un point faible de l'armure	\N	Ignore 2 PR supplémentaire	\N	Action simple :<br/>Atq - 10	Parade/Esquive classique	Coup précis	Apprenti	R: Dégâts + 4<br/>E: /	1	3
207	Coup de bouclier	Le héros utilise son bouclier pour étourdir son adversaire en le frappant à la tête	\N	Atq et Prd de la cible -10 (3 rounds)	\N	Action bonus<br/>Atq du bouclier	AGI pour esquiver puis VIG pour résister à l'étourdissement	Défenseur	Apprenti	R: Cible passe son prochain tour<br/>E: /	1	3
\.


--
-- Data for Name: combat_art_weapon_category; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.combat_art_weapon_category (combat_art_id, weapon_category_id) FROM stdin;
\.


--
-- Data for Name: damage_type; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.damage_type (id, type, description, effect) FROM stdin;
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20260716215350	2026-07-16 21:54:34	101
DoctrineMigrations\\Version20260723120000	2026-07-24 10:41:26	38
DoctrineMigrations\\Version20260723120100	2026-07-24 10:44:28	67
DoctrineMigrations\\Version20260724000000	2026-07-24 10:46:47	32
DoctrineMigrations\\Version20260724010000	2026-07-24 13:45:47	43
DoctrineMigrations\\Version20260724020000	2026-07-24 13:47:40	44
DoctrineMigrations\\Version20260724030000	2026-07-24 13:53:39	40
DoctrineMigrations\\Version20260724040000	2026-07-26 11:19:47	38
DoctrineMigrations\\Version20260804000000	2026-08-04 17:36:45	35
\.


--
-- Data for Name: glossary_condition; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.glossary_condition (id, condition, description, effect) FROM stdin;
22	À Terre	<p>Le personnage se trouve étendu sur le sol. Sa vitesse est divisée par 2. Certaines actions comme tirer à l'arc sont impossibles ou se font avec une grande difficulté lorsque l'on est allongé sur le sol.</p>\n<p>Se coucher au sol ne coûte rien mais se relever coûte la moitié de la vitesse du personnage et provoque une attaque d'opportunité.</p>\n<p>Cibler une créature à terre se fait avec 2 désavantages.</p>\n	
23	Assourdi	<p>L'entité perd l'usage de l'ouïe et subit les malus suivants :</p>\n<ul>\n<li>L'entité n'entend plus rien</li>\n<li>3 désavantages aux épreuves bénéficiant de l'ouïe</li>\n<li>Rate automatiquement toutes les épreuves se basant uniquement sur l'ouïe</li>\n</ul>\n	
24	Aveuglé	<p>L'entité perd l'usage de la vision et subit les malus suivants :</p>\n<ul>\n<li>L'entité ne voit plus rien</li>\n<li>3 désavantages aux épreuves bénéficiant de la vision</li>\n<li>Rate automatiquement toutes les épreuves se basant uniquement sur la vision</li>\n</ul>\n	
25	Brûlure(X)	<p>L'entité est en feu, l'intensité des flammes est déterminé par un nombre X. Une entité souffrant de l'état brûlure :</p>\n<ul>\n<li>subit X points de dégâts de feu sur la partie de son corps en train de brûler. Cette quantité de dégâts augmente de 1 par round. Si le personnage subit deux sources de brûlure en même temps, les deux X se cumulent. </li>\n<li>doit passer un test de Volonté DCX pour entreprendre une action autre que tenter d'éteindre le feu.</li>\n<li>peut tenter d'éteindre les flammes en se roulant au sol. Cela consomme votre mouvement pour ce tour et nécessite de passer un test d'Agilité DCX. L'entité passe <a href='Glossaire.xhtml#a_terre'>à terre</a> et perds l'état brûlure si le test est une réussite.</li>\n</ul>\n	
26	Caché	<p>Le personnage est dissimulé dans son environnement et échappe à la vue de ses ennemis. Le personnage doit dépenser le double de mouvement pour se déplacer en restant caché. Les cibles qui subissent une attaque d'une entité cachée ne peuvent se défendre mais l'entité perd alors son état caché.</p>\n<p>Si le personnage entre dans la ligne de vue d'une entité, il doit passer un test de Furtivité(Agilité) opposé à un test d'Observation(Perception) de l'entité. S'il réussit, il reste caché sinon il perd cet état.</p>\n	
27	Confus	<p>Le personnage a du mal à coordonner ses mouvements et ne peut faire qu'une action ou un déplacement lors de son tour.</p>\n	
28	Effrayé(Source)	<p>Une créature effrayée fait tout pour s'éloigner de la source de sa peur. Si la créature voit la source de sa peur et que son action n'est pas de s'en éloigner, elle effectue cette action avec 3 désavantages.</p>\n	
29	Empoisonnement(X)	<p>La créature est affectée par une toxine nocive et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude de l'Empoisonnement diminue de 1 à la fin du tour de l'entité.</p>\n<p>Une créature empoisonnée effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l'amplitude de l'empoisonnement.</p>\n<p>Il est possible de réduire la magnitude de l'Empoisonnement en passant un test de Medicine DC X, en cas de réussite, la magnitude de l'Empoisonnement est réduite du DR de ce jet. Lorsque deux sources infligent un empoisonnement, appliquez seulement celui ayant la plus grande magnitude.</p>\n	
30	Entravé	<p>Une entité entravée est limitée dans ses mouvements par des liens. Elle se déplace à la moitié de sa vitesse et effectue toute épreuve physique avec deux désavantages.</p>\n	
31	Étourdi	<p>Un personnage étourdi laisse tomber ce qu'il avait en main, ne peut intenter aucune action et se défend avec 2 désavantages durant toute cette période.</p>\n	
32	Fasciné	<p>Une créature est fascinée par un sort ou un effet surnaturel. Tant que l'effet persiste, une créature fascinée reste assise ou debout, dans l'incapacité d'effectuer d'autre action que se concentrer sur l'effet en question. Elle subit 2 désavantages sur tous les jets. L'arrivée d'une menace potentielle (comme une créature hostile) donne droit à un nouveau jet pour contrer l'effet de fascination. Toute menace évidente, comme dégainer une arme, lancer un sort ou tirer sur la créature, rompt immédiatement l'effet de fascination. En dépensant sa réaction, il est possible de secouer une créature fascinée pour lui faire reprendre ses esprits.</p>\n	
33	Immobilisé	<p>Une créature immobilisée ne peut plus se déplacer. Elle peut effectuer toute action n'incluant pas de déplacement.</p>\n	
34	Inconscient	<p>Un personnage inconscient est incapable de faire quoi que ce soit et s'effondre à terre sauf s'il est maintenu dans une autre position.</p>\n	
35	Invisible	<p>Les créatures invisibles ne peuvent être vues. Les personnages ratent automatiquement les jets pour les détecter basés sur la vision. Attaquer une entité invisible se fait avec 3 désavantages, et ce, même si on sait à peu près ou elle se trouve.</p>\n	
36	Maîtrisé / Paralysé	<p>Un personnage maîtrisé est retenu par une créature, un piège ou un effet. Il ne peut ni bouger ni attaquer ni se défendre.</p>\n	
37	Mort	<p>Le personnage était mourant et n'est pas parvenu à se stabiliser. La psyché du personnage quitte son enveloppe corporelle. On ne peut plus soigner un personnage mort que ce soit par des moyens ordinaires ou magiques, mais il peut être ramené à la vie par magie. Un corps sans vie se décompose normalement si on ne le préserve pas.</p>\n	
38	Mourant	<p>Le personnage est inconscient et en train de mourir. Une entité mourante ne peut pas entreprendre la moindre action et doit passer un test de Vigueur DC 1 par minute ou à chaque fois qu'elle subit des dégâts, après 3 échecs l'entité meurt. Après 3 réussites l'intervalle entre chaque jet passe à une heure, après 3 autres réussites, l'entité devient stable et n'est plus mourante.</p>\n<p>Un personnage mourant peut être stabilisé par l'intervention d'une personne extérieure.</p>\n	
39	Ralenti	<p>Une créature ralentie se déplace à la moitié de sa vitesse.</p>\n	
40	Saignement(X)	<p>La créature saigne abondamment et doit passer un test de Vigueur DC X au début de chacun de ses tours, si elle échoue, elle subit une blessure. La magnitude du Saignement diminue de 1 à la fin du tour de l'entité.</p>\n<p>Une créature qui saigne effectue tous ses tests avec un nombre de désavantages équivalent à la moitié de l'amplitude du saignement.</p>\n<p>Il est possible de réduire la magnitude du Saignement en passant un test de Medicine DC X, en cas de réussite, la magnitude du Saignement est réduite du DR de ce jet. Lorsque deux sources infligent un saignement, appliquez seulement celui ayant la plus grande magnitude.</p>\n	
41	Stable	<p>Le personnage a été stabilisé, il n'est plus mourant mais reste inconscient. Un personnage stable redevient conscient après 2d6 - la moitié du dé de Vigueur/Volonté du personnage.</p>\n	
42	Surpris	<p>Prise de court, cette entité ne peut effectuer qu'un mouvement ou une action et ne peut pas entreprendre de <a href='Combat.php#reactions'>réactions</a>.</p>\n	
\.


--
-- Data for Name: glossary_trait; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.glossary_trait (id, trait, description, effect) FROM stdin;
28	Absorption magique(X)	<p>Cette entité peut absorber la psy d'un sort dont elle est la cible. Si cette entité vient à être touchée par un sort lancez un d10, si le résultat est inférieur ou égale à X le sort n'aucun effet sur la créature et elle récupère d'un trauma.</p>\n	
29	Amphibien	<p>Cette entité se déplace à vitesse normale dans l'eau, n'est pas limité par sa compétence d'Athlétisme et inflige des dégâts normaux lorsqu'elle se bat dans l'eau.</p>\n	
30	Arme naturelle(Z, X)	<p>Une partie du corps Z de cette entité peut être utilisé comme une arme infligeant X dégâts. L'entité ne perd l'usage de cette arme que si elle perd cette partie de son corps.</p>\n	
31	Artificiel	<p>Cette entité n'est pas vivante mais animé par d'autres moyens. Elle n'a besoin ni de respirer, ni d'organes fonctionnels. Elle est immunisée aux effets tels que les maladies, les poisons, les blessures, le vieillissement, le sommeil et la fatigue.</p>\n	
32	Débilitant(X)	<p>Cette entité peut empoisonnée sa cible si elle inflige une perte de vitalité avec ses armes naturelles. L'entité touchée doit passer un test de Résistance(Vig) DCX, si elle échoue, elle contracte un <a href='Glossaire.xhtml#empoisonnement'>Empoisonnement</a> d'une amplitude équivalente à son DR négatif.</p>\n	
33	Endommagé(X)	<p>Cet objet est abîmé et tous les tests dans lesquels il est utilisé se font avec un malus de X désavantages. Si cet objet est une arme, elle inflige 1 point de dégâts en moins, si c'est une armure, sa PR diminue de 1.</p>\n<p>Un objet endommagé peut être réparé pour un coût équivalent à X*10% du prix de base de l'objet. Si la magnitude de l'endommagement dépasse 3, cet objet est détruit.</p>\n	
34	Estomac solide	<p>Cette entité possède un estomac particulièrement tolérant vis-à-vis des aliments ingérés. Cette entité peut consommer de la viande crue et de l'eau non purifiée sans craindre les maladies.</p>\n	
35	Éthérée	<p>Cette entité est immatérielle, capable de passer au travers des objets et d'apparence translucide. Elle obtient le trait Volant(Vitesse) et peuvent se déplacer librement dans l'espace même à travers des objets solides. Elles peuvent être ciblées par des attaques mais ne subissent des dommages que de la part d'armes en virgonium, de sorts, de pouvoirs magiques et d'effets surnaturels.</p>\n<p>Les entités éthérées ne peuvent normalement pas interagir avec le monde matériel mais peuvent utiliser la magie et des attaques capables d'infliger des dégâts aux êtres vivants. Ces attaques ignorent la PR des armures ne possédant pas un revêtement en virgonium et ne peuvent être bloqués ou parés par des boucliers et des armes sans ce même revêtement.</p>\n	
36	Extraplanaire(Z)	<p>Cette entité provient d'un autre plan d'existence noté Z. Si elle meurt, est détruite ou bannie, elle retourne dans son plan d'origine.</p>\n	
37	Grimpeur(X)	<p>Cette entité peut escalader n'importe quel paroi qu'importe son inclinaison à une vitesse de X mètres par tour.</p>\n	
38	Immortel	<p>Cette entité ne subit pas les effets du vieillissement et peut vivre éternellement en bonne santé.</p>\n	
39	Immunité(X)	<p>Cette entité est immunisé à un type de dégâts X, tous les dégâts subis par cet élément sont nullifiés. L'entité réussit automatiquement tous les jets visant à résister à un effet provoqué par cet élément.</p>\n	
40	Inflexible(X)	<p>Cette entité est naturellement résistante à la magie, sa résistance magique augmente de X.</p>\n	
41	Lien(Source)	<p>Cette entité est liée par magie à son monde ou à quelqu'un.</p>\n<p>Elle doit obéir aux ordres de son maître sauf s'il s'agit de sa défense personnelle. Elles ne pèsent pratiquement rien et l'on considère leur encombrement comme nul (ENC0).</p>\n	
42	Photosensibilité(X)	<p>Cette entité ne supporte pas la lumière, que ce soit celle du Soleil ou de Safi. En plus de posséder une Vulnérabilité(lumière, X), cette entité doit passer un test de Vigueur DC X par heure d'exposition à la lumière du soleil, chaque heure consécutive augmente le DC de 1. Les nuages et autres évènements météorologiques du même genre divise par deux le DC.</p>\n	
43	Rampant	<p>Cette créature se déplace en rampant plutôt qu'en marchant. Elle n'est pas ralentie pas les terrains difficiles tels que les hautes herbes et les terrains mous (boue, sable humide).</p>\n	
44	Régénération(X)	<p>Cette entité cicatrise à une vitesse incroyable, à chaque début de round, elle lance un d10, si le résultat est inférieur ou égal à X, la créature récupère d'une blessure.</p>\n	
45	Résistance(Z, X)	<p>Cette entité est résistante à un type de dégâts, ce qui signifie qu'elle subira des dommages réduits face à ce genre de dégâts. On note ainsi la résistance d'une créature : Résistance(Z, X) où Z est l'élément infligeant X points de dégâts en moins si la créature est touchée par cet élément.</p>\n<p>Ce trait accorde Z avantages aux tests réalisés pour résister à un effet de l'élément X.</p>\n<p>Le trait Résistance s'applique après toutes les autres sources de réductions de dégâts.</p>\n	
46	Robuste(X)	<p>Cette entité est naturellement résistante aux coups, sa résistance physique augmente de X.</p>\n	
47	Télékinésiste(X)	<p>Cette entité peut manipuler des objets situés à moins de 50 mètres par la pensée. Le gabarit des objets déplaçables de cette manière dépendent de la magnitude X : 1 pour des objets Minuscules et ainsi de suite jusqu'à 8 pour des objets Colossaux</p>\n<p>Cette entité peut utiliser des objets pour attaquer ses adversaires. Cette action compte comme une attaque à distance utilisant la compétence Domination(Volonté) pour le test d'attaque. Les objets utilisés de cette manière comptent comme des <a href='Armes.php#armes_improvisees'>armes improvisées</a>.</p>\n<p>Il est possible de déplacer des créatures sentientes via la télékinésie. Si la cible souhaite résister, elle doit passer un test de Force ou de Volonté avec un DC équivalent à la magnitude X.</p>\n	
48	Télépathe	<p>Cette entité peut communiquer des mots, des images ou même des sentiments par la pensée. Les entités recevant un message télépathique peuvent passer un test de Perception opposé à un test d'Intelligence pour localiser le télépathe à l'origine du message.</p>\n	
49	Vision dans le noir	<p>La vision dans le noir permet de voir en l'absence de source de lumière. Certaines créatures possèdent cette vision à cause de leurs sens développés spécialement pour une vie sans lumière, d'autre la possède par magie.</p>\n<p>La vision dans le noir se fait uniquement en noir et blanc (elle ne permet pas de distinguer les couleurs)</p>\n<p>La présence de lumière n'entrave pas la vision dans le noir.</p>\n	
50	Vision nocturne	<p>Les personnages dotés de vision nocturne ont une rétine tellement sensible que leur acuité visuelle exacerbée leur permet de voir plus distinctement que la normale dans des conditions de faible éclairage (clarté de la lune ou des étoiles, torche, etc.).</p>\n<p>La vision nocturne permet de voir en couleur.</p>\n<p>Une lumière vive et soudaine <a href='Glossaire.xhtml#aveugle'>aveugle</a> les créatures ayant recours à la vision nocturne pendant 2 rounds. </p>\n<p>En extérieur, les personnages pourvus de vision nocturne voient aussi bien à la clarté de la lune qu'en plein jour.</p>\n	
51	Vision thermique	<p>La vision thermique permet de voir la chaleur qui émane des êtres vivants et des corps chauds. De ce fait, il est possible de voir dans le noir le plus complet les entités dégageant de la chaleur.</p>\n<p>La vision thermique fait apparaître les zones chaudes en rouge vif, déclinant en orange, jaune, vert puis bleu à mesure que la température diminue. L'absence de chaleur ne produit aucune couleur.</p>\n	
52	Vision véritable	<p>La vision véritable permet de voir des choses invisibles à l'œil nu. Ce type de vision n'est accessible que par magie et permet de voir la psy émaner des entités d'Ogma.</p>\n<p>La vision véritable fait percevoir le monde dans une teinte bleutée voire violacée et permet de voir dans le noir.</p>\n	
53	Volant(X)	<p>Cette entité peut se déplacer en volant. Elle possède une vitesse en vol de X mètres.</p>\n	
54	Vulnérabilité(Z, X)	<p>Cette entité est vulnérable à un type de dégâts, ce qui signifie qu'elle subira des dommages accrus face à ce genre de dégâts. On note ainsi la vulnérabilité d'une créature : Vulnérabilité(Z, X) où Z est l'élément infligeant X points de dégâts supplémentaires si la créature est touché par cet élément.</p>\n<p>Ce trait inflige Z désavantages aux tests réalisés pour résister à un effet de l'élément X.</p>\n<p>Le trait Vulnérabilité s'applique après toutes les autres sources de réduction de dégâts.</p>\n	
\.


--
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.item (id, category_id, item, description, price, enc) FROM stdin;
60	14	Boite d'allume-feu (D)	Silex, amorces et amadou, tout ce qu'il faut pour allumer un feu	5 pc	1
61	14	Gamelle	Assiette creuse accompagnée de couverts, peut également servir de casserole	2 pc	1
62	14	Rations (D)	Aliments appropriés pour un long voyage : viande séchée, fruits secs, biscuit,...	5 pc	1
63	14	Tente	Légère et pliable, elle permet à deux personnes de gabarit Moyen de dormir à l'abri des intempéries	10 pa	2
64	14	Sac de couchage	Bien enroulé et très chaud, il s'attache facilement sur un sac à dos et permet de passer sa nuit sans grelotter	1 pa	1
65	14	Couverture	Peut également servir de tapis de sol, elle tient moins chaud qu'un sac de couchage mais reste indispensable pour un sommeil de qualité	5 pc	1
66	15	Baril (D)	Petit tonneau pouvant stocker tout et n'importe quoi.	3 pa	2
67	15	Poire à poudre (D)	Conteneur métallique préservant la poudre à canon de l'humidité	5 pa	1
68	15	Fiole vide (D)	Petit récipient en verre d'une contenance de 100mL	1 pa	0
69	15	Flasque vide (D)	Récipient en verre d'une contenance d'un litre	2 pa	1
70	15	Carquois (D)	Étui en cuir protégeant les munitions à l'intérieur	3 pa	1
71	16	Chaîne (3 m)	Lourde chaîne de métal devant subir 25 dégâts avant de se briser	35 pa	2
72	16	Corde (15 m)	Longue corde en chanvre devant subir 5 dégâts avant de se briser	1 pa	1
73	17	Échelle de corde (5 m)	Pliable, elle s'attache facilement sur un sac et permet de créer un passage facile sur un mur	5 pc	2
74	17	Équipement d'escalade	Crampons et piolets, accorde 3 avantages pour les épreuves d'escalade	25 pa	2
75	17	Grappin	Permet de sécuriser une corde sans avoir à faire de noeuds, utile lorsque l'on souhaite escalader une falaise	5 pa	1
76	17	Palan	Système de poulies permettant de monter/descendre de lourdes charges	3 pa	1
77	18	Bougie (D)	Faite de cire, cette bougie éclaire une petite zone pendant 2 heures	1 pc	1
78	18	Lampe	Faite de métal, cette lampe éclaire une zone modeste et consomme une flasque d'huile toute les 8 heure	5 pa	1
79	18	Lanterne	Faite de métal, cette lanterne éclaire une grande zone, un système de miroir peut être utilisé pour créer un grand cone de lumière, elle consomme une flasque d'huile toute les 4 heure	10 pa	1
80	18	Torche (D)	Morceau de bois imbibé d'huile, elle éclaire une zone moyenne pendant 1 heure	1 pc	1
81	19	Craie (D)	Permet d'écrire sur presque toutes les surfaces mais s'efface avec l'eau	1 pc	0
82	19	Grimoire	Imposant ouvrage relié de cuir	20 pa	1
83	19	Livre	Petit ouvrage relié de cuir	15 pa	1
84	19	Papier (D)	Permet de noter des informations quelconques	1 pc	0
85	19	Parchemin (D)	Permet de créer des cartes ou des parchemins magiques	2 pc	0
86	19	Plume d'écriture	Permet d'écrire sur du papier ou du parchemin	2 pc	0
87	19	Encre	À stockée dans une fiole, à combiner avec une plume d'écriture	10 pa	0
88	20	Poudre à canon (baril)	Stocké dans un baril, cette poudre est parfois utilisée pour creuser rapidement des galeries	10 pa	0
89	20	Poudre à canon (poire)	Stockée dans une poire, permet de recharger une arme à feu	3 pa	0
90	21	Parfum	Stocké dans une fiole, peut cacher certaines odeurs, très apprécié dans les évènements mondains	5 pa	0
91	21	Huile	Stockée dans une flasque, très inflammable, sert de combustible à lanterne	5 pc	0
92	22	Bélier portatif	Morceau de bois renforcé de métal, permet d'enfoncer les portes avec 5 avantages	15 pa	2
93	22	Crochets (D)	Permet de crocheter des serrures verrouillées, se casse en cas d'échec du test	1 po	0
94	22	Marteau	Possède un côté plat pour marteler et un arrache-clou de l'autre côté, utile dans toute sorte de situation	2 pa	1
95	22	Pelle	Très utile dès qu'on veut creuser la terre	5 pa	2
96	22	Pied-de-biche	Permet d'ouvrir par la force les contenants scellés, accorde 2 avantages aux épreuves de Force où il est possible de faire levier	10 pa	2
97	22	Pioche	Très utile dès qu'on veut creuser la pierre	5 pa	3
98	23	Longue-vue	Permet de voir 5 fois plus loin qu'à l'oeil nu	5 po	1
99	23	Loupe	Permet de grossir 5 fois un objet proche ou d'allumer un feu s'il y a du soleil	2 po	0
100	24	Balance de marchand	Plateaux et arrangements de poids, permet de déterminer le poids exact d'objets inférieur à 1 kg	25 pa	1
101	24	Boulier	Cadre de bois remplis de tiges serties de boules servant à compter rapidement de grand nombre.	2 pa	1
102	25	Billes (D)	Petites billes recouvrant une zone de 5m x 5m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d'Agilité ou tomber à terre	10 pa	1
103	25	Chausse-trappes (D)	Petits picots métalliques présentant toujours une pointe vers le haut recouvrant une zone de 2m x 2m une fois déversées sur le sol, les entités traversant cette zone doivent passer un test d'Agilité DC 8 (DC 5 si on se déplace à la moitié de sa vitesse), sur un échec on subit une blessure. Tant qu'elles n'ont pas récupéré de cette blessure elles conservent cette pénalité de vitesse.	5 pa	1
104	25	Piège à mâchoires	Anneau d'acier en dents de scie s'activant via une plaque de pression et possédant une chaîne d'un mètre, une entité activant le piège subit 2d8 dégâts perforants et écrasants et voit sa vitesse divisée par 4 si elle subit une blessure. Tant qu'elle n'a pas récupéré de cette blessure elle conserve cette pénalité de vitesse. Elle peut se libérer en passant un test d'Athlétisme(Force) DC10 avec 2 désavantages.	25 pa	2
105	25	Pointes en fer (D)	Bâtons métalliques de 20cm possédant une tête plate et une pointe, utile dans toute sorte de situations	1 pa	1
106	26	Cadenas	Solide cadenas métallique, nécessite au moins 10 DR sur un test étendu de crochetage	35 pa	0
107	26	Chevalière	Bague possédant un relief, permet d'apposer un sceau à la cire	20 pa	0
108	26	Cire à cacheter (D)	Petit bâton de cire à faire fondre pour cacheter des documents importants	5 pc	0
109	26	Cloche	Cloche à main résonnant bruyamment quand secouée	1 pa	1
110	26	Matériel de pêche	Canne, lignes, hameçons et leurres, permet de pêcher n'importe où. Sur un test étendu de Survie(Dex) DC 5, vous lancez un dé par heure, à la fin du test, diviser le DR total par 2, c'est le nombre de rations de poisson que vous obtenez.	1 pa	2
111	26	Menottes	Solides attaches métalliques devant subir 10 dégâts avant de se briser, pouvant entraver une créature de Gabarit Moyen ou Petit.	25 pa	1
112	26	Miroir en acier	Petit miroir fort utile pour se recoiffer ou voir sans être vu depuis un mur en angle	15 pa	1
113	26	Perche (3 m)	Longue perche de bois possédant de nombreuses applications	5 pc	2
114	26	Pierre à aiguiser	Petite pierre faite pour affiner le fil d'une lame	3 pc	0
115	26	Sablier / Clepsydre	Petit contenant en verre contenant du sable / de l'eau mettant un temps déterminé à s'écouler	25 pa	0
116	26	Savon (D)	Petit cube de savon possédant de nombreuses applications	5 pc	0
117	26	Sifflet / Appeau	Petit sifflet émettant du bruit dans une zone donnée. Certains imitent le cri d'un animal.	5 pc	0
118	26	Trousse de soins (D)	Bandages, aiguille et fil de suture, tout le nécessaire pour panser des plaies. Permet de stabiliser une créature mourante sur un test de Médecine(Int ou Dex) DC 4. La créature mourante passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR de l'utilisateur de la trousse médicale. Sur une réussite, la créature n'est plus mourante et devient stable.	25 pa	1
\.


--
-- Data for Name: item_category; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.item_category (id, category, description) FROM stdin;
14	Campement	\N
15	Contenants	\N
16	Cordes et chaînes	\N
17	Déplacement	\N
18	Éclairage	\N
19	Écrits	\N
20	Explosifs	\N
21	Liquides	\N
22	Outils	\N
23	Optique	\N
24	Outils de marchand	\N
25	Pièges	\N
26	Autres	\N
\.


--
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.material (id, material, description, weapon_bonus_dmg, weapon_passive_effect, weapon_active_effect, armor_bonus_protection, armor_bonus_proctection_magical, armor_passive_effect, armor_active_effect, weapon_price_multiplier, armor_price_multiplier) FROM stdin;
31	Peau	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
32	Cuir	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
33	Alkite	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
34	Kusni	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
35	Gnistar	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
36	Chitine	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
37	Os	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
38	Nilaroy	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
39	Adamantine	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
40	Lakma	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
41	Fer	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
42	Acier	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
43	Shoren	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
44	Orichalque	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
45	Skymma	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
\.


--
-- Data for Name: skill; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.skill (id, skill, description, main_carac, specialisation_example, test_example) FROM stdin;
\.


--
-- Data for Name: sort; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.sort (id, effet, propriete, ecole, dc, magnitude, description, inkarnai) FROM stdin;
1	Aspect animal	\N	Altération	4+2X	Formula 1+1X	La cible se métamorphose en un animal (catégorie bête ou vermine) Menace [Mag]	Kynigi
2	Aisance aquatique	\N	Altération	3+2X	Time une heure	La cible obtient le trait Amphibien et peut respirer sous l'eau pendant [Mag].	Nero
3	Marche aquatique	\N	Altération	2+2X	Time une heure	La cible peut marcher sur l'eau comme si elle marchait sur la terre ferme pendant [Mag].	Nero
4	Chute ralentie	Réaction	Altération	3+2X	Double 5	La cible ignore les [Mag] premiers mètres de sa prochaine chute lors du calcul des dégâts.	Aïgida
5	Lévitation	Concentration, Réaction	Altération	6+2X	Double 3	La cible obtient une vitesse de déplacement en vol de [Mag] mètres par round.	Aïgida
6	Saut	\N	Altération	2+2X	Double 1	La cible pourra parcourir [Mag] mètre(s)s supplémentaire(s) en hauteur et le double en longueur lors de son prochain saut dans la minute qui suit l'incantation du sort.	Aïgida
7	Verrouillage	\N	Altération	3+3X	Double 5	La serrure ciblé devient verrouillée. Ouvrir cette serrure nécessite un test étendu de crochetage avec un DR total de [Mag].	Ourgal
8	Déverrouillage	\N	Altération	3+3X	Double 5	La serrure ciblé ajoute [Mag] DR au total nécessaire à la déverrouiller.	Ourgal
9	Transmutation	\N	Altération	10+1X	Dice_nb 2d4	Le lanceur lance [Mag] et en fait le total, si le résultat dépasse la résistance magique de la cible, elle devient métallique ou minérale.	Ourgal
10	Renforcement [Caractéristique]	[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]	Altération	4+3X	Formula 1+1X	La cible voit sa [Caractéristique] augmenter de [Mag] cran(s) pendant une minute.	Agones, Eftis, Orizo, Kynigi, Psema
11	Affaiblissement [Caractéristique]	[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]	Altération	4+3X	Formula 1+1X	La [Caractéristique] de la cible diminue de [Mag] crans pendant une minute.	Agones, Eftis, Orizo, Kynigi, Psema
12	Résistance [Élément]	[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]	Altération	3+2X	Formula 1+1X	Procure à la cible le trait Résistance([Mag],[élément]).	Aïgida, Anathos, Horoï, Kuga, Nero, Safi
13	Vulnérabilité [Élément]	Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]	Altération	3+2X	Formula 1+1X	La cible subit le trait Vulnérabilité([Mag],[élément]).	Aïgida, Anathos, Horoï, Kuga, Nero, Safi
14	Guérison	\N	Altération	4	-	La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d'une blessure.	Agapi
15	Stabilisation	\N	Altération	4	-	La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n'est plus mourante et devient stable.	Agapi
16	Récupération	\N	Altération	2	-	La cible passe un test de Vigueur pour les traumas Physiques ou de Volonté pour les traumas Mentaux avec un DC équivalent au triple de ses traumas. Sur une réussite, la cible guérie d'un trauma.	Agapi
17	Purge	Concentration	Altération	3+2X	AD +1	La cible obtient [Mag] avantages pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.	Agapi
18	Invisibilité	Concentration	Altération	8	-	La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.	Safi
19	Armure	[Physique, Magique]	Conjuration	4+3X	Formula 1+1X	La résistance [type] de la cible augmente de [Mag].	Pravoï
20	Protection	Réaction	Conjuration	3+3X	Double 2	Réduis les dégâts subis par la cible de [Mag] pour une instance de dégâts dans la minute qui suit l'incantation du sort.	Pravoï
21	Entrave	Concentration	Conjuration	4+2X	AD -0	La cible est immobilisée. Pour se libérer, la cible peut effectuer chaque round un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort.	Pravoï
22	Toile d'araignée	\N	Conjuration	3+3X	Double 2	L'endroit ciblé par le lanceur diminue la vitesse des entité le traversant de [Mag].	Kynigi
23	Invocation de Karnarim élémentaire	[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]	Conjuration	6	-	Invoque un Karnarim de l'[élément] pendant une minute.	Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi
24	Invocation d'Arme	\N	Conjuration	6+2X	Dice_scale 1d4	Invoque une arme infligeant [Mag] dégâts magiques à l'endroit ciblé.	Agones
25	Projection psychique	Concentration	Conjuration	10	-	L'esprit de cible est envoyé dans un domaine de Karnaï.	Selon le domaine visité
26	Bannissement	\N	Conjuration	0	-	La cible est renvoyé dans sa dimension d'Origine.	Pravoï
27	Pas de l'ombre	\N	Conjuration	6+2X	Distance 10 mètres	La cible doit se tenir dans une ombre. Elle se téléporte dans une autre ombre située à moins de [Mag] de sa position.	Eftis
28	Téléportation	\N	Conjuration	8	Distance 10 mètres	La cible se téléporte sur une distance de [Mag] ou moins dans un éclair de lumière.	Safi
29	Racines du monde	\N	Conjuration	6	Distance 10 mètres	La cible se téléporte via les racines d'un arbre sur une distance de [Mag] ou moins.	Kormo
30	Assaut minéral	[Métal, Pierre, Terre, Sable]	Conjuration	2+2X	Dice_scale d2	La cible subit [Mag] dégâts physiques.	Kormo, Ourgal
31	Assaut élémentaire	[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]	Conjuration	2+2X	Dice_scale d2	La cible subit [Mag] dégâts d'[Élément].	Aïgida, Anathos, Horoï, Kuga, Nero, Safi
32	Réanimation	\N	Domination	6+2X	Gabarit P && Time une heure	La cible doit être une créature inanimé de gabarit [Mag] ou moins pendant [Mag]. La créature réanimé agit comme bon lui semble.	Anathos
33	Contrôle mental	Concentration	Domination	6	-	La cible passe sous le contrôle du lanceur.	Kynigi, Kormo, Psema
34	Réécriture mémorielle	\N	Domination	8	-	La dernière minute de mémoire de la cible est modifiée par le lanceur.	Psema
35	Mot de pouvoir : Douleur	Concentration	Domination	4+2X	Double 1 && AD -1	La cible voie sa vitesse diminuée de [Mag] et effectue toute action avec [Mag] désavantage(s).	Psema
36	Mot de pouvoir : Mort	\N	Domination	15	-	La cible meurt instantanément.	Anathos
37	Télékinésie	Concentration	Domination	2+2X	Formula 1+1X	La cible obtient le trait Télékinésiste([Mag]).	Agones
38	Peur	\N	Domination	5	1 minute	La cible est Effrayé(lanceur).	Agapi, Psema
39	Calme	\N	Domination	5	1 minute	La cible est fasciné.	Psema
40	Rage	\N	Domination	5	1 minute	La cible considère tout le monde comme un adversaire.	Agones
41	Silence	\N	Domination	5	1 minute	La cible est incapable de parler.	Psema
42	Apparence trompeuse	Concentration	Domination	6	-	La cible est perçue comme quelqu'un d'autre.	Psema
43	Télépathie	Concentration	Mysticisme	2	-	La cible obtient le trait Télépathe.	Orizo
44	Archives d'Orizo	\N	Mysticisme	2+2X	AD +1	Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec [Mag] avantage(s).	Orizo
45	Détection de la vie / des morts / de la magie	\N	Mysticisme	3+1X	Double 10	Détecte les être vivants / les morts / la magie dans un rayon de [Mag] mètres du point d'impact du sort.	Kynigi, Anathos, Orizo
46	Vision véritable	Concentration	Mysticisme	6	-	La cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.	Orizo
47	Destinée	\N	Mysticisme	6+2X	Dice_nb 2d6	Le lanceur peut ajouter/enlever le résultat d'un des dés lancés par ce sort pour modifier le résultat de n'importe quel test.	Tychi
48	Augure	\N	Mysticisme	5	-	La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).	Tychi
49	Prophétie	\N	Mysticisme	10	-	La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours.	Tychi
50	Communion avec la nature	\N	Mysticisme	6	-	La cible obtient trois informations sur son environnement.	Kormo et Kynigi
51	Localisation d'entité	Concentration	Mysticisme	4+2X	Distance 100 mètres	La cible connait la position de l'entité de son choix dans un rayon de [Mag].	Kynigi
52	Langue enchantée	Concentration	Mysticisme	4	-	La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.	Orizo
53	Lien sensoriel	Concentration	Mysticisme	6+2X	Distance 100 mètres	La cible peut voir/entendre/sentir à travers les sens d'une créature consentante dans un rayon de [Mag].	Kynigi
54	Création élémentaire	[Glace, Métal, Pierre, Sable, Terre]	Conjuration	2+2X	Double 10 && Time une minute	L'[élément] apparaît à l'endroit ciblé pendant [Mag]. La création doit subir [Mag] dégâts avant de se briser.	Kormo, Nero, Ourgal
55	Bourrasque	Concentration	Conjuration	2+2X	Double 10	Invoque du vent se déplaçant à [Mag] km/h à l'endroit ciblé.	Aïgida
56	Spores [type]	[Paralysie, Sommeil, Fascination, Confusion,...]	Conjuration	5	-	Invoque des spores infligeant l'effet [type].	Kormo
57	Contrôle de la température	Concentration	Conjuration	2+3X	Double 5	Augmente ou diminue la température ambiante de la cible de [Mag] C°.	Horoï
58	Lumière	\N	Conjuration	2+2X	Double 5 && Time une heure	Génère de la lumière vive sur [Mag] mètres et de la lumière faible sur [Mag]*2 mètres de façon circulaire pendant [Mag].	Safi
59	Création illusoire	\N	Conjuration	3+2	Gabarit TP && Time une minute	Façonne une création intangible de la forme souhaitée avec sons et odeurs de gabarit [Mag] ou moins pendant [Mag] minute.	Psema
\.


--
-- Data for Name: stance; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.stance (id, stance, description, effect) FROM stdin;
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public."user" (id, email, roles, password, username, is_verified) FROM stdin;
\.


--
-- Data for Name: weapon; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.weapon (id, category_id, type, damage_type, damage, handling, reach, enc, price) FROM stdin;
77	21	Dague	Perforants ou Tranchants	1d4	1M	Courte	1	20 pa
78	21	Dague de parade	Perforants	1d4	1M	Courte	1	25 pa
79	21	Épée Courte	Tranchants ou Perforants	1d6	1M	Moyenne	1	50 pa
80	21	Épée Courbe	Tranchants	1d6	1M	Moyenne	1	50 pa
81	21	Rapière	Perforants	1d6	1M	Moyenne	1	50 pa
82	21	Épée Longue	Tranchants ou Perforants	1d8	1M	Moyenne	2	75 pa
83	21	Grande épée	Tranchants ou Perforants	1d12	2M	Longue	3	100 pa
84	22	Hachette	Tranchant	1d4	1M	Courte	1	15 pa
85	22	Hache de guerre	Tranchant	1d8	1M	Moyenne	2	60 pa
86	22	Grande hache	Tranchant	1d12	2M	Longue	3	75 pa
87	23	Maillet	Écrasants	1d4	1M	Courte	1	15 pa
88	23	Masse	Écrasants	1d8	1M	Moyenne	1	50 pa
89	23	Grand marteau	Écrasants	1d12	2M	Longue	3	75 pa
90	24	Javelot	Perforants	1d4	1M	Longue	2	20 pa
91	24	Lance	Perforants	1d6	1M	Très Longue	2	25 pa
92	24	Pique	Perforants	1d10	2M	Extrême	3	25 pa
93	24	Hallebarde	Tranchants ou Perforants	1d10	2M	Très Longue	3	100 pa
94	24	Lance d'arçon	-	1d10	1M	Extrême	3	50 pa
95	25	Fouet	Tranchants	1d4	1M	Très Longue	1	10 pa
96	25	Bâton	Écrasants	1d4	1M	Longue	2	1 pa
97	25	Ceste	Écrasants	1d4	1M	Courte	1	5 pa
98	26	Fléchettes de lancer	Perforants	1d4	1M	15m	0	5 pa
99	26	Étoiles de lancer	Tranchants	1d4	1M	15m	0	5 pa
100	27	Arbalète lourde	Perforants	1d12	2M	200m	3	100 pa
101	27	Arbalète à main	Perforants	1d6	1M	50m	1	75 pa
102	27	Arbalète	Perforants	1d10	2M	150m	3	50 pa
103	27	Arc Long	Perforants	1d8	2M	150m	2	75 pa
104	27	Arc Court	Perforants	1d6	2M	100m	2	50 pa
105	28	Sarbacane	Perforants	1d4	1M	30m	1	1 pa
106	28	Fronde	Écrasants	1d4	1M	100m	1	5 pa
107	29	Pistolet de poche	Perforants et écrasants	1d6	1M	50m	1	100 pa
108	29	Pistolet à silex	Perforants et écrasants	1d8	1M	100m	1	100 pa
109	29	Pistolet à double canon	Perforants et écrasants	1d8	1M	100m	1	150 pa
110	29	Poivrière	Perforants et écrasants	1d8	1M	100m	1	300 pa
111	29	Pétoire	Perforants et écrasants	1d6	1M	15m	1	100 pa
112	30	Mousquet	Perforants et écrasants	1d12	2M	200m	3	150 pa
113	30	Mousquet à double canon	Perforants et écrasants	1d12	2M	200m	3	175 pa
114	30	Tromblon	Perforants et écrasants	1d8	2M	15m	3	150 pa
\.


--
-- Data for Name: weapon_category; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.weapon_category (id, category, description, effect) FROM stdin;
21	Lames	\N	\N
22	Haches	\N	\N
23	Masses et marteaux	\N	\N
24	Armes d'hast	\N	\N
25	Diverses	\N	\N
26	Armes de jet	\N	\N
27	Arcs et arbalètes	\N	\N
28	Armes à distance diverses	\N	\N
29	Armes de poing	\N	\N
30	Armes d'épaule	\N	\N
\.


--
-- Data for Name: weapon_property; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.weapon_property (id, property, description, effect, example) FROM stdin;
31	Dard	Cette arme est capable de trouver des failles dans l'armure de sa cible.	Les jets d'attaque avec un DR supérieur ou égal à 4 ignore l'armure de la cible.	
32	Lancer	Cette arme est suffisamment équilibrée pour être lancée.	 L'arme possède un cran de portée équivalent à X. Un lancer d'arme est traité comme une attaque à distance normale (mais la Force peut être utilisée pour le test de Style de Combat). Le dé de dégâts de l'arme augmente d'un <a href='Systeme.php#cran_des'>cran</a> si elle est lancée	
33	Petite	Relativement petite, facilement dissimulable, une arme de choix pour un roublard digne de ce nom	L'arme ne peut être utilisée pour parer les coups des armes maniées à deux mains. \nL'utilisateur peut passer un test de Roublardise opposé à l'Observation de l'adversaire pour dissimuler l'arme. \nCette arme n'est pas affectée par les malus dans les espaces clos. \nAttaquer avec une arme dissimulée procure 3 avantages lors d'une passe d'arme.	
34	Défensive	Étudiée pour protéger son manieur, cette arme facilite les manœuvres défensives	Lors d'une passe d'arme défensive, l'arme procure un avantage aux jets de Style de Combat.	
35	Duel	Cette arme est faite pour le duel.	 Les jets de Style de Combat se font avec un avantage en combat singulier, mais un désavantage en infériorité numérique.	
36	Impact	Les coups délivrés par cette arme peuvent envoyer valser leur cible	La cible est déplacée d'un mètre par tranche de 3 dégâts, déplacement forcé, directions possibles : gauche droite, arrière	
37	Peu maniable	\N	\N	\N
38	Brise-bouclier	Cette arme est très efficace contre les boucliers.	Les boucliers bloquant une attaque d'une arme possédant cette propriété voient leur RB divisée par 2 lors du blocage.	
39	Anti-Large	Cette arme est faite pour affronter des ennemis plus larges que soi.	Les jets d'attaques pour toucher les cibles d'un gabarit supérieur à celui de l'utilisateur se font avec 1 avantage.	
40	Sentinelle	L'arme est doté d'un pouvoir d'arrêt impressionnant	La cible d'une frappe voit sa vitese réduite d'un montant équivalent à la moitié des dégâts jusqu'au début du prochain tour de l'assaillant.	
41	Montée	Sur le dos d'une monture, cette arme s'avère remarquable	Cette arme n'est utilisable que depuis une monture pour des raisons de poids et de maniabilité.\nL'attaque se fait lors d'une charge.	
42	Perce-armure	\N	\N	\N
43	Rechargement	Cette arme doit être rechargée avant d'être utilisée	L'arme nécessite X action Interagir avant de pouvoir tirer à nouveau.	
44	Chargeur	Disposant d'un mécanisme avancé de chargement des munitions, cette arme peut tirer plusieurs fois sans être rechargée et il suffit de remplacer le chargeur pour que l'arme soit de nouveau complétement opérationnelle	L'arme peut tirer X fois sans être rechargée.<br/>Remplacer le chargeur coute Y action(s) Interagir, il n'est pas nécessaire qu'elles soient consécutives.<br>Si l'arme possède le trait Rechargement(Z), il est nécessaire d'effectuer Z action(s) Interagir après un tir avant de pouvoir tirer à nouveau.	
45	Zone	\N	\N	\N
\.


--
-- Data for Name: weapon_property_details; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.weapon_property_details (id, weapon_property_id, x, y, z) FROM stdin;
51	31	\N	\N	\N
52	32	10	\N	\N
53	33	\N	\N	\N
54	34	\N	\N	\N
55	35	\N	\N	\N
56	36	\N	\N	\N
57	37	\N	\N	\N
58	38	\N	\N	\N
59	32	20	\N	\N
60	39	\N	\N	\N
61	40	\N	\N	\N
62	41	\N	\N	\N
63	42	3	\N	\N
64	32	15	\N	\N
65	43	3 min 1	\N	\N
66	42	4	\N	\N
67	43	1 min 1	\N	\N
68	43	2 min 1	\N	\N
69	42	2	\N	\N
70	43	1	\N	\N
71	42	1	\N	\N
72	44	2	\N	\N
73	44	6	\N	\N
74	45	2	\N	\N
75	45	3	\N	\N
\.


--
-- Data for Name: weapon_property_weapon; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.weapon_property_weapon (weapon_id, weapon_property_details_id) FROM stdin;
77	51
77	52
77	53
78	51
78	54
78	53
79	51
80	55
81	55
83	56
83	57
84	52
84	53
85	58
85	57
86	58
86	56
86	57
87	52
87	53
88	57
89	58
89	57
89	56
90	59
91	60
91	61
92	60
92	61
92	57
93	60
93	61
94	62
94	57
94	63
95	53
97	53
98	64
98	53
99	64
99	53
100	65
100	57
100	66
101	67
102	68
102	57
102	69
103	70
103	57
107	68
107	57
107	71
107	53
108	68
108	57
108	69
109	72
109	68
109	57
109	69
110	73
110	68
110	57
110	69
111	65
111	57
111	71
111	74
112	65
112	57
112	66
113	72
113	65
113	57
113	66
114	65
114	57
114	69
114	75
\.


--
-- Data for Name: web_content; Type: TABLE DATA; Schema: public; Owner: www_data
--

COPY public.web_content (id, page, title, content, category) FROM stdin;
\.


--
-- Name: armor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.armor_id_seq', 45, true);


--
-- Name: changelog_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.changelog_id_seq', 1, false);


--
-- Name: combat_art_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.combat_art_id_seq', 207, true);


--
-- Name: damage_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.damage_type_id_seq', 1, false);


--
-- Name: glossary_condition_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.glossary_condition_id_seq', 42, true);


--
-- Name: glossary_trait_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.glossary_trait_id_seq', 54, true);


--
-- Name: item_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.item_category_id_seq', 26, true);


--
-- Name: item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.item_id_seq', 118, true);


--
-- Name: material_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.material_id_seq', 45, true);


--
-- Name: skill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.skill_id_seq', 1, false);


--
-- Name: sort_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.sort_id_seq', 59, true);


--
-- Name: stance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.stance_id_seq', 1, false);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.user_id_seq', 1, false);


--
-- Name: weapon_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.weapon_category_id_seq', 30, true);


--
-- Name: weapon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.weapon_id_seq', 114, true);


--
-- Name: weapon_property_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.weapon_property_details_id_seq', 75, true);


--
-- Name: weapon_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.weapon_property_id_seq', 45, true);


--
-- Name: web_content_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www_data
--

SELECT pg_catalog.setval('public.web_content_id_seq', 1, false);


--
-- Name: armor_material armor_material_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.armor_material
    ADD CONSTRAINT armor_material_pkey PRIMARY KEY (armor_material, armor_category);


--
-- Name: armor armor_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.armor
    ADD CONSTRAINT armor_pkey PRIMARY KEY (id);


--
-- Name: changelog changelog_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.changelog
    ADD CONSTRAINT changelog_pkey PRIMARY KEY (id);


--
-- Name: combat_art combat_art_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.combat_art
    ADD CONSTRAINT combat_art_pkey PRIMARY KEY (id);


--
-- Name: combat_art_weapon_category combat_art_weapon_category_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.combat_art_weapon_category
    ADD CONSTRAINT combat_art_weapon_category_pkey PRIMARY KEY (combat_art_id, weapon_category_id);


--
-- Name: damage_type damage_type_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.damage_type
    ADD CONSTRAINT damage_type_pkey PRIMARY KEY (id);


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: glossary_condition glossary_condition_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.glossary_condition
    ADD CONSTRAINT glossary_condition_pkey PRIMARY KEY (id);


--
-- Name: glossary_trait glossary_trait_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.glossary_trait
    ADD CONSTRAINT glossary_trait_pkey PRIMARY KEY (id);


--
-- Name: item_category item_category_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.item_category
    ADD CONSTRAINT item_category_pkey PRIMARY KEY (id);


--
-- Name: item item_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT item_pkey PRIMARY KEY (id);


--
-- Name: material material_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (id);


--
-- Name: skill skill_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.skill
    ADD CONSTRAINT skill_pkey PRIMARY KEY (id);


--
-- Name: sort sort_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.sort
    ADD CONSTRAINT sort_pkey PRIMARY KEY (id);


--
-- Name: stance stance_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.stance
    ADD CONSTRAINT stance_pkey PRIMARY KEY (id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: weapon_category weapon_category_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_category
    ADD CONSTRAINT weapon_category_pkey PRIMARY KEY (id);


--
-- Name: weapon weapon_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon
    ADD CONSTRAINT weapon_pkey PRIMARY KEY (id);


--
-- Name: weapon_property_details weapon_property_details_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_property_details
    ADD CONSTRAINT weapon_property_details_pkey PRIMARY KEY (id);


--
-- Name: weapon_property weapon_property_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_property
    ADD CONSTRAINT weapon_property_pkey PRIMARY KEY (id);


--
-- Name: weapon_property_weapon weapon_property_weapon_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_property_weapon
    ADD CONSTRAINT weapon_property_weapon_pkey PRIMARY KEY (weapon_id, weapon_property_details_id);


--
-- Name: web_content web_content_pkey; Type: CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.web_content
    ADD CONSTRAINT web_content_pkey PRIMARY KEY (id);


--
-- Name: idx_1f1b251e12469de2; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_1f1b251e12469de2 ON public.item USING btree (category_id);


--
-- Name: idx_29dba0b129dba0b1; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_29dba0b129dba0b1 ON public.armor_material USING btree (armor_material);


--
-- Name: idx_29dba0b15329cce5; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_29dba0b15329cce5 ON public.armor_material USING btree (armor_category);


--
-- Name: idx_5f20560795b82273; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_5f20560795b82273 ON public.weapon_property_weapon USING btree (weapon_id);


--
-- Name: idx_5f205607cf8aec93; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_5f205607cf8aec93 ON public.weapon_property_weapon USING btree (weapon_property_details_id);


--
-- Name: idx_6933a7e612469de2; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_6933a7e612469de2 ON public.weapon USING btree (category_id);


--
-- Name: idx_a51dca956c5a615; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_a51dca956c5a615 ON public.weapon_property_details USING btree (weapon_property_id);


--
-- Name: idx_b04be02023a1db73; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_b04be02023a1db73 ON public.combat_art_weapon_category USING btree (combat_art_id);


--
-- Name: idx_b04be0204011281b; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_b04be0204011281b ON public.combat_art_weapon_category USING btree (weapon_category_id);


--
-- Name: idx_combat_art_category_tier; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_combat_art_category_tier ON public.combat_art USING btree (category, tier, order_index);


--
-- Name: idx_sort_ecole; Type: INDEX; Schema: public; Owner: www_data
--

CREATE INDEX idx_sort_ecole ON public.sort USING btree (ecole);


--
-- Name: uniq_166a9e37140ab620; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_166a9e37140ab620 ON public.web_content USING btree (page);


--
-- Name: uniq_1f1b251e1f1b251e; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_1f1b251e1f1b251e ON public.item USING btree (item);


--
-- Name: uniq_3c3ccf3ebdd68843; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_3c3ccf3ebdd68843 ON public.glossary_condition USING btree (condition);


--
-- Name: uniq_533c1638cde5729; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_533c1638cde5729 ON public.damage_type USING btree (type);


--
-- Name: uniq_5e3de4775e3de477; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_5e3de4775e3de477 ON public.skill USING btree (skill);


--
-- Name: uniq_6933a7e68cde5729; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_6933a7e68cde5729 ON public.weapon USING btree (type);


--
-- Name: uniq_6a41d10a64c19c1; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_6a41d10a64c19c1 ON public.item_category USING btree (category);


--
-- Name: uniq_7758ab0864c19c1; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_7758ab0864c19c1 ON public.weapon_category USING btree (category);


--
-- Name: uniq_7cbe75957cbe7595; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_7cbe75957cbe7595 ON public.material USING btree (material);


--
-- Name: uniq_82fd433c82fd433c; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_82fd433c82fd433c ON public.stance USING btree (stance);


--
-- Name: uniq_8d93d649e7927c74; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_8d93d649e7927c74 ON public."user" USING btree (email);


--
-- Name: uniq_c8422601bf1cd3c3; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_c8422601bf1cd3c3 ON public.changelog USING btree (version);


--
-- Name: uniq_caf9008fa1041dd9; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_caf9008fa1041dd9 ON public.glossary_trait USING btree (trait);


--
-- Name: uniq_fae6ae178bf21cde; Type: INDEX; Schema: public; Owner: www_data
--

CREATE UNIQUE INDEX uniq_fae6ae178bf21cde ON public.weapon_property USING btree (property);


--
-- Name: item fk_1f1b251e12469de2; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT fk_1f1b251e12469de2 FOREIGN KEY (category_id) REFERENCES public.item_category(id);


--
-- Name: armor_material fk_29dba0b129dba0b1; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.armor_material
    ADD CONSTRAINT fk_29dba0b129dba0b1 FOREIGN KEY (armor_material) REFERENCES public.material(id);


--
-- Name: armor_material fk_29dba0b15329cce5; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.armor_material
    ADD CONSTRAINT fk_29dba0b15329cce5 FOREIGN KEY (armor_category) REFERENCES public.armor(id);


--
-- Name: weapon_property_weapon fk_5f20560795b82273; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_property_weapon
    ADD CONSTRAINT fk_5f20560795b82273 FOREIGN KEY (weapon_id) REFERENCES public.weapon(id);


--
-- Name: weapon_property_weapon fk_5f205607cf8aec93; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_property_weapon
    ADD CONSTRAINT fk_5f205607cf8aec93 FOREIGN KEY (weapon_property_details_id) REFERENCES public.weapon_property_details(id);


--
-- Name: weapon fk_6933a7e612469de2; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon
    ADD CONSTRAINT fk_6933a7e612469de2 FOREIGN KEY (category_id) REFERENCES public.weapon_category(id);


--
-- Name: weapon_property_details fk_a51dca956c5a615; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.weapon_property_details
    ADD CONSTRAINT fk_a51dca956c5a615 FOREIGN KEY (weapon_property_id) REFERENCES public.weapon_property(id);


--
-- Name: combat_art_weapon_category fk_b04be02023a1db73; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.combat_art_weapon_category
    ADD CONSTRAINT fk_b04be02023a1db73 FOREIGN KEY (combat_art_id) REFERENCES public.combat_art(id);


--
-- Name: combat_art_weapon_category fk_b04be0204011281b; Type: FK CONSTRAINT; Schema: public; Owner: www_data
--

ALTER TABLE ONLY public.combat_art_weapon_category
    ADD CONSTRAINT fk_b04be0204011281b FOREIGN KEY (weapon_category_id) REFERENCES public.weapon_category(id);


--
-- PostgreSQL database dump complete
--

\unrestrict DSetLbr9qHWY1zbWOyr90H316GcchvV5UCM97lpJldYaKHP7kbHZgUUs9BfnVYz

