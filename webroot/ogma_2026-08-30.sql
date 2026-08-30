--
-- PostgreSQL database dump
--

\restrict WXUkq7xPLy21Mtc27tp0ZGxqi6doh3s2oJt5RLQqEmvsA6wsu2mSh4HSPuGsXkd

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
-- Name: armor; Type: TABLE; Schema: public; Owner: -
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


--
-- Name: armor_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.armor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: armor_material; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.armor_material (
    armor_material integer NOT NULL,
    armor_category integer NOT NULL
);


--
-- Name: changelog; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.changelog (
    id integer NOT NULL,
    version character varying(255) NOT NULL,
    content text NOT NULL
);


--
-- Name: changelog_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.changelog_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: combat_art; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.combat_art (
    id integer NOT NULL,
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
    order_index integer NOT NULL,
    section integer NOT NULL
);


--
-- Name: combat_art_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.combat_art_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: combat_art_weapon_category; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.combat_art_weapon_category (
    combat_art_id integer NOT NULL,
    weapon_category_id integer NOT NULL
);


--
-- Name: damage_type; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.damage_type (
    id integer NOT NULL,
    type character varying(255) NOT NULL,
    description text,
    effect text
);


--
-- Name: damage_type_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.damage_type_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


--
-- Name: glossary_condition; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.glossary_condition (
    id integer NOT NULL,
    condition character varying(255) NOT NULL,
    description text,
    effect text NOT NULL
);


--
-- Name: glossary_condition_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.glossary_condition_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: glossary_trait; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.glossary_trait (
    id integer NOT NULL,
    trait character varying(255) NOT NULL,
    description text,
    effect text NOT NULL
);


--
-- Name: glossary_trait_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.glossary_trait_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: item; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.item (
    id integer NOT NULL,
    category_id integer NOT NULL,
    item character varying(255) NOT NULL,
    description text,
    price character varying(255) NOT NULL,
    enc smallint NOT NULL
);


--
-- Name: item_category; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.item_category (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    description text
);


--
-- Name: item_category_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.item_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: item_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: material; Type: TABLE; Schema: public; Owner: -
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


--
-- Name: material_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.material_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: skill; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.skill (
    id integer NOT NULL,
    skill character varying(255) NOT NULL,
    description text,
    main_carac character varying(255) DEFAULT NULL::character varying,
    specialisation_example text,
    test_example text
);


--
-- Name: skill_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.skill_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: sort; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.sort (
    id integer NOT NULL,
    effet character varying(255) NOT NULL,
    propriete text,
    ecole character varying(255) NOT NULL,
    dc character varying(255) NOT NULL,
    magnitude text NOT NULL,
    description text,
    inkarnai character varying(255) DEFAULT NULL::character varying
);


--
-- Name: sort_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.sort_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: stance; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.stance (
    id integer NOT NULL,
    stance character varying(255) NOT NULL,
    description text,
    effect text NOT NULL
);


--
-- Name: stance_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.stance_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: user; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    email character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) NOT NULL,
    username character varying(255) NOT NULL,
    is_verified boolean NOT NULL
);


--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: weapon; Type: TABLE; Schema: public; Owner: -
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


--
-- Name: weapon_category; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.weapon_category (
    id integer NOT NULL,
    category character varying(255) NOT NULL,
    description text,
    effect text
);


--
-- Name: weapon_category_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.weapon_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: weapon_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.weapon_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: weapon_property; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.weapon_property (
    id integer NOT NULL,
    property character varying(255) NOT NULL,
    description text,
    effect text,
    example text
);


--
-- Name: weapon_property_details; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.weapon_property_details (
    id integer NOT NULL,
    weapon_property_id integer NOT NULL,
    x character varying(20) DEFAULT NULL::character varying,
    y character varying(20) DEFAULT NULL::character varying,
    z character varying(20) DEFAULT NULL::character varying
);


--
-- Name: weapon_property_details_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.weapon_property_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: weapon_property_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.weapon_property_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: weapon_property_weapon; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.weapon_property_weapon (
    weapon_id integer NOT NULL,
    weapon_property_details_id integer NOT NULL
);


--
-- Name: web_content_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.web_content_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: web_content; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.web_content (
    id integer DEFAULT nextval('public.web_content_id_seq'::regclass) NOT NULL,
    page character varying(255) NOT NULL,
    title character varying(255) NOT NULL,
    category character varying(255) NOT NULL
);


--
-- Name: web_content_section_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.web_content_section_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: web_content_section; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.web_content_section (
    id integer DEFAULT nextval('public.web_content_section_id_seq'::regclass) NOT NULL,
    web_content_id integer NOT NULL,
    "position" integer NOT NULL,
    title character varying(255) DEFAULT NULL::character varying,
    level integer NOT NULL,
    anchor character varying(255) DEFAULT NULL::character varying,
    collapsible boolean NOT NULL,
    content text
);


--
-- Data for Name: armor; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: armor_material; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: changelog; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.changelog (id, version, content) FROM stdin;
\.


--
-- Data for Name: combat_art; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: combat_art_weapon_category; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.combat_art_weapon_category (combat_art_id, weapon_category_id) FROM stdin;
\.


--
-- Data for Name: damage_type; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.damage_type (id, type, description, effect) FROM stdin;
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: -
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
DoctrineMigrations\\Version20260805000000	2026-08-05 10:31:22	32
DoctrineMigrations\\Version20260815000000	2026-08-18 17:59:06	8
DoctrineMigrations\\Version20260818180036	2026-08-18 18:04:08	8
DoctrineMigrations\\Version20260815000100	2026-08-18 18:23:43	19
\.


--
-- Data for Name: glossary_condition; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: glossary_trait; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: item; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: item_category; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: material; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: skill; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.skill (id, skill, description, main_carac, specialisation_example, test_example) FROM stdin;
\.


--
-- Data for Name: sort; Type: TABLE DATA; Schema: public; Owner: -
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
10	Renforcement [Caractéristique]	[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]	Altération	4+3X	Formula 1+1X	La cible voit sa [Caractéristique] augmenter de [Mag] cran(s) pendant une minute.	Agones, Eftis, Orizo, Kynigi, Psema
12	Résistance [Élément]	[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]	Altération	3+2X	Formula 1+1X	Procure à la cible le trait Résistance([Mag],[élément]).	Aïgida, Anathos, Horoï, Kuga, Nero, Safi
15	Stabilisation	\N	Altération	4	-	La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible n'est plus mourante et devient stable.	Agapi
17	Purge	Concentration	Altération	3+2X	AD +1	La cible obtient [Mag] avantages pour résister et purger les effets négatifs(Vulnérabilité, Saignement, Poison, etc..) tant que le lanceur se concentre sur le sort.	Agapi
18	Invisibilité	Concentration	Altération	8	-	La cible devient invisible et le reste tant que le lanceur se concentre sur le sort.	Safi
19	Armure	[Physique, Magique]	Conjuration	4+3X	Formula 1+1X	La résistance [type] de la cible augmente de [Mag].	Pravoï
20	Protection	Réaction	Conjuration	3+3X	Double 2	Réduis les dégâts subis par la cible de [Mag] pour une instance de dégâts dans la minute qui suit l'incantation du sort.	Pravoï
22	Toile d'araignée	\N	Conjuration	3+3X	Double 2	L'endroit ciblé par le lanceur diminue la vitesse des entité le traversant de [Mag].	Kynigi
30	Assaut minéral	[Métal, Pierre, Terre, Sable]	Conjuration	2+2X	Dice_scale d2	La cible subit [Mag] dégâts physiques.	Kormo, Ourgal
31	Assaut élémentaire	[Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]	Conjuration	2+2X	Dice_scale d2	La cible subit [Mag] dégâts d'[Élément].	Aïgida, Anathos, Horoï, Kuga, Nero, Safi
32	Réanimation	\N	Domination	6+2X	Gabarit P && Time une heure	La cible doit être une créature inanimé de gabarit [Mag] ou moins pendant [Mag]. La créature réanimé agit comme bon lui semble.	Anathos
37	Télékinésie	Concentration	Domination	2+2X	Formula 1+1X	La cible obtient le trait Télékinésiste([Mag]).	Agones
43	Télépathie	Concentration	Mysticisme	2	-	La cible obtient le trait Télépathe.	Orizo
44	Archives d'Orizo	\N	Mysticisme	2+2X	AD +1	Le prochain test de compétence de la cible pouvant être facilité avec des connaissances spécifiques se fera avec [Mag] avantage(s).	Orizo
45	Détection de la vie / des morts / de la magie	\N	Mysticisme	3+1X	Double 10	Détecte les être vivants / les morts / la magie dans un rayon de [Mag] mètres du point d'impact du sort.	Kynigi, Anathos, Orizo
48	Augure	\N	Mysticisme	5	-	La cible est avertie de son futur proche. (fortune, péril, les deux ou rien).	Tychi
50	Communion avec la nature	\N	Mysticisme	6	-	La cible obtient trois informations sur son environnement.	Kormo et Kynigi
51	Localisation d'entité	Concentration	Mysticisme	4+2X	Distance 100 mètres	La cible connait la position de l'entité de son choix dans un rayon de [Mag].	Kynigi
52	Langue enchantée	Concentration	Mysticisme	4	-	La cible sait parler dans toute les langues tant que le lanceur se concentre sur le sort.	Orizo
53	Lien sensoriel	Concentration	Mysticisme	6+2X	Distance 100 mètres	La cible peut voir/entendre/sentir à travers les sens d'une créature consentante dans un rayon de [Mag].	Kynigi
54	Création élémentaire	[Glace, Métal, Pierre, Sable, Terre]	Conjuration	2+2X	Double 10 && Time une minute	L'[élément] apparaît à l'endroit ciblé pendant [Mag]. La création doit subir [Mag] dégâts avant de se briser.	Kormo, Nero, Ourgal
57	Contrôle de la température	Concentration	Conjuration	2+3X	Double 5	Augmente ou diminue la température ambiante de la cible de [Mag] C°.	Horoï
58	Lumière	\N	Conjuration	2+2X	Double 5 && Time une heure	Génère de la lumière vive sur [Mag] mètres et de la lumière faible sur [Mag]*2 mètres de façon circulaire pendant [Mag].	Safi
9	Transmutation	\N	Altération	10+1X	Dice_nb 2d4	Le lanceur lance [Mag] et en fait le total, si le résultat dépasse la résistance magique de la cible, elle devient métallique ou minérale. Une cible métamorphosée en pierre ou en métal est invulnérable aux dégâts du temps et son poids est multiplié par 5. L'effet dure indéfiniment tant que la cible ne brise pas le sort.<br/>Pour se libérer, la cible peut effectuer chaque jour un jet d'Altération(Volonté ou Vigueur) avec un DC équivalent au résultat du lanceur. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut à la somme des d4 lancés initialement par le lanceur.	Ourgal
11	Affaiblissement [Caractéristique]	[Force, Dextérité, Agilité, Vigueur, Intelligence, Volonté, Perception, Éloquence]	Altération	4+3X	Formula 1+1X	La [Caractéristique] de la cible diminue de [Mag] crans pendant une minute.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur dans le cas d'une caractéristique physique ou de Volonté pour une caractéristique mentale avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Agones, Eftis, Orizo, Kynigi, Psema
13	Vulnérabilité [Élément]	Concentration, [Acide, Eau, Feu, Foudre, Glace, Lumière, Nécrotique, Poison]	Altération	3+2X	Formula 1+1X	La cible subit le trait Vulnérabilité([Mag],[élément]).<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Aïgida, Anathos, Horoï, Kuga, Nero, Safi
14	Guérison	\N	Altération	4	-	La cible passe un test de Vigueur avec un DC équivalent au triple de ses blessures et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d'une blessure. Chaque palier de 3 DR de la cible soigne une blessure supplémentaire.	Agapi
16	Récupération	\N	Altération	2	-	La cible passe un test de Vigueur pour les traumas Physiques ou de Volonté pour les traumas Mentaux avec un DC équivalent au triple de ses traumas physiques/mentuax et un bonus équivalent au DR du lanceur. Sur une réussite, la cible guérie d'un trauma. Chaque palier de 3 DR de la cible soigne un trauma supplémentaire.	Agapi
21	Entrave	Concentration	Conjuration	4+2X	AD -0	La cible est immobilisée.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Pravoï
23	Invocation de Karnarim élémentaire	[Acide, Eau, Feu, Foudre, Glace, Lumière, Métal, Nécrotique, Pierre, Poison, Sable, Terre]	Conjuration	6	-	Invoque un Karnarim de l'[élément] pendant une minute. Voir Élémentaire mineur dans le Bestiaire.	Aïgida, Anathos, Horoï, Kormo, Kuga, Nero, Ourgal, Safi
24	Invocation d'Arme	\N	Conjuration	6+2X	Dice_scale 1d4	Invoque une arme infligeant [Mag] dégâts magiques à l'endroit ciblé, cette arme peut utiliser la caractéristique de Volonté du lanceur pour les jets de Style de Combat.	Agones
25	Projection psychique	Concentration	Conjuration	10	-	L'esprit de cible est envoyé dans un domaine de Karnaï.<br/>Sans esprit pour le contrôler, le corps de la cible est inanimé pendant cette période. Une minute dans le monde matériel équivaut à une heure dans le monde de Karnaï.<br/>L'esprit de la cible doit consentir à ce voyage ou au moins ne pas y être opposée sinon le lanceur risque de perdre son propre esprit lors de l'incantation.	Selon le domaine visité
26	Bannissement	\N	Conjuration	0	-	La cible est renvoyé dans sa dimension d'Origine.<br/>Elle doit passer un test de Vigueur ou Volonté opposé à l'incantation du lanceur si elle souhaite résister.<br/>Si l'invocateur de la cible est conscient de la tentative de bannissement, il peut effectuer le test à la place de la cible en utilisant sa compétence de Conjuration.	Pravoï
55	Bourrasque	Concentration	Conjuration	2+2X	Double 10	Invoque du vent se déplaçant à [Mag] km/h à l'endroit ciblé, la direction du vent est au choix du lanceur.	Aïgida
27	Pas de l'ombre	\N	Conjuration	6+2X	Distance 10 mètres	La cible doit se tenir dans une ombre. Elle se téléporte dans une autre ombre située à moins de [Mag] de sa position. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.	Eftis
28	Téléportation	\N	Conjuration	8	Distance 10 mètres	La cible se téléporte sur une distance de [Mag] ou moins dans un éclair de lumière. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.	Safi
29	Racines du monde	\N	Conjuration	6	Distance 10 mètres	La cible se téléporte via les racines d'un arbre sur une distance de [Mag] ou moins, elle doit être en contact avec un arbre en vie et réapparaître sur un autre arbre en vie. Si elle souhaite résister, elle doit passer un test de Volonté avec un DC équivalent au résultat du lanceur.	Kormo
56	Spores [type]	[Paralysie, Sommeil, Fascination, Confusion,...]	Conjuration	5	-	Invoque des spores infligeant l'effet [type].<br/>Pour se libérer, la cible peut effectuer un test de Force, de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.<br/>La fréquence du test dépend du [type] :Paralysie/Fascination/Confusion -> chaque round ; sommeil chaque minute	Kormo
59	Création illusoire	\N	Conjuration	3+2	Gabarit TP && Time une minute	Façonne une création intangible de la forme souhaitée avec sons et odeurs de gabarit [Mag] ou moins pendant [Mag] minute. Un test d'Observation ou d'Investigation avec un DC équivalent au résultat du lanceur est nécessaire pour se rendre compte de l'illusion sans la toucher.	Psema
33	Contrôle mental	Concentration	Domination	6	-	La cible passe sous le contrôle du lanceur.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Kynigi, Kormo, Psema
34	Réécriture mémorielle	\N	Domination	8	-	La dernière minute de mémoire de la cible est modifiée par le lanceur.<br/>Pour résister, la cible peut passer un test de Vigueur ou de Volonté avec un DC équivalent au résultat du lanceur.<br/>Si la modification porte sur une période minoritaire de la vie de la cible et qu'elle est incohérente ou trop contradictoire avec le comportement habituel de la cible, elle considérera les effets du sort comme une hallucination/mauvais rêve. Dans le cas d'une modification de grande ampleur (au moins la moitié de la vie de la cible), seules les pensés incohérentes sont perçues comme des mauvais rêves.	Psema
35	Mot de pouvoir : Douleur	Concentration	Domination	4+2X	Double 1 && AD -1	La cible voie sa vitesse diminuée de [Mag] et effectue toute action (sauf se libérer) avec [Mag] désavantage(s).<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Psema
36	Mot de pouvoir : Mort	\N	Domination	15	-	La cible meurt instantanément.<br/>Pour résister, la cible peut lancer son dé de Vigueur et son dé de Volonté, en faire la somme et la comparer au résultat du lanceur.	Anathos
38	Peur	\N	Domination	5	1 minute	La cible est Effrayé(lanceur).<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Agapi, Psema
39	Calme	\N	Domination	5	1 minute	La cible est fasciné.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Psema
40	Rage	\N	Domination	5	1 minute	La cible considère tout le monde comme un adversaire.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Agones
41	Silence	\N	Domination	5	1 minute	La cible est incapable de parler.<br/>Pour se libérer, la cible peut effectuer chaque round un test de Vigueur ou de Volonté avec un DC équivalent au cercle du sort. Le Nombre de DR (NDR) qu'il doit rassembler pour se libérer équivaut au résultat du lanceur de sort.	Psema
42	Apparence trompeuse	Concentration	Domination	6	-	La cible est perçue comme quelqu'un d'autre.<br/>Se rendre compte du sort nécessite de passer un test d'Observation(Per) ou d'Arcanes(Int ou Per) avec un DC équivalent au résultat du lanceur de sort.	Psema
46	Vision véritable	Concentration	Mysticisme	6	-	La cible voit tout, même les entités invisibles, peut voir dans le noir le plus complet et même dans une obscurité magique.<br/>La cible peut voir grâce à ce sort même si elle est aveugle.	Orizo
47	Destinée	\N	Mysticisme	6+2X	Dice_nb 2d6	Le lanceur peut ajouter/enlever le résultat d'un des dés lancés par ce sort pour modifier le résultat de n'importe quel test. (Le lanceur doit annoncer l'utilisation d'un dé pré-tiré avant que le dé ne soit lancé).	Tychi
49	Prophétie	\N	Mysticisme	10	-	La cible obtient une réponse fiable sur un évènement à venir dans les 7 jours. (avoir recours à cet effet sans 7 jours d'intervalles augmente de 25% les chances de réponse aléatoires).	Tychi
\.


--
-- Data for Name: stance; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.stance (id, stance, description, effect) FROM stdin;
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public."user" (id, email, roles, password, username, is_verified) FROM stdin;
8	testlogin@test.local	[]	$2y$13$ucefJRfoVYW2aRuulP35euG6hNRN9VNo547EP/TYC4ftDjD6mmTQi	TestLogin	t
9	taynog.ogmarim@gmail.com	["ROLE_SUPER_ADMIN"]	$2y$13$o8oydzVUnVA5E/iiqPQvduG.h2zMvGM63oB1iFGoCi/OG0g7whmo2	Taynog	f
10	opencode@test.local	["ROLE_SUPER_ADMIN"]	$2y$13$lAA7toyop7GeaBIrmfr.qOfjeNYGziRhNwbADGzGVPVt3jZpoc1L.	opencode	t
\.


--
-- Data for Name: weapon; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: weapon_category; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: weapon_property; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: weapon_property_details; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: weapon_property_weapon; Type: TABLE DATA; Schema: public; Owner: -
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
-- Data for Name: web_content; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.web_content (id, page, title, category) FROM stdin;
2	histoire_ogma	Histoire	lore
3	carte_ogma	Carte d'Ogma	lore
4	azuma	Azuma	lore
5	chono	Chono	lore
6	kanta	Kanta	lore
7	mushuk	Mushuk	lore
8	sakha	Sakha	lore
9	sarpa	Sarpa	lore
10	sever	Sever	lore
11	sihir	Sihir	lore
12	steinn	Steinn	lore
13	tori	Tori	lore
14	tuskizi	Tuskizi	lore
\.


--
-- Data for Name: web_content_section; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.web_content_section (id, web_content_id, "position", title, level, anchor, collapsible, content) FROM stdin;
1	2	6	Les Sentinelles	1	sentinelles	t	<div>\r\n<p>Apparues apr&egrave;s la Grande R&eacute;volte dans le but de prot&eacute;ger les faibles contre les b&ecirc;tes et les monstres, les Sentinelles sont un ordre ind&eacute;pendant de tout pouvoir politique n&rsquo;agissant que pour le bien des &ecirc;tres civilis&eacute;s.</p>\r\n\r\n<p>Organis&eacute;es en de multiples chapitres install&eacute;s dans de grandioses forteresses dispers&eacute;es au quatre coins du monde, elles sont capables d&rsquo;intervenir rapidement o&ugrave; que se trouve la menace. Souvent commandit&eacute;es par les villages frontaliers mais aussi par les dirigeants des plus grandes villes pour purger du mal les bastions de la civilisation. Les membres des sentinelles sont des guerriers exceptionnels, si puissants qu&rsquo;ils agissent seuls la plupart du temps, ne s&rsquo;alliant que pour affronter les menaces les plus grandioses.</p>\r\n\r\n<p>Les premi&egrave;res sentinelles furent les h&eacute;ros de la Grande R&eacute;volte qui n&rsquo;ont pas &eacute;t&eacute; motiv&eacute;s par la prise de responsabilit&eacute;s politiques et ont continu&eacute;s leurs efforts au combat contre l&rsquo;atrocit&eacute; Sihir&auml;ll. Ce sont les fondateurs des chapitres, et les premiers &agrave; avoir entra&icirc;n&eacute;s la premi&egrave;re g&eacute;n&eacute;ration de Sentinelles. Ils ont accueilli en leur sein des orphelins, des &acirc;mes en peines, des fils et des filles dont la famille trop pauvre ne pouvait plus s&rsquo;occuper ; tous form&eacute;s pour en vrai de v&eacute;ritables machine &agrave; tuer.</p>\r\n\r\n<p>La formation va bien au-del&agrave; de celle du soldat de base : ma&icirc;trise des armes, introduction aux arts de Karna&iuml;, cours appliqu&eacute;s sur les monstres et d&rsquo;autres connaissances importantes pour un chasseur ultime. Au terme de ces nombreuses ann&eacute;es d&rsquo;apprentissages, les recrues atteignent le point culminant que leur permette leur condition d&rsquo;humains ou d&rsquo;homme-b&ecirc;tes mais ne sont pas encore consid&eacute;r&eacute; comme de v&eacute;ritables Sentinelles, il faut encore subir de multiples modifications corporelles pour atteindre un tel rang. Provoqu&eacute;s par des rem&egrave;des alchimiques ou des incantations magiques, ces mutations affectent le corps comme l&rsquo;esprit et tracent un foss&eacute; entre l&rsquo;aptitude d&rsquo;une Sentinelle et celle d&rsquo;un simple mortel : vision nocturne, r&eacute;flexes am&eacute;lior&eacute;s, sens aff&ucirc;t&eacute;s &agrave; l&rsquo;extr&ecirc;me, r&eacute;g&eacute;n&eacute;ration accrue, m&eacute;tabolisme endurci, etc...</p>\r\n\r\n<p>Une sentinelle est aussi efficace qu&rsquo;une quinzaine de soldats au bas mot, leurs connaissances et leur ma&icirc;trise de la magie les mettent sur un pied d&rsquo;&eacute;galit&eacute; avec les puissants Soldats Sorciers de l&rsquo;Empire Azuma bien que leur champ de comp&eacute;tences ne porte pas sur les m&ecirc;mes domaines. La chasse aux monstres n&eacute;cessite un mat&eacute;riel particulier : des armes adapt&eacute;es &agrave; tel ou tel monstre, des produits alchimiques tels que des potions et des bombes. Ce mat&eacute;riel et son entretien co&ucirc;tent cher &agrave; entretenir et les risques que prennent les Sentinelles sont grands, c&rsquo;est pourquoi la r&eacute;compense qu&rsquo;elles r&eacute;clament d&eacute;passent largement les capacit&eacute;s mon&eacute;taires des simples roturiers. Lors d&rsquo;une intervention dans un village frontalier, c&rsquo;est le village entier qui se cotise pour payer la Sentinelle ; alors que les nobles peuvent se payer leurs services sans sourciller.</p>\r\n</div>
8	3	0	\N	2	\N	f	<div>\r\n        <img src="/images/Misc/Carte_Ogma.png" alt="Carte Ogma" id="map"/>\r\n    </div>
9	4	3	Un monde civil strict	2	\N	t	<div>\r\n        <ul>\r\n            <li>\r\n                <div>\r\n                    <h3 onclick="hideContent(this)">Organisé par l'administration</h3>\r\n                    <p>Si l’empereur est la tête de l’empire, et les Huit le cœur, l’administration en est le sang. Celle-ci est très complexe et tentaculaire, elle est devenue indispensable au bon fonctionnement de l’empire malgré son coût élevé. L’administration sert à organiser toute la vie Azuma et veille à la stabilité de l’empire.</p>\r\n                    <p>Bien que l’empire met en haute estime les grandes ascendances et la magie, l’administration est basés sur la méritocratie il n’est donc pas rare de voir des fonctionnaires ne maîtrisant pas bien la magie mais qui possèdent de réelles compétences. Mais malgré la mise en valeurs des compétences, cette méritocratie se heurte souvent aux ambitions des Neuf, il n’est pas rare de retrouver des membres de ces familles dans l’administration quelle que soient leurs compétences.</p>\r\n                    <p>Les quatre ministres de l’empereur sont choisis par celui-ci dans les hauts fonctionnaires de l’empire, or ces places sont autant prisées par les Neuf que par les citoyens car d’une part le poste de ministre procure un vote au assemblé des Neuf mais également un prestige conséquent qui retombe sur les familles de ceux-ci.</p>\r\n                </div>\r\n            </li>\r\n            <li>\r\n                <div>\r\n                    <h3 onclick="hideContent(this)">Autour des citoyens</h3>\r\n                    <p>Les citoyens de l’empire, sont sa chair, mais toute la population de l’empire Azuma n’est pas citoyenne. Il existe une distinction entre ceux-ci et les non citoyens mais cette distinction est juridique et n’implique pas une discrimination d’état envers les non citoyens.</p>\r\n                    <p>La citoyenneté Azuma n’est pas foncièrement difficile à obtenir, le moyens le plus courant est d’avoir fini le temps d’étude obligatoire de quatre ans dans une académie impériale, bien que la plupart des jeunes Azuma y sois bien préparé car les écoles impériale sont très répandues et populaires de par le fait qu'elles enseignent les bases de la magie en plus du nécessaire pour vivre dans la société Azuma, incarné dans les mathématiques, l’écriture et la lecture.</p>\r\n                    <p>Malgré la popularité de ces institutions, les tranches les plus pauvre de la population n’ont pas assez de ressources pour passer par les écoles et échouent à l’académie. L’autre voie pour prétendre à la position de citoyen est de s’engager dans la quatrième section de l’armée Azuma et plus précisément les corps auxiliaires pour une durée de huit ans, c’est une voie empruntée par tout les Azumas qui n’ont pas réussi leurs examens.</p>\r\n                    <p>Les citoyens ont beaucoup d’avantages, le droit d’être défendus par le juriste de leurs choix dans les tribunaux, l’accès à l’Académie Impériale Magique et à l’Académie Impériale Magister, avec des possibles bourses qui récompensent les élèves les plus talentueux mais pauvres. Ils obtiennent également le droit de se présenter et de voter au poste de gestionnaire de quartier, un représentant élu qui gère avec l’administration le développement et la politique d’un quartier.</p>\r\n                    <p>Les non citoyens ne sont pas pour autant traités comme des parasites. Ils ont le droit de commerce et celui d’être défendu par le juriste de leur choix dans un jugement commercial, alors que pour tout autre jugement le juriste serait commis d’office, ils payent aussi des taxes supplémentaire par rapport au autres citoyens. Les citoyens de l’empire sont tenus, du moins pour une partie, de s’engager dans les forces militaire en cas de crise majeure.</p>\r\n                </div>\r\n            </li>\r\n            <li>\r\n                <div>\r\n                    <h3 onclick="hideContent(this)">Défendu par une armée efficace</h3>\r\n                    <p>Ses forces militaires sont l’une des armées les mieux organisée au monde. L’armée Azuma se divise en quatre sections :</p>\r\n                    <ul>\r\n                        <li>\r\n                            <p>La première section regroupe les Haut généraux de l’empire qui aide l’empereur à commander l’armée. Ainsi que les forces d’élite Azumas les Soldats Sorciers qui se distinguent par une maîtrise totale de la magie et des armes plus conventionnelles, ils forment une force d’élite indépendante de l’armée régulière, ils effectuent des missions spéciale en temps de paix mais aussi sur le front comme percer une ligne ou de défaire des hauts gradées.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p>La deuxième section est composée de la Division Magique et des gradées inférieurs. La division magique Azuma est spécialiser dans le siège, les attaques de grande envergure et la division de mage médecins. Les gradés inférieurs de l’armée sont formé à une magie spécifique: la télépathie. Le développement de cette magie au sein de l’armée fut une révolution pour les Azuma et permis à leurs armée de rivaliser avec les plus grande force de frappe du monde. Mais cette magie puissante a ses défauts, en effet son utilisation prolongée lors des combats fatigue les gradés et cette fonction de relais ne convient pas à tout le monde, c’est un poste vital mais à risque car tout le monde ne supporte pas mentalement l’utilisation de la télépathie, le nombre de relais humain pour centraliser et distribuer les informations jusqu’au généraux est conséquent et la moindre erreur peu provoquer la folie suite à l’écho de milliers de voix dans la tête des lieutenants télépathes.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p>La troisième section est celle de l’infanterie régulière, ce sont des soldat semi-professionnels, recruté parmi les citoyens en temps de crise, on compte également les détachements privés envoyés par les Huit familles dans l’armée régulière. Ils sont l’épine dorsale de l’armée lors de conflit de grande ampleurs.</p>\r\n                        </li>\r\n                        <li>\r\n                            <p>La quatrième section regroupe la force des auxiliaires qui sont le corps d’armée de l’empire en dehors des temps de crise ils s’occupent de pacifier les régions en temps de paix et sont seul présent dans tout conflits, là où le recrutement de la troisième sections demande une réunion exceptionnelle des Neuf et n'est demandée que dans les conflits de grande ampleur. Les rangs des auxiliaires ne sont pas composés que d’étrangers à la culture Azuma, un grand nombre d’Azumas qui n’ont pas validé leurs études s’engage dans les auxiliaires pour pouvoir devenir citoyens. </p>\r\n                        </li>\r\n                    </ul>\r\n                </div>\r\n            </li>\r\n        </ul>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Comme tout les autres origines Humaines, les Azumas peuvent augmenter leurs Caractéristiques par le biais de 3 amélioration de cran, au maximum 2 sur un même dé.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Étant des humains, les Azumas en bonne santé peuvent espérer vivre au moins 80 ans, il n'est pas rare de croiser des citoyens centenaires parmi les cités de Quan-Daõ. On estime qu'un Azuma atteint l'âge adulte à 20 ans. À 35 ans on considère l'individu comme mâture et expérimenté. Au delà de 60 ans, les campagnes militaires prennent fins pour la plupart des citoyens impériaux pour se consacrer aux études plus poussées.</p>\r\n        <p><span class="big_underline">Honneur du Guerrier</span>Lorsque les choses se présentent mal, il est du devoir d'un Azuma de mourir honorablement : Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et la résistance magique augmente de 1 pendant un round.</p>\r\n        <p><span class="big_underline">Endurance humaine</span>Les humains sont naturellement endurants et ne laissent jamais tomber : Ne s'évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour </p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Azumas peuvent parler, lire et écrire le Daïtorin et deux autres langues (voir <a href="../World/Histoire_Ogma.php#langages">Langages</a>).</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Azumas</h3>\r\n        <p>Les Azumas sont très attachés à leur nom de famille, il représente beaucoup pour eux. Sans ce nom ils ne sont rien, et les familles n'hésitent pas à rejeter les enfants risquant de salir leur nom.</p>\r\n        <p><span class="big_underline">Noms masculins</span>Trang, Iwasaki, Thân, Suda, Jiang, Ashina, Chakri, Ogura, Meng, Sudara, Shan, Shui, Nikaidou, Aso, Meng </p>\r\n        <p><span class="big_underline">Noms féminins</span>Kasika, Chao, Sujin, Lei, Mei, Qiao, Shui, Piam, Napha, Sua, Chang, Shinjou, Shao, Ogawa</p>\r\n        <p><span class="big_underline">Noms de famille</span>Huang, Fusomi, Tanko, Tanetame, Ling, Kazuaki, Pin, Shin, Sadanobu, Hidemasa, Toshikatsu, Wuying, Shuren, Guanyu </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Ville Azuma</h4>\r\n        <img src="/images/Factions/Azuma_ville.jpg" alt="Ville Azuma" width="100%"/>\r\n    </div>
10	4	2	Un ensemble politique fort	2	\N	t	<div>\r\n        <p>L’Empire Azuma, ou l’empire d’Azur, est une entité politique régie et centrée autour de l’impératrice ou de l’empereur, monarque absolu de droit magique, il s’appuie sur le soutien des Huit familles, Neuf avec celle impériale, ainsi qu’une puissance administration.</p>\r\n        <p>L’empereur, pilier de la politique interne et externe, possède tout les pouvoirs au sein de l’empire : judiciaire, exécutif et législatif. Mais il ne les exerce pas en autocrate, il délègue une partie de ces pouvoirs aux autres entités politiques de l’empire. Ainsi le pouvoir judiciaire est réparti entre les neuf familles, chacun fait régner la loi de l’empire sur sa juridiction, les familles deviennent donc arbitres des conflits. En ce qui concerne les conflits entre familles celles ci sont réglées devant l’empereur, qui à le pouvoir d’outrepasser toute autre décision. Le pouvoir exécutif est totalement dans les mains de l’empereur mais est appliqué grâce au rouage de l’administration qui est présente sur tout le territoire. Le pouvoirs législatif est quand à lui partagé entre l’empereur, les Huit et des membres de l’administration.</p>\r\n        <ul>\r\n            <li>\r\n                <h3 onclick="hideContent(this)">Centré sur l'empereur</h3>\r\n                <p>Le pouvoir de l’empereur est héréditaire, il lui vient de tout les autres empereurs qui on régner avant lui. La légende raconte que le Premier Empereur faisait partis de ces héros meneurs de la Grande Révolte, et qu’après la guerre il fonda la capitale Tsunarey et la grande famille impérial les Azuring . Cette légitimité héritée d’un des plus grand mage de son temps s’incarne à travers la bague du Premier, un bijou inestimable qui contient la psyché de tout les Empereurs qui ont régné et régneront. Avec cette bague l’empereur possède la puissance nécessaire pour lancer des sorts bien au-delà du sixième cercle. Le mythe de la bague phénix est tel que l’empereur est aussi appeler Empereur Phénix car il bénéficierait des conseils de tout les empereur passés et à terme donneront aussi des conseils, c'est pour cette raison qu’elle est aussi appelée la bague murmurante.</p>\r\n                <p>Il est bon de noter que le mode de succession de l’empire est assez simple, c’est une succession héréditaire et magique, l’empire est laissé dans les mains du membre de la famille de l’empereur qui a la plus grande aptitude magique, que l’héritier sois une femme, un homme ou un sang-mêlé. Qu'importe son père ou sa mère, s'il est reconnu par la famille régente, il peut espérer accéder au trône. Ce mode de succession permet seulement au héritier les plus forts de devenir Empereur au prix de succession instables et de complots entre les Neuf familles pour place leurs favoris et en récolter les bénéfices. Le siège du pouvoir Impériale se situe dans le palais volant de Tsunaray, le palais de la mer, qui surplombe la ville en permanence, montrant à tous la sécurité et la prospérité apporté par l’empereur.</p>\r\n            </li>\r\n            <li>\r\n                <h3 onclick="hideContent(this)">S'appuyant sur la puissance des Huit</h3>\r\n                <div>\r\n                    <p>Les Huit familles sont le cœur de l’empire, comme pour la famille de l’empereur chaque famille possède des fondateurs illustres qui se sont démarqués lors de la Grande Révolte.</p>\r\n                    <p>Les îles de Quan Daõ sont donc séparées en de grandes cités, fiefs de ces illustres famille :</p>\r\n                    <ul>\r\n                        <li>La capitale Impériale est l’immense cité de Tsunarey, une cité si haute et imposante qu’elle rogne les cieux, le palais des mers en est le centre, un rappel de la puissance des Empereurs flottant au dessus de tout, soutenue par tout le savoir faire Azuma en enchantements.\r\n                        </li>\r\n                        <li>Salaris la cité des mer est indissociable de ces terre-pleins et de ces armatures magique qui empêche la ville de sombré, elle est le fief de la famille Shura.\r\n                        </li>\r\n                        <li>Anugia est une île-cité réputé pour son industrie florissante, arme, armure et toute l’industrie sidérurgique y est tentaculaire, la famille Sukia y règne.\r\n                        </li>\r\n                        <li>La belle cité d’Atalora est un haut lieu de culture de l’empire et bien que l’empire possède des bibliothèque dans toutes ces villes majeurs Atalora renferme en ces murs la célèbre Académie Impérial de Magie incarné par le palais Majikku, le second palais volant de l’empire et le fleuve Maji qui en coule magiquement, cette place de culture et faste est la fierté de la famille Atia.\r\n                        </li>\r\n                        <li>Navalore est la dernière des très grandes cité de l’empire elle profite du commerce et de la diplomatie étrangère engagée par sa famille dirigeante : les Emishi.\r\n                        </li>\r\n                        <li>Valoria est la plus petite cité de l’archipel la vie y est rude car les courant marin d’eau froide ramène bon nombre de serpent marin de Jikaï la maudite, l’île en elle même à été coloniser il y à peu par la famille Minnas.\r\n                        </li>\r\n                        <li>Un peu plus au sud la cité de Sithas est réputé pour l’Académie Impérial Magister et bien que petite elle est prestigieuse pour l’empire et la famille Waas.\r\n                        </li>\r\n                        <li>La cité de Vollunis est un des rare lieu de l’archipel à être bordé par une grande forêt et toute la richesse de la ville découle de celle ci, qui est aussi bien exploitée que protégée par la familles Tetsu.\r\n                        </li>\r\n                        <li>Pelaril la verdoyante est la dernière cité notable de l’empire et il se trouve qu’elle est aussi le grenier de celui-ci, sur les rive de la Maji on peut voir des champs qui s’étendent jusqu’à eau salée, bien que grandes et fertiles ces plaines ne permettent pas de nourrir tout l’empire malgré la magie imprégnant le fleuve. Au centre de Pelaril se situe le vaste palais des Tiang construit sur plus d’un kilomètre de terre.\r\n                        </li>\r\n                    </ul>\r\n                </div>\r\n            </li>\r\n            <li>\r\n                <h3 onclick="hideContent(this)">L'assemblée des Neuf, un conseil politique</h3>\r\n                <div>\r\n                    <p>La puissance des Huit est ainsi palpable dans tout l’empire et leurs querelles déstabilisent le pays. Ces sont les plus grands propriétaires terriens de l’archipel ce qui leur procure une grande richesse . Ils sont souvent en conflit de par l’étendue de leurs domaines et les différentes industries qu’ils contrôlent. Malgré tout ils sont, du moins en apparence pour certain, unis autour de l’empire et de l’empereur.</p>\r\n                    <p>Ce rôle économique n’est pas à prouvé autant que leurs rôles politiques, qui s’incarne dans tout leurs pouvoirs dans leurs domaines, liés aux pouvoirs de l’empereur, ils exercent donc la justice sur leurs terres et participent à des grands conseils avec l’empereur lors de l’assemblé des Neuf.</p>\r\n                    <p>L’assemblée des Neuf sert à légiférer au sein de l’empire, elle est composé bien évidement de l’empereur et des chefs des Huit familles de l’empire d’où son nom, mais au fils du temps avec l’évolution de l’empire et l’essor de l’administration huit autre siège s’ajoutèrent à l’assemblé des Neuf pour les huit plus grand membre de l’administration, soit les deux Haut Généraux de l’empire, les deux mage suprême de l’académie et les quatre ministres de l’empereur. Le tout porte donc l’assemblé des Neuf à dix-sept membre. C’est lors de cette assemblé que les lois sont proposées à tous puis voté, les votes s’effectue à mains levées et chacun des dix-sept membres possède une voix, même l’empereur. L’emplacement des assemblés tourne entre les Neuf familles, permettant à chacune d’entre elle de montrer ses richesses et sa capacité à entretenir ses hôtes.</p>\r\n                </div>\r\n            </li>\r\n        </ul>\r\n    </div>
11	4	1	L'archipel Quan Daõ	2	\N	t	<div>\r\n        <p>Entre Nashira et Antoraï, les deux continents d’Ogma, se situe l’archipel Quan Daõ. Il se divise entre sept îles majeures et une myriade de secondaire. Le climat de tout l’archipel varie entre le tempéré et subtropicale, se qui donne une fertilité particulière aux îles, les courant marin qui passe près de l’archipel pour faire le tour de Jikaï font des lieux un paradis maritime ou la faune et la flore sous marine prospère.</p>\r\n        <p>La population, elle est majoritairement composée d’Humains, qui sont appelés Azumas se qui réfère à la mer intérieur d’Azur au centre de l’archipel, mais une partie des habitants sont également des hommes bêtes et des métis de tout horizon, ainsi que des Hommes de différente culture. Les îles Quand Daõ sont densément peuplé et encore en croissance, réduisant de jours en jours les parcelles exploitables aux profits de cités tentaculaires.</p>\r\n        <p>L’architecture de l’empire s’est donc naturellement tournée vers les cieux et la mer, il n’est pas rare de voir des tours d’habitations de plus de six étages, des quartiers entièrement construits sur l’eau voire des palais flottants au dessus des habitations et des mers. Le tout est possible grâce aux avancées magique des académies impérial, en particulier L’Académie Impériale de Magie qui est une source de prestige et de fierté pour les Azumas, car elle est à la pointe de la recherche magique et forme à chaque génération une partie des meilleurs mages de l’Empire et d’Ogma.</p>\r\n        <p>Au delà d’être un archipel où la vie est facile, sa situation géographique en fait un point central du monde, entre les différentes puissances du monde que sont les clans Steinns, les différents royaumes Severs et le sultanat Tsukizi, cette position centrale dans le monde favorise le commerce et permet aux différentes îles de profiter de matières premières dont elles sont de plus en plus dépendantes. La proximité avec les cités portuaire Mushuk de Palabona et d’Edena, couplée au différent quartier Mushuk et comptoirs des cités de l’empire, favorise encore plus les relations et les échanges à travers tout le monde connu, ainsi l’empire c’est tournée vers l’importation et l’exportation massive et on peut ainsi manger des poissons géants de Salaris jusque dans les cours les plus lointaines, ou trouver divers objets enchantés dans les fabriques Azuma dans toute les terres, le tout porté par un système politique fort l’empire. </p>\r\n    </div>
12	4	0	Les Azumas	1	\N	f	<div class="side_by_side">\r\n        <div class="side_by_side_img">\r\n            <img src="/images/Factions/Azuma_picture.jpg" alt="Générale Azuma" width="100%"/>\r\n        </div>\r\n        <div class="side_by_side_img">\r\n            <img src="/images/Factions/Azuma_picture2.jpg" alt="Noble Azuma" width="100%"/>\r\n        </div>\r\n    </div>
13	5	0	Les Chonos	1	\N	f	<img src="/images/Factions/Chono_picture.jpg" alt="Alpha Chono" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Ce sont des humanoïdes issus des canidés : Homme-chien, Homme-loup, Homme-renard,… </p>\r\n        <p>À la base des humains victimes des premières expérimentations Sihir, les Chonos sont un premier essai qu'on pourrait qualifier de raté. Les Sihirs souhaitaient des esclaves plus physiques et dociles, ils ont créé des bêtes sauvages assoiffés de sang.</p>\r\n        <p>Les Chonos souffrent d'une pathologie génétique les rendant incompatible avec la magie dont sont composés les Sihir, s'ils entrent en contact avec une manifestation magique issue de Karnaï, ils entrent dans une rage primordiale qui ne prend fin qu'à la perte de connaissance du Chono.</p>\r\n        <p>Les Sihir auraient dû exterminer cette espèce incompatible avec la leur mais cela serait revenu à admettre leur échec, ils mirent donc au point un talisman de virgonium, un métal aux propriétés anti-magiques extrêmement difficile à manipuler pour des êtres fait de magie et les implantèrent directement dans le front des Chono pour qu'ils ne puissent pas avoir recours à la rage primordiale.</p>\r\n    </div>\r\n    <!--suppress GrazieInspection, GrazieInspection -->\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Les Chonos sont nomades, ils vivent en groupes de taille très variables, les plus petits rassemblent quelques familles, les plus grandes dépassent les vingt mille individus. Les petits groupes vivent principalement de chasse et de cueillette tandis que les plus grands pillent les granges des fermiers pour se procurer de la nourriture.</p>\r\n        <p>Ce sont des guerriers redoutables et belliqueux, il n'est pas rare de voir deux hordes s’entre-tuer. Les plus grandes hordes ne laissent généralement qu'horreur et désolation après leur passage, bien peu de villes sont capables de résister à leurs assauts.</p>\r\n        <p>À la tête de chaque horde se trouve un ou une Alpha décidant de tout, tout Chono possède le droit de défier l’Alpha dans un combat singulier.</p>\r\n        <p>Certains Chonos regrettent leurs origines bestiales et vont jusqu’à s’arracher volontairement leur talisman et embrassent alors la rage primordiale, on les appelle les Berserk.</p>\r\n        <p>Les talismans d’anti-magie sont toujours fabriqués et donnés aux nouveaux-nés. Ce sont les forgerons qui les fabriquent mais ils ne sont pas aussi solides que ceux crées par les Sihir d'autrefois.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Les hordes n'entretiennent pas de relation particulière avec les autres factions, si ce ne sont les raids et pillages qu'elles effectuent et les rares opérations de vendetta ayant lieu suite à des raids trop fructueux.</p>\r\n        <p>Quelques Chonos lassés des pillages se laissent tentés par l'appel de l'aventure et quittent leur horde pour explorer la civilisation. D'autres ont été laissés pour mort après un affrontement entre hordes et cherche la redemption par la vengeance.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Chonos sont des combattants inégalés aux sens de prédateurs, ils obtiennent un d8 en force, agilité et vigueur ainsi qu'un d10 en perception. Ils souffrent cependant d'un intellect et d'une capacité de communication inférieurs aux autres origines, ils subissent un d4 en intelligence et éloquence.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Les Chonos ont une croissance plus rapide que les humains, un individu termine sa croissance aux alentours de ses 12 ans et reste au pic de sa puissance jusqu'à ses 35 ans. Ils ne survivent guère plus longtemps parmi la horde, même s'ils rejoignent la civilisation les Chonos meurent autour des 50 ans.</p>\r\n        <p><span class="big_underline" id="rage">Rage primordiale</span>Si un Chono entre en contact avec de la magie, il doit réussir un jet de Volonté DC 6 en l'absence du pendentif de Virgonium. Si le jet est un échec, le personnage subit un trauma et perd tout contrôle et attaque tout individu se trouvant à proximité. Cet état n'est interrompu que par une période prolongée de calme (sommeil, perte de connaissance, etc..).</p>\r\n        <p><span class="big_underline">Chasseur hors-pair</span>Les Chonos possèdent la <a href="../Rules/Glossaire.php#vision_nocturne">Vision Nocturne</a> et peuvent relancer un jet de Perception raté une fois par jour. Ils possèdent également un <a href="../Rules/Glossaire.php#estomac_solide">Estomac Solide</a>.</p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Chonos savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d6).</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Chonos parlent le Nokoï mais ne savent ni écrire ni lire pour la plupart. Les quelques Chonos vivants parmi la civilisation ont adopté la langue de la région.</p>\r\n    </div>\r\n    <!--suppress GrazieInspection -->\r\n    <div>\r\n        <h3>Noms Chonos</h3>\r\n        <p>Les Chonos n'ont pas de nom de famille, ils appartiennent à la horde, un nom leur est donné à la naissance mais ils s'en forgent rapidement un nouveau au combat.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Dez, Ruzz, Ezzyk, Rurg, Kroc, Raxet, Grarg, Thirkat, Ruhir, Giak, Ukx, Xyrr, Gheryrrg, Xorrok, Trox, Tyrir</p>\r\n        <p><span class="big_underline">Noms Féminins</span>Sny, Tris, Srhyn, Khy, Yrth, Tsia, Zahr, Snora, Dysh, Irgirt, Hyle, Muzno, Hiar, Tserta, Nuissir, Seth </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Chonos lors d'un raid</h4>\r\n        <img src="/images/Factions/Chono_raid.jpg" alt="Raid Chono" width="60%"/>\r\n        <h4>Chono loup</h4>\r\n        <img src="/images/Factions/Chono_wolf.jpg" alt="Chono loup" width="50%"/>\r\n        <h4>Chono hyène</h4>\r\n        <img src="/images/Factions/Chono_hyena.jpg" alt="Chono hyene" width="55%"/>\r\n    </div>
14	6	0	Les Kantas	1	\N	f	<img src="/images/Factions/Kanta_picture.jpg" alt="Matriarche Kanta" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Ce sont les plus imposantes créations Sihir. Issus des ursidés, les Kanta possèdent une endurance et une force à toute épreuve. Leur taille est très variable, allant d'un mètre cinquante pour les Kantas issus des panda et ours noir, jusqu'à trois mètres pour ceux issus des ours blancs et bruns. Ils sont également extraordinairement lourds pour des humanoïdes, de 150 à 500kg. Leur épaisse fourrure les protège du froid et peut faire office d'armure de fortune</p>\r\n        <p>Ils sont troisième origine bestiale à voir le jour suite aux expériences des Sihir, ils devaient remplacer les Chonos, mais la fortitude des uns et la volonté de survie des autres rendirent impossible ce remplacement. Les Kanta ne se soumirent pas si facilement et cela força les Sihir à limiter leur population.</p>\r\n        <p>Les Kanta se sont isolés sur des îles où personne ne souhaitait s'installer pour ne plus avoir de contact avec le reste du monde. Ils vivent dans la taïga de Diamant au nord d'Antoraï, et dans les plaines silencieuses à l'ouest de Nashira pour la plupart.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Les Kanta sont sages et patients, ils préfèrent la parole au conflit. Ils vivent en communautés dirigées par la plus ancienne Kanta de la tribu. Si la communauté devient trop importante, les membres les plus jeunes doivent partir et en créer une nouvelle.</p>\r\n        <p>Ils mènent ainsi une vie paisible, éloigné de tout les conflits du monde. Les archives Azumas ne mentionne presque jamais les Kanta tant ils sont discrets dans la politique mondiale.</p>\r\n        <p>Contrairement aux rumeurs, les Kantas n'hibernent pas.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Ils n'entretiennent que peu de relations avec le reste du monde, quelques fois un messager vient pour demander l'aide et la sagesse de la matriarche. Se voir attribuer ce genre de missions est un grand honneur car rencontrer une matriarche est une histoire que l'on peut conter au coin du feu à ses petits enfants.</p>\r\n        <p>Les Kantas hors de leurs communautés sont rares, mais ils existent, certains sont trop curieux et décident de partir seul pour explorer le monde. Ils ne passent pas inaperçus dans les tavernes au vu de la quantité de nourriture qu'ils peuvent absorber.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Kantas sont puissants et endurants, ils obtiennent un d10 en force et un d12 en vigueur. Leur masse rend leur démarche lourde, et leur grosse patte les empêchent d'accomplir des tâches précises, ils subissent un d4 en agilité et dextérité.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Ce sont les représentants des origines bestiales les plus endurants aux ravages du temps si l'on exclue les Sarpas. Un Kanta est considéré comme adulte par ses pairs à l'âge de 30 ans, on reconnait sa maturité à 60 et sa sagesse à 90. Les Kantas s'éteignent 120 ans après leur venue au monde.</p>\r\n        <p><span class="big_underline">Fourrure épaisse</span>Les poils et la graisse des Kantas leur accorde une <a href="../Rules/Glossaire.php#resistance">Résistance(Froid, 3)</a> et le trait <a href="../Rules/Glossaire.php#robuste">Robuste(1)</a> .</p>\r\n        <p><span class="big_underline">Imposante stature</span>Les kanta dominent les autres peuples en termes de carrure, ce sont des créatures de <a href="../Rules/Gabarit.php#gabarit_creatures">Gabarit</a> G. Ils possèdent également un <a href="../Rules/Glossaire.php#estomac_solide">Estomac Solide</a>.</p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Kantas savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d8).</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Kantas peuvent parler, écrire et lire le Balkrunn et parlent parfois le Gortrell puisqu'ils leur arrivent d'en rencontrer des êtres l'utilisant dans les contrées lointaines.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Kantas</h3>\r\n        <p>Les noms Kanta ne sont pas significatifs, ils n'ont pas de nom de famille comme les autres origines bestiales. Leur nom est l'unique chose à laquelle leurs pairs font référence pour s'adresser à eux.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Osrong, Kyudda, Jonehn, Jotang, Ohahn, Takkon, Masum, Hakosh, Ingoll, Sedda, Okish </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Mefali, Atesim, Shohe, Sirsu, Amoha, Ishibi, Logeru, Phelethi, Fethin, Lahni, Thenra </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Guerrier Kanta</h4>\r\n        <img src="/images/Factions/Kanta_guerrier.jpg" alt="Guerrier Kanta" width="50%"/>\r\n        <h4>Village Kanta</h4>\r\n        <img src="/images/Factions/Kanta_village.jpg" alt="Village Kanta" width="90%"/>\r\n    </div>
15	7	0	Les Mushuks	1	\N	f	<img src="/images/Factions/Mushuk_picture.jpg" alt="Capitaine Mushuk" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Ce sont des humanoïdes issus des félins : Homme-chat, Homme-lion, Homme-tigre,...</p>\r\n        <p>Ils sont plus légers que les Chonos mais pas vraiment plus petits, ce ne sont pas des brutes comme eux non plus, ils préfèrent user de leur langue aiguisée si habile pour marchander. Ils sont également nyctalopes et ont une bonne ouïe.</p>\r\n        <p>Ils ont été la deuxième origine créée par les Shir, ils ne possèdent pas la même capacité musculaire que les Chono mais ne sont pas intolérants à la magie, leur permettant d'accomplir des tâches impossibles pour les Chonos. Parmi ces nouvelles tâches, la plus importante était sûrement l'exploration marine, les Sihir ne voulaient pas se risquer dans l'océan, ils envoyaient donc des expéditions de Mushuk et restaient en contact par magie.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Les Mushuks se rassemblent dans des villages côtiers, ils sont présents sur presque toutes les côtes du monde, si l'on sait où chercher.</p>\r\n        <p>Ils ont conservés leurs techniques de marins et sont d'excellents charpentiers navaux. Il n'est pas rare de voir des expéditions navales entièrement composées de Mushuks tant ils sont habiles.</p>\r\n        <p>Les Mushuk s'organisent en ligues marchandes, ils sont constamment à la recherche de nouveaux contrats et les différentes ligues se livrent une concurrence commerciale sans fin. Certaines sont mêmes devenues hors-la-loi en ne respectant pas le pacte de la Griffe.</p>\r\n        <p>Les Mushuks sont aussi cupides que les Steinn, l'appât du gain peut leur faire perdre la raison, ils sont extrêmement joueurs et ne réfléchissent pas deux fois avant de faire une affaire fructueuse.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>La plupart des marchands du monde reposent sur un approvisionnement naval, c'est pourquoi la majorité des factions souhaitent à tout prix conserver de bonnes relations avec les différentes ligues marchandes</p>\r\n        <p>Les Mushuks ont toujours eu le désir de partir en exploration, c'est pourquoi bon nombre d'entre eux ne travaillent pas pour les ligues et préfèrent voguer où le vent les poussent, les aventuriers Mushuks sont monnaie courante et sont très appréciés car ils rapportent souvent des marchandises exotiques et n'hésitent pas à les échanger contre de l'or.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Mushuks sont agiles et éloquents mais sont souvent peureux, ils obtiennent un d10 en agilité, un d8 en éloquence et en perception mais subissent un d4 en volonté.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Les Mushuks possèdent une durée de vie étonnante étant donné leur croissance rapide. Ils deviennent des adultes à 15 ans, des marchands avisés à 30 et des sages à 50. Leur étincelle de vie s'éteint à 65 ans. </p>\r\n        <p><span class="big_underline">Héritage félin</span>Les yeux des Mushuks peuvent se fendre en amande en cas de faible luminosité, ce qui leur accorde une <a href="../Rules/Glossaire.php#vision_nocturne">vision nocturne</a>. Ils ne subissent que la moitié des dégâts dûs aux chutes. Ils possèdent également un <a href="../Rules/Glossaire.php#estomac_solide">Estomac Solide</a>.</p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Mushuks savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d6).</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Mushuks savent parler, écrire et lire l'Igaraï, mais la plupart savent au moins parler une autre langue selon avec qui ils commercent (voir <a href="../World/Histoire_Ogma.php#langages">Langages</a>).</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Mushuks</h3>\r\n        <p>Les Mushuks n'avait pas de nom avant de se libérer du joug des Sihir, ils ont décidés d'en adopter, mais n'ayant pas de racines ou d'origines particulières, ils décidèrent de copier les Azumas et d'y appliquer leur propre patte. Ils choisirent de ne pas garde le concept de nom de famille, ils se considèrent plus ou moins comme une seule et même fratrie.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Katsuo, Akira, Sake, Kioko, Nobu, Nicarr, Taiko, Chakar, Shiro, Naoki, Koji, Jiro, Isamu</p>\r\n        <p><span class="big_underline">Noms Féminins</span>Haru, Kyo, Oki, Hikaru, Mako, Shizumi, Chaneni, Sayuri, Hatyna, Xemiss, Miki, Keiko, Miyoshi </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Guerrier Mushuk</h4>\r\n        <img src="/images/Factions/Mushuk_warrior.jpeg" alt="Guerrier Mushuk"/>\r\n        <h4>Ville Mushuk</h4>\r\n        <img src="/images/Factions/Mushuk_port.jpg" alt="Port Mushuk" width="95%"/>\r\n        <h4>Cache de contrebandiers Mushuks</h4>\r\n        <img src="/images/Factions/Mushuk_base.jpg" alt="Base Mushuk" width="90%"/>\r\n    </div>
16	8	0	Les Tribus Sakha	1	\N	f	<img src="/images/Factions/Sakha_picture.jpg" alt="Chaman Sakha" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Enfants des arbres, les Sakha sont apparus suite au Grand Cataclysme. Ils sont liés à Kormo, l'Inkarnaï des forêts</p>\r\n        <p>Ils ne sont pas aussi solide et grands que leurs ancêtres boisés, mesurant en moyenne un mètre cinquante pour moins de quarante kilos, ils ont la peau sombre pour pouvoir se fondre dans l'obscurité des arbres</p>\r\n        <p>Ils ont toujours été discrets, se dissimulant au plus profond des forêts de ce monde. Il est possible de passer toute une vie dans la forêt sans jamais les apercevoir. La forêt Éternelle abriterait l'Arbre Maison, un arbre gigantesque haut de plusieurs centaines de mètres.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>On sait peu de choses sur les Sakhas, il s'agit d'un peuple mystérieux, vivant constamment cachés, les quelques membres ayant rejoint la civilisation ne parlent presque jamais de leur façon de vivre.</p>\r\n        <p>Les Sakha protègent les forêts, ce sont à la fois leur maison et leurs ancêtres. Elles leur fournissent un lien puissant avec Karnaï, ce qui leur permet de lancer plus facilement des sortilèges, quand ils en sortent, le lien s'estompe et il leur est alors difficile d'avoir recours à la magie.</p>\r\n        <p>Ils vivent en petits groupes, occupants des habitations en harmonie avec la forêt, être l’hôte d’un clan de Sakha est un privilège que peu peuvent se vanter d’avoir eu.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations avec les autres factions/origines</h3>\r\n        <p>Ils sont presque devenus des créatures de légendes de par le manque de contact avec la civilisation humaine.</p>\r\n        <p>On dit que les meilleurs espions du monde sont des Sakha mais rares sont ceux pouvant s’offrir leurs services.</p>\r\n        <p>Ils ne commercent que très peu, ils n'en éprouvent pas le besoin, certains marchands tentent de pénétrer dans les forêts dans l'espoir de pouvoir échanger une quelconque richesse contre un de leurs arcs qui sont réputés pour être les meilleurs du monde.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Sakhas sont incroyablement agiles et leur habileté est légendaire, ils obtiennent un d10 en agilité et en dextérité. Vivants en autarcie, ils ne sont pas habitués à parlementer avec les autres origines, ils subissent un d4 en éloquence.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>On ne sait que peu de choses sur l'espérance de vie des Sakhas, d'aucun pense qu'ils vivent plus longtemps que les humaines de par leur ascendance magique, les estimations varient mais la plupart s'accordent que leur croissance s'aboutit aux alentours des 25 ans et qu'ils maintiennent un état de forme durant une centaine d'années et déclinent rapidement après leur 130ᵉ anniversaire.</p>\r\n        <p><span class="big_underline">Peuple sylvestre</span>Les Sakhas sont faits pour vivre dans la forêt, ce sont des entités de <a href="../Rules/Gabarit.php#gabarit_creatures">Gabarit</a> P, possédant une <a href="../Rules/Glossaire.php#immunite">Immunité(Poison)</a> et un <a href="../Rules/Glossaire.php#estomac_solide">Estomac Solide</a>.</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Sakhas parlent naturellement le Sylvestre. Il arrive que des Sakhas vivent hors des forêts, auquel cas ils adoptent souvent un autre dialecte pour pouvoir communiquer (voir <a href="../World/Histoire_Ogma.php#langages">Langages</a>). </p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Sakhas</h3>\r\n        <p>Les enfants des bois n'ont que rarement recours à leur véritable nom, celui-ci ayant un caractère sacré lié à Kormo, ils préfèrent s'adresser à leurs pairs via un surnom choisis par le village. Ils n'ont pas de nom de famille.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Girgadoth, Ungoren, Bolwdor, Erasronor, Haymdus, Aengronir, Bravenin, Arawin, Errus, Nornim, Gwiros </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Aranael, Dagadra, Thiieneth, Naetene, Gelthia, Laenalin, Faliena, Wylaras, Dondweneth, Felgael, Andaelin </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Druide Sakha</h4>\r\n        <img src="/images/Factions/Sakha_picture2.jpg" alt="Druide Sakha" width="50%"/>\r\n        <h4>Village Sakha</h4>\r\n        <img src="/images/Factions/Sakha_village.jpg" alt="Village Sakha" width="90%"/>\r\n    </div>
17	9	0	Les Sarpas	1	\N	f	<img src="/images/Factions/Sarpa_picture.jpg" alt="Mages Sarpa" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Les plus fous des Sihir les ont créé en utilisant d'autres sihir comme sujets d'expérience, les Sarpa sont la cinquième et dernière origine bestiales.</p>\r\n        <p>Ils possèdent une peau écailleuse, une longue queue et ont le sang-froid comme les reptiles, ils ont besoin de chaleur pour survivre. Ils sont d'apparence variable, il s'agit de l'origine bestiale la plus diversifiée mais on distingue trois grands groupes : les Sarpas-lézards, les plus communs et les plus proches de Sihir d'un point de vue physique ; les Sarpas-serpents n'ont pas de jambes et se déplacent donc comme les serpents ; les Sarpas-crocodiles sont plus imposants que les autres Sarpas dépassant les deux mètres et les 400 kilogrammes.</p>\r\n        <p>Peu après leur création, la Grande Révolte éclata, ils ne subirent pas le massacre des Sihir mais vivent cachés depuis cet évènement de peur de subir le même sort.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Les Sarpas vivent rassemblés dans des cités souterraines et sont souvent soumis à la cruauté des sarpa les plus impitoyables. Ils ont développé un sens moral radicalement différent des peuples de la surface, chez eux le meurtre est un moyen comme un autre pour arriver à ses fins.</p>\r\n        <p>Les Sarpas comblent leur besoin en chaleur par l'usage de la magie, il n'est pas rare de les voir porter un objet enchanté générant de la chaleur. Ils se servent également de la magie pour produire de la lumière quand les grottes se fond trop profondes.</p>\r\n        <p>Certains Sarpas souhaitent rétablir la suprématie des Sihir et projettent de réduire en esclavage le reste du monde, ils se font appeler les Fils de l'Écaille.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Ils sont devenus légèrement paranoïaques depuis la Grande Révolte et de ce fait évitent les contacts avec les autres origines mais cette paranoïa n'est pas justifiée partout dans le monde. Les personnes les détestant autant que les Sihir sont rares et ils sont généralement vus comme d'autres victimes de la folie des Sihirs.</p>\r\n        <p>Certains d'entre eux sortent à la surface pour échapper à la barbarie de leurs pairs et tentent de vivre parmi les autres origines.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <span class="underline">Communs</span>\r\n        <p><span class="big_underline">Espérance de vie</span>Les Sarpas n'ont pas hérités de l'immortalité Sihir mais surpassent les humains dans ce domaine. Un Sarpa abouti sa croissance vers ses 50 ans, il accumule ainsi de l'expérience et est considéré mâture aux alentours de son premier siècle de vie. Après 180 ans, leur santé décline peu à peu et ils s'éteignent au crépuscule de leur second siècle de vie. </p>\r\n        <p><span class="big_underline">Sang-froid</span>Les Sarpas ne produisent pas naturellement de la chaleur, ils doivent s'exposer quotidiennement à une source de chaleur. Ils possèdent une <a href="../Rules/Glossaire.php#vulnerabilite">Vulnérabilité(Froid, 2)</a>. Ils possèdent également un <a href="../Rules/Glossaire.php#estomac_solide">Estomac Solide</a>.</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Sarpas savent parler, écrire et lire le Draconien. Les plus attachés à leur héritage sihir connaissent le Sihiräll. D'autres ont adoptés le dialecte utilisé dans les environs de leurs cités (voir <a href="../World/Histoire_Ogma.php#langages">Langages</a>).</p>\r\n\r\n        <span class="underline">Crocodiles</span>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Sarpas-Crocodiles sont beaucoup plus physiques que leurs pairs, ils obtiennent un d12 en force, d10 en vigueur et d8 en volonté. Leur corpulence les rend patauds et peu attentifs, ils subissent d4 en dextérité, agilité et perception.</p>\r\n        <p><span class="big_underline">Monstre écailleux</span>Les Sarpas-Crocodiles sont massifs et protégés par une couche d'écailles solide, ils possèdent le trait <a href="../Rules/Glossaire.php#robuste">Robuste(2)</a> et sont des créatures de <a href="../Rules/Gabarit.php#gabarit_creatures">Gabarit</a> G.</p>\r\n        <p><span class="big_underline">Prédateur aquatique</span>Les Sarpas-Crocodiles sont habiles dans l'eau, ils possèdent le trait <a href="../Rules/Glossaire.php#amphibien">Amphibien</a>. </p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Sarpas-Crocodiles savent se servir de leur queue et de leurs crocs pour se battre : Arme Naturelle(Queue/Crocs, 1d8).</p>\r\n\r\n        <span class="underline">Lézards</span>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Sarpas-Lézards sont habiles de leur main et sont capables de maintenir leurs sorts longtemps dans le plan réel, ils obtiennent un d8 en intelligence, volonté et dextérité.</p>\r\n        <p><span class="big_underline">Écailles</span>Les Sarpas-Lézards ont une peau recouverte d'écailles, ils possèdent le trait <a href="../Rules/Glossaire.php#robuste">Robuste(1)</a>. </p>\r\n        <p><span class="big_underline">Régénération</span>Les Sarpas-Lézards bénéficient d'une régénération à long terme de leurs membres perdus (un jour pour un doigt, une semaine pour une main, un mois pour un bras et deux pour une jambe) et lorsqu'ils récupèrent des blessures le test se fait avec une DC 2 et tout les paliers de 2 DR récupèrent d'une blessure supplémentaire.</p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Sarpas-Lézard savent se servir de leurs griffes et de leurs crocs pour se battre : Arme Naturelle(Griffes/Crocs, 1d6).</p>\r\n\r\n        <span class="underline">Serpents</span>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Sarpas-Serpents sont de puissants mages, ils obtiennent un d10 en intelligence et un d12 en volonté. Leurs bras sont courts et assez faibles, ils subissent un d4 en force. Leur corps serpentin n'est pas le plus pratique pour se déplacer rapidement, ils subissent 1d4 en agilité.</p>\r\n        <p><span class="big_underline">Écailles</span>Les Sarpas-Serpents sont couvert d'écailles, ils possèdent le trait <a href="../Rules/Glossaire.php#robuste">Robuste(1)</a>. </p>\r\n        <p><span class="big_underline">Héritage serpentin</span>Les Sarpas-Serpents bénéficient d'une vision thermique, ils sont capables de voir la chaleur dans le noir complet et sont des créatures <a href="../Rules/Glossaire.php#rampant">Rampantes</a>.</p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Sarpas-Serpents peuvent utiliser leurs crochets pour empoisonner leurs victimes : Arme Naturelle(Crochets, 1d4), Débilitant(5).</p>\r\n </div>\r\n    <div>\r\n        <h3>Noms Sarpas</h3>\r\n        <p>Les Sarpas ont pu développer leur propre culture, leurs noms ne font pas échos à celui des Sihir qui sont si harmonieux. Les Sarpas ont des noms difficiles à prononcer pour les gens ne parlant pas le Draconien.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Throx, Gazzik, Brakuknoxl, Iurlochusk, Arzuuzk, Chukxishk, Agoaszushk, Jikzioz, Goxotrusk, Bhushojasz, Gaxuathrozk </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Botegya, Iceja, Crixadrus, Jekkuh, Crexiknix, Othluju, Jix, Ogzesos, Asarso, Crenzoxas, Kenqu, Izajex </p>\r\n        <p><span class="big_underline">Noms de famille</span>Endoreseus, Casdes, Cayathees, Xermarush, Xemlus, Caclesh, Tiberdorees, Kaysareeth, Galdorus, Xernes</p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Fils de l'Écaille</h4>\r\n        <img src="/images/Factions/Sarpa_filsecaille.jpg" alt="Fils de l'Écaille" width="40%"/>\r\n        <h4>Ville souterraine</h4>\r\n        <img src="/images/Factions/Sarpa_ville.jpg" alt="Ville souterraine" width="95%"/>\r\n    </div>
18	10	0	Les Severs	1	\N	f	<img src="/images/Factions/Sever_picture.jpg" alt="Guerrière Sever" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Les Sever sont un peuple occupant la majeure partie de Nashira, ce sont des humains de grande taille dépassant pour la plupart le mètre quatre-vingt, leur peau est claire tout comme leurs cheveux, ils disposent d'une force physique impressionnante pouvant rivaliser avec celle des Chonos.</p>\r\n        <p>Ce peuple de guerriers éprouve un profond respect pour les exploits guerriers. L'ordre et la loi sont d'une grande importance pour eux, ils se battent dans l'honneur et pour la gloire.</p>\r\n        <p>Les Severs se font parfois tatouer des symboles sacrés par les mages. Ces tatouages sont jalousement gardés par les Severs, ils accordent des capacités extraordinaires.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>La société Sever s'articule autour des grandes cités dirigées par des jarls. Tous les villages entourants une ville appartiennent au jarl, la ville en elle-même est un lieu de commerce par lequel transite toutes sortes de marchandises venues des quatre coins du monde. Les nombreux fleuves de Nashira facilitent le transport des marchandises par bateau, chaque ville est construite autour d'un gigantesque port fluvial, maritime ou lacustre.</p>\r\n        <p>Les Severs sont des artisans de renom, nombre de leurs forgerons et maroquiniers sont connus à travers tout le continent. Ils n'égalent pas l'art des Steinn, mais leur prix sont bien plus raisonnables.</p>\r\n        <p>En cas de nécessité absolue, les jarls se réunissent pour choisir un roi qui les gouvernera jusqu'à la fin de la crise. Cela est déjà arrivé en de multiples occasions par le passé, le plus souvent ces crises sont déclenchées par des invasions Chonos.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Il est assez difficile de se déplacer en Nashira sans croiser des Severs, que ce soit une patrouille de gardes ou un village de paysans, bien heureusement, ils ne sont pas aussi agressifs que leur voisin canins du Sud. À moins d'être un bandit recherché, vous serez accueillis où que vous alliez.</p>\r\n        <p>Les villes Sever entretiennent des relations commerciales avec les autres factions humaines via la mer, ils commercent aussi avec les Nains du clan Rakaj vivants encore plus loin dans la chaîne d'Hortak. La cité de Norvar entretient des relations privilégiées avec les communautés Kanta des plaines silencieuses.</p>\r\n        <p>Nombreux sont les jeunes Sever voulant se forger un nom qui partent à l'aventure, ils sont souvent trop intrépides et causent une grande peine à leur famille.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Comme toutes les autres origines Humaines, les Severs peuvent augmenter leurs Caractéristiques par le biais de 3 améliorations de cran, au maximum 2 sur un même dé.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Étant des humains, les Severs peuvent espérer vivre 80 ans, cependant leurs traditions martiales leur ôte pour la plupart la vie avant d'atteindre cet âge vénérable. Du point de vue de la société, un Sever est adulte après son 15ᵉ hiver, il conservera son plein potentiel physique jusqu'au 50ᵉ après quoi sa force commence à décliner ce qui cause la mort au combat de nombreux Severs trop fiers pour voir les ravages du temps sur leur corps meurtris.</p>\r\n        <p><span class="big_underline">Rage du Combat</span>Quand un Sever est blessé, il ne pose pas le genou à terre, il se bat pour la gloire du combat ! Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et le trait <a href="../Rules/Glossaire.php#robuste">Robuste(1)</a> pendant un round. </p>\r\n        <p><span class="big_underline">Endurance humaine</span>Les humains sont naturellement endurants et ne laissent jamais tomber : Ne s'évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour </p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Sever savent parler, écrire et lire le Ralvakor. Ceux qui côtoient fréquemment les Steinn connaissent les rudiments du Steindarr.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Severs</h3>\r\n        <p>Les Severs ont souvent un surnom en plus de leur prénom et nom de famille. Ils acquièrent ce surnom au cours des batailles et des aventures qu'ils vivent.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Grim, Jovar, Bjorn, Guthorm, Haenir, Galdur, Stigur, Vilhelm, Oddvar, Otto </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Aslaug, Inga, Nina, Hilde, Valka, Drifa, Gervif, Erika, Meja, Gyrid, Sofie </p>\r\n        <p><span class="big_underline">Noms de famille</span>Bergstrom, Ahlander, Brodd, Morner, Bergh, Hedenstam, Hellberg, Rusnak, Urusov, Huso, Morgensen </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Guerrier Sever</h4>\r\n        <img src="/images/Factions/Sever_picture2.jpg" alt="Guerrier Sever" width="50%"/>\r\n        <h4>Village Sever</h4>\r\n        <img src="/images/Factions/Sever_village.jpg" alt="Village montagnard Sever" width="90%"/>\r\n        <h4>Ville Sever</h4>\r\n        <img src="/images/Factions/Sever_ville.jpg" alt="Ville fluviale Sever"/>\r\n    </div>
19	11	0	Les Sihirs	1	\N	f	<img src="/images/Factions/Sihir_picture.jpg" alt="Mage Sihir" height="600"/>\r\n\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Les Sihirs sont les premiers êtres intelligents à avoir foulé le sol d'Ogma. Ils sont nés suite au Grand Cataclysme, ils en sont sa manifestation la plus pure. On raconte que ce sont des descendants d'Inkarnaïs car les ravages du temps n'ont aucuns effets sur eux.</p>\r\n        <p>Ils ont les traits fins et la peau bleutée d'un ton variant selon les individus, allant du bleu presque blanc jusqu'au bleu si sombre qu'il paraît noir. Leur stature est haute mais frêle, ils sont plus grands que les Sever mais sont beaucoup plus minces.</p>\r\n        <p>Ils régnait autrefois sur Ogma grâce à leur maîtrise de la magie, ils ont bâti la fabuleuse cité Jikaï au cœur du cratère créée par le météore leur ayant donné la vie. Ils ont asservi les humains alors qu’ils n’étaient encore que des êtres primitifs, leur ont fait subir des expériences atroces qui ont donné vie aux origines bestiales.</p>\r\n        <p>Les esclaves se sont retournés contre leurs maîtres lors de la Grande Révolte et depuis ce jour, les Sihir sont chassés et haï de tous. Leur savoir a été perdu dans sa quasi-totalité, la cité Sihir est devenu un lieu instable magiquement, les sujets d’expériences ratées se sont libérées et tous les trésors des Sihir sont restés à l’intérieur.</p>\r\n        <p>Les Sihir ne sont plus qu’un peuple en lambeaux, décimés par leur propre ambition de dominer le monde. Nul ne sait où se cachent les Sihir, ce genre d'information vaut son pesant d'or tant la haine envers eux est encore brûlante</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Ce peuple n'avait pas de véritable chef, les mages les plus puissants étaient respectés, tandis que les autres négligés, c'était en quelque sorte la loi du plus fort qui régnait. Ce code moral peut être retrouvé chez les Sarpas qui l'ont perpétué depuis la fin de l'âge Sihir.</p>\r\n        <p>Les Sihir vivaient dans l'opulence avant leur déclin, leurs esclaves faisaient tout à leur place. La Grande Révolte les a poussés à se cacher dans la nature, l'usage de la magie s'est fait plus rare. À cause de l'isolement et de la destruction de leur cité, les mœurs des Sihir ont peu à peu disparu au cours des âges, il ne subsiste aujourd'hui que quelques coutumes que bien peu connaissent.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Les survivants vivent cachés car même s'ils n’ont pas forcément participé aux atrocités commises par leurs pairs, la haine envers les Sihir est trop forte pour la plupart des habitants d’Ogma. Certaines personnes ayant vraiment besoin de leur habilité magique ont parfois recours à leurs capacités dans l'espoir de pouvoir sauver un proche d'un destin funeste ou de conquérir le monde à leurs côtés.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Sihirs sont les maîtres de la magie et de beaux parleurs, ils obtiennent un d10 en intelligence et volonté et un d8 en éloquence. Leurs capacités physiques et leur endurance sont cependant limitées, ils subissent un d4 en force et en vigueur.</p>\r\n        <p><span class="big_underline">Héritage Karnarim</span>Les Sihirs seraient une manifestation physique des Inkarnaïs selon les légendes, le lien qu'ils possèdent avec Karnaï est quant à lui incontestable, ils possèdent une spécialisation dans un domaine de Karnaï pour toutes les compétences pouvant l'être et sont <a href="../Rules/Glossaire.php#immortel">Immortels</a>. </p>\r\n        <p><span class="big_underline">Sensibilité magique</span>Ce lien avec Karnaï est à double tranchant, ils possèdent le trait <a href="../Rules/Glossaire.php#vulnerabilite">Vulnérabilité(Magique,3)</a> et le trait <a href="../Rules/Glossaire.php#absorption_magique">Absorption Magique(3)</a>.</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Sihirs savent parler, écrire et lire le Sihiräll et au moins un autre dialecte, celui utilisés à proximité de l'endroit où ils se cachent.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Sihirs</h3>\r\n        <p>Les Sihirs ont des noms très harmonieux, mélodieux. Leurs noms nobles accentuent encore plus leur comportement hautain.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Les Sihirs sont immortels mais leur croissance est courte comparé à leur durée de vie moyenne. Il ne leur faut qu'un siècle pour obtenir un corps d'adulte, cependant ils ne sont pas considérés comme tel avant d'avoir vécu au moins 3 siècles. Leur respect de leur pairs leur parvient après un millénaire d'expérience. </p>\r\n        <p><span class="big_underline">Noms Masculins</span>Phraan, Aquilan, Elluin, Ilbryen, Elaith, Saelethil, Aumanas, Sihnion, Simimarr, Ardryll, Vaalyun, Alaion </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Elea, Ysildea, Haera, Eirina, Irhaal, Jastira, Shaerra, Elora, Nimeroni, Shalaeva, Aerith, Helartha </p>\r\n        <p><span class="big_underline">Noms de famille</span>Olavalur, Iarrona, Waesberos, Ravamys, Eiltoris, Krisren, Valaris, Naefina </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Mage Sihir</h4>\r\n        <img src="/images/Factions/Sihir_picture2.jpg" alt="Mage Sihir" width="60%"/>\r\n        <h4>Jikaï</h4>\r\n        <img src="/images/Factions/Sihir_ville.jpg" alt="Jikai" width="90%"/>\r\n    </div>
20	12	0	Les Steinns	1	\N	f	<img src="/images/Factions/Steinn_picture.jpg" alt="Noble Steinn" height="600"/>\r\n    <div>\r\n        <h3>Description Physique</h3>\r\n        <p>Ils sont nés de la pierre, ce sont les gardiens des montagnes. Les Steinns sont des êtres de petite taille ne dépassant pas le mètre quarante mais de constitution robuste, ils aiment arborer leurs longues barbes tressées</p>\r\n        <p>On raconte qu'un conflit entre deux frères de la famille royale serait à l'origine de la scission des Steinn, créant deux clans portant le nom du frère choisis comme légitime, ils forment depuis deux peuples bien distincts. Le clan Khazun dans les Monts Ardents au Nord d'Antoraï et le clan Rakaj au Nord de Nashira de la chaîne d’Hortak.</p>\r\n        <p>Les Steinns n’utilisent que rarement la magie de manière conventionnelle, ils préfèrent la manier sous sa forme physique. Les Grumdarr, à la fois prêtre et artisan, effectuent des rituels en communion avec Ourgal pour imprégner de karnyx leurs créations. Ces objets sertis de cristaux permettent diverses choses selon la façon dont ils ont étés créés, certains s'embrasent, d’autres gèlent.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Les deux clans sont d’excellents artisans, même les Sever ne peuvent rivaliser avec eux, leur longue durée de vie couplée à leur accès aux matières premières leur permet d’accumuler une expérience incomparable avec celle des autres artisans non-Steinn.</p>\r\n        <p>Les cités Steinndarr sont creusées dans les montagnes, reliées entre elle tantôt par des routes dotées de ponts majestueux, tantôt par des passages souterrains.</p>\r\n        <p>Le clan Rakaj est mené par l’ingénieur élu comme étant le meilleur du clan au cours d’un concours ayant lieu tous les 5 ans, le clan Khazun a quant à lui conservé son système oligarchique où les grandes familles nobles se disputent le pouvoir, menant le clan à d’incessantes guerres civiles.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Le clan Rakaj commerce avec les Sever mais nombreux sont ceux qui viennent directement commander une pièce aux maître-artisans.</p>\r\n        <p>L’instabilité du clan Khazun rend toute relation avec d’autres factions impossible, les batailles incessantes entre les Steinn et les Tuskizis pour mines de pierres précieuses du bois de cristal en sont un parfait exemple.</p>\r\n        <p>Les Steinns sont assez rares en dehors de leurs cités de pierre, ce sont souvent des marchands itinérants ou des guerriers trop avides de batailles.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Steinns sont robustes, forts et de bons artisans, ils obtiennent un d10 en vigueur et un d8 en force et dextérité. Leur corps de pierre les rend moins agiles que les autres origines, ils subissent un d4 en agilité.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Leur corps sculté par Ourgal résiste aux dégâts du temps, les Steinns vivent jusqu'à 250 ans, sont des anciens parmis les leurs après deux siècles passés à arpenter les mines, des Steinns mâtures et respectés après 100 ans d'artisanat, et deviennent adulte 50 ans après leur naissance. </p>\r\n        <p><span class="big_underline">Vision souterraine</span>Les Steinns ont passés beaucoup de temps à creuser la pierre dans des galeries sombres, ils ont obtenu la capacité <a href="../Rules/Glossaire.php#vision_nocturne">vision nocturne</a>.</p>\r\n        <p><span class="big_underline">Taillé dans le Roc</span>Les Steinns sont créés à partir de roche avant de devenir des êtres vivants, ce sont des entités de <a href="../Rules/Gabarit.php#gabarit_creatures">Gabarit</a> P possédant le obtiennent le trait <a href="../Rules/Glossaire.php#robuste">Robuste(1)</a>. </p>\r\n        <p><span class="big_underline">Froideur d'Hortak</span>Le clan Rakaj vit dans les montagnes enneigées de la chaîne d'Hortak, ils obtiennent le trait <a href="../Rules/Glossaire.php#resistance">Résistance(Froid, 3)</a>.</p>\r\n        <p><span class="big_underline">Chaleur des Monts Ardents</span>Le clan Khazun vit dans les volcans d'Antoraï, ils obtiennent le trait <a href="../Rules/Glossaire.php#resistance">Résistance(Feu, 3)</a>.</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Steinns savent parler, écrire et lire le Steindarr. Une partie du clan Rakaj connait les bases du Ralvakor et une partie plus petite encore du clan Khazun parle l'Ashraï.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Steinns</h3>\r\n        <p>Les Steinns sont fiers de leurs noms, que ce soit le leur, ou celui de leur famille, ils aiment lui faire honneur en accomplissant de grandes choses. Il n'est pas rare de voir un Steinn porter un surnom selon sa profession. Les noms de famille Steinn sont souvent dû à un acte héroïque accomplit par un aïeul.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Bhaklour, Strosgrum, Elrbok, Bamnuil, Dwelo, Torek, Ozzorlim, Naldrog, Haldric, Dhufrun, Nudurim </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Anmaesli, Dalomneala, Throsatrud, Dhossosli, Snasseala, Barinubo, Hulmikara, Yoghitryd, Glaferra </p>\r\n        <p><span class="big_underline">Noms de famille</span>Arlban, Gorosten, Folmas, Gorver, Saelac, Arrat, Durka, Alcan</p>\r\n        <p><span class="big_underline">Surnoms</span>Crâne-de-fer, Mine-lave, Barbe-de-feu, Poing-de-pierre, Marteau-sanglant, Brise-corne, Dent-givrée </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Ville du clan Rakaj</h4>\r\n        <img src="/images/Factions/Steinn_Rakaj_ville.jpg" alt="Ville Rakaj" width="95%"/> <br/> <br/>\r\n        <h4>Ville du clan Khazun</h4>\r\n        <img src="/images/Factions/Steinn_Khazun_ville.jpg" alt="Ville Khazun" width="90%"/>\r\n    </div>
21	13	0	Les Toris	1	\N	f	<img src="/images/Factions/Tori_picture.jpg" alt="Moine Tori" height="600"/>\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Ce sont des humanoïdes issus des oiseaux : Homme-aigle, Homme-ara, Homme-chouette,... Ils possèdent des ailes et sont capables de voler sur de grandes distances</p>\r\n        <p>Ils sont la quatrième origine bestiale créée par les Sihir, ils devaient accomplir des tâches complexes irréalisables par les autres origines bestiales. Depuis la Grande Révolte ils se sont dispersés à travers le monde et se déplacent sans cesse. </p>\r\n        <p>Les Toris sont des poètes, des colporteurs de légendes, des conteurs, des musiciens, ils apportent la joie et la bonne humeur partout où ils passent. Ils sont très habiles avec la magie et apprécient accompagner leurs histoires et chansons d'une démonstration de leur talent.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Les Toris n'apprécient guère de rester en place trop longtemps, ils ne cessent de vagabonder de villes en villages. Ils accumulent de ce fait un grand savoir et le répande partout où ils passent.</p>\r\n        <p>Ils sont un peuple indépendant et pacifiste, ils n'apprécient pas de se battre pour rien. Ils n'en sont pas pour autant inoffensifs, ils maîtrisent des techniques de combat exploitant à merveille leurs capacités aviaires</p>\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>L'arrivée d'un Tori chez vous est généralement synonyme d'informations sur le reste du monde, ils apportent également avec eux nombre de chansons apprises au cours de leurs voyageurs.</p>\r\n        <p>Tout les Toris sont considérés comme des aventuriers par le commun des mortels, et tous apprécient de les entendre chanter.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Les Toris sont des poètes itinérants, ils obtiennent un d10 en éloquence et un d8 en agilité.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Leur constitution ne permet pas aux Toris de vivre très longtemps, ils atteignent l'âge adulte après leur 15ᵉ printemps, sont devenus des puits de savoir à leur 30ᵉ anniversaire et déclinent physiquement après leur 60ᵉ printemps pour s'éteindre après 65 ans à arpenter le monde. </p>\r\n        <p><span class="big_underline">Héritage Aviaire</span>Les Toris sont dotés d'ailes puissantes et savent s'en servir peu après leur naissance, ils possèdent le trait <a href="../Rules/Glossaire.php#volant">Volant(Vitesse*2)</a>. Ils possèdent également un <a href="../Rules/Glossaire.php#estomac_solide">Estomac Solide</a></p>\r\n        <p><span class="big_underline">Beau parleur</span>Les Toris savent trouver les mots justes, ils peuvent relancer un jet d'éloquence raté une fois par jour.</p>\r\n        <p><span class="big_underline">Armes Naturelles</span>Les Toris savent se servir de leurs serres et de leur bec pour se battre : Arme Naturelle(Bec/Serres, 1d6).</p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Toris savent parler, écrire et lire le Payaritt et deux autres langues <a href="../World/Histoire_Ogma.php#langages">au choix</a>.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Toris</h3>\r\n        <p>Les Toris n'ont pas de noms de famille comme les autres origines bestiales, ils possèdent tous un surnom unique qu'ils obtiennent au cours de leurs voyages, souvent donnés par les enfants écoutant leurs chansons. Leurs noms de naissance sont unisexes.</p>\r\n        <p><span class="big_underline">Noms Toris</span>Cref, Qhi, Aiakerrk, Ekkac, Kis, Krurrel, Kha, Yif, Acic, Oocarrk, Khef, Klecarc, Qoor, Clil, Aial, Rukkaak, Griccec, Uss, Dag, Aerk, Krires </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Guerrier Tori</h4>\r\n        <img src="/images/Factions/Tori_picture2.jpg" alt="Guerrier Tori" width="70%"/>\r\n    </div>
22	14	0	Les Tuskizis	1	\N	f	<img src="/images/Factions/Tuskizi_picture.jpg" alt="Citoyen du Sultanat" height="600"/>\r\n    <div>\r\n        <h3>Présentation</h3>\r\n        <p>Ce sont les humains vivant sur Antoraï, ils ont la peau et les cheveux sombres. Ils occupent presque l'intégralité du sud d'Antoraï, leur territoire s'étend des Terres Écarlates jusqu'aux Bois de Cristal disputé avec le clan Khazun.</p>\r\n        <p>Les plus grandes villes du Sultanat sont situées sur le littoral d'Antoraï. Quelques tributs nomades parcourent les Terres Écarlates et commercent entre les villages intra-désertiques. Hebsys, Ishta et Akhrun sont trois villes portuaires gigantesques construites sur l'eau à l'embouchure de trois fleuves différents. D'autres villes situées à l'intérieur des terres sont consacrées principalement à l'agriculture permettant de subvenir aux besoins des trois villes majeures.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Société</h3>\r\n        <p>Le dirigeant des Tuskizi est un sultan, le trône revient à son fils lors de la mort du souverain. Le sultan gouverne depuis son palais à Ishta, tandis que des personnes de confiance qu'il a lui-même nommés s'occupent de la gérance des autres villes du sultanat, ce sont les vizirs.</p>\r\n        <p>Le sultanat possèdent les mines de pierres précieuses du Bois de Cristal, disputés avec les nains du clan Khazun.</p>\r\n        <p>La majeure partie des habitants du sultanat sont des Tuskizis mais il n'est pas rare de voir des Mushuks ou même des Chonos posséder le statut de citoyen du sultanat.</p>\r\n\r\n    </div>\r\n    <div>\r\n        <h3>Relations</h3>\r\n        <p>Les soldats du sultanat sont sans cesse sur le qui-vive à la frontière Nord, le clan Khazun ayant des vues sur leurs mines</p>\r\n        <p>Le Sultanat profite également de son accès à la mer pour échanger leurs gemmes et autres marchandises exotiques aux autres factions humaines.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Traits</h3>\r\n        <p><span class="big_underline">Caractéristiques</span>Comme toutes les autres origines Humaines, les Tuskizis peuvent augmenter leurs Caractéristiques par le biais de 3 améliorations de cran, au maximum 2 sur un même dé.</p>\r\n        <p><span class="big_underline">Espérance de vie</span>Résilients aux climats comme au temps, les Tuskizis vivent en moyenne un siècle entier avant de s'éteindre, ils sont considérés comme des adultes responsables après leur 15ᵉ anniversaire, comme des adultes mâtures après 40 de services auprès du Sultanat et des êtres avisés 75 ans après leur naissance.</p>\r\n        <p><span class="big_underline">Poussée d'Adrénaline</span>Un Tuskizi ne se laisse jamais abattre et se battra jusqu'à la fin : Après avoir subi une blessure, un niveau de fatigue ou un trauma, la prochaine action se fait avec un avantage et les tests d'esquive se font avec un bonus de 2 pendant un round.</p>\r\n        <p><span class="big_underline">Endurance humaine</span>Les humains sont naturellement endurants et ne laissent jamais tomber : Ne s'évanouit pas après un jet de Vigueur/Volonté négatif. Maximum 1 fois par jour </p>\r\n        <p><span class="big_underline"><a href="../World/Histoire_Ogma.php#langages">Langages</a></span>Les Tuskizis savent parler, écrire et lire l'Ashraï, certains habitants du sultanat parlent le Draconien pour communiquer avec les Sarpas, d'autres utilisent l'Igaraï lors des échanges avec les Mushuks.</p>\r\n    </div>\r\n    <div>\r\n        <h3>Noms Tuskizis</h3>\r\n        <p>Les Tuskizis ne sont pas comme les autres origines humaines, leur nom n'a pas de signification particulière, et celui de famille n'a pas d'autre fonction que d'indiquer la lignée de l'individu. Chez les Tuskizis, ce sont les actes qui définissent les gens et pas leur nom.</p>\r\n        <p><span class="big_underline">Noms Masculins</span>Abdalla, Selim, Haisam, Ishaq, Radames, Ashraf, Qaseem, Jaleel, Dakuri, Ozi </p>\r\n        <p><span class="big_underline">Noms Féminins</span>Miria, Nannosa, Alia, Zuleika, Aralu, Monireh, Ishtar, Nitza, Irit, Shirli </p>\r\n        <p><span class="big_underline">Noms de famille</span>Safar, Kattan, Asghar, Wasem, Nazari, Nasri, Sahnoun </p>\r\n    </div>\r\n    <div>\r\n        <h2>Galerie</h2>\r\n        <h4>Ville Tuskizi</h4>\r\n        <img src="/images/Factions/Tuskizi_ville.jpg" alt="Ville Tuskizi" width="90%"/>\r\n    </div>
6	2	0	La Grande Révolte	1	grande_revolte	t	<div>\r\n<p>Les si&egrave;cles d&#39;asservissement et de torture ont pouss&eacute; les origines humaines et bestiales &agrave; se rebeller face aux Sihir.</p>\r\n\r\n<p>On raconte que ses instigateurs &eacute;taient de grands mages capables de rivaliser avec les plus &eacute;minents Sihirs.</p>\r\n\r\n<p>Nombre de Sihirs furent massacr&eacute;s durant cette r&eacute;volte, les peuples s&#39;&eacute;tant lib&eacute;r&eacute;s de leur emprise se sont &eacute;parpill&eacute;s au quatre coins du monde et y ont &eacute;tablis diverses civilisations.</p>\r\n</div>
7	2	1	Origines du Monde	1	origine_monde	t	<div>\r\n<p>Nashira et Antora&iuml; n&#39;&eacute;taient &agrave; l&#39;origine qu&#39;un seul et m&ecirc;me continent, tellement grand qu&#39;on pouvait y voir toute sorte de climats, des jungles luxuriantes, des d&eacute;serts de sable et de pierres, des grandes plaines fertiles, des monts et volcans hauts &agrave; toucher le ciel.</p>\r\n\r\n<p>Des animaux de toutes sortes sont apparus au cours du temps, des centaines de millions d&#39;ann&eacute;es de tranquillit&eacute; ont &eacute;t&eacute; bris&eacute; par ce que l&#39;on appelle aujourd&#39;hui le Grand Cataclysme. Un gigantesque m&eacute;t&eacute;ore s&#39;&eacute;crasa sur la partie Est du super-continent, l&#39;impact fut tel qu&#39;il d&eacute;chira le monde en trois parties.</p>\r\n\r\n<p>L&#39;impact du m&eacute;t&eacute;ore d&eacute;truisit une grande partie du super-continent et souleva un nuage de poussi&egrave;re qui cacha la lumi&egrave;re des astres pendant plusieurs dizaines d&#39;ann&eacute;es. La faune et la flore furent perturb&eacute;s par ce manque de lumi&egrave;re et mirent des dizaines de milliers d&#39;ann&eacute;es &agrave; s&#39;en remettre.</p>\r\n\r\n<p>Le Grand Cataclysme a apport&eacute; la magie dans le monde et cela a donn&eacute; naissance des ann&eacute;es plus tard aux origines magiques, les Sihir, les Steinn et les Sakha.</p>\r\n</div>
5	2	2	Les Inkarnaïs	1	inkarnai	t	<div>\r\n<p>Le panth&eacute;on d&#39;Ogma est constitu&eacute; d&#39;&ecirc;tres de psych&eacute; pure vivant dans le plan de Karna&iuml; appel&eacute;s Inkarna&iuml;s, ils n&#39;ont pas de repr&eacute;sentation physique dans le plan r&eacute;el.</p>\r\n\r\n<p>Ces entit&eacute;s peuvent &ecirc;tre prises pour des dieux ou bien des monstres, ils se nourrissent de la psych&eacute; que les Ogmarim utilisent pour lancer des sorts, chaque entit&eacute; poss&egrave;de un domaine bien particulier du plan Karna&iuml;, et il faut c&eacute;der sa psych&eacute; pour pouvoir en ramener une partie dans la r&eacute;alit&eacute;.</p>\r\n\r\n<ul style="list-style-type:circle">\r\n\t<li>A&iuml;gidaInkarna&iuml; des vents et des temp&ecirc;tes, c&#39;est de son territoire que viennent les bourrasques des a&eacute;romanciens. Son karnyx est Violet.</li>\r\n\t<li>AgapiInkarna&iuml; de la vie, les sorts provenant de son domaine gu&eacute;rissent blessures et maladies. Son karnyx est Or.</li>\r\n\t<li>Agones Inkarna&iuml; de la guerre et du combat, le plus puissant de tous. Il est capable d&#39;utiliser la psych&eacute; des Chonos pour accro&icirc;tre son pouvoir bien qu&#39;ils ne puissent avoir recours &agrave; la magie, les Chonos cr&eacute;ent un lien entre Karna&iuml; et Ogma lorsqu&#39;ils se battent, tout comme le ferait un mage pour lancer un sort. Son karnyx est Rouge.</li>\r\n\t<li>AnathosInkarna&iuml; de la mort, sa puissance vient du fait qu&#39;il absorbe la psych&eacute; restante des Ogmarim mourants, ses sorts serait capable de ramener quelqu&#39;un &agrave; la vie. Son karnyx est Pourpre.</li>\r\n\t<li>Pravo&iuml;Inkarna&iuml; de la justice et de la piti&eacute;, il accorde un partie de son pouvoir sous la forme de protections et d&#39;entraves magiques. Son karnyx est Brun.</li>\r\n\t<li>EftisInkarna&iuml; des t&eacute;n&egrave;bres, il est toujours dissimul&eacute; dans les ombres de son domaine. Son karnyx est Gris.</li>\r\n\t<li>Horo&iuml;Inkarna&iuml; du feu et des flammes, il d&eacute;vore la psych&eacute; de ceux qui craignent le froid. Son karnyx est Orange.</li>\r\n\t<li>KormoInkarna&iuml; des plantes et des sols, M&egrave;re des Sakhas, elle gouverne la vie et la mort de la flore. Son karnyx est Kaki.</li>\r\n\t<li>KugaInkarna&iuml; de l&#39;alchimie et des maladies. Son karnyx est Vert.</li>\r\n\t<li>KynigiInkarna&iuml; de la chasse, son domaine sauvage permet de contr&ocirc;ler les b&ecirc;tes ou m&ecirc;me d&#39;en devenir une. Son karnyx est Ambre.</li>\r\n\t<li>NeroInkarna&iuml; des oc&eacute;ans et des glaciers, son domaine est une beaut&eacute; gel&eacute;e. Son karnyx est Cyan.</li>\r\n\t<li>OrizoInkarna&iuml; du savoir, la v&eacute;ritable connaissance se trouve dans son domaine. Son karnyx est Indigo.</li>\r\n\t<li>OurgalInkarna&iuml; du m&eacute;tal et de la pierre, P&egrave;re des Steinns, ses coups de marteau r&eacute;sonne dans tout Karna&iuml;. Son karnyx est Argent.</li>\r\n\t<li>PsemaInkarna&iuml; des mensonges, les sorts de son domaine bercent d&#39;illusions leurs victimes. Son karnyx est Magenta.</li>\r\n\t<li>SafiInkarna&iuml; de la lumi&egrave;re, son domaine n&#39;est que clart&eacute; et &eacute;clat de lumi&egrave;re. Son karnyx est d&#39;un Blanc.</li>\r\n\t<li>Tychi :Inkarna&iuml; de la chance, elle apporte bonne fortune ou grand malheur et aime influer sur le destin des mortels. Son karnyx est Beige.</li>\r\n</ul>\r\n</div>\r\n\r\n<div>&nbsp;</div>
4	2	3	Économie mondiale	1	economie	t	<div>\r\n<p>La plupart des &eacute;changes commerciaux se font par convoi maritime, les marchandises vont et viennent, transport&eacute;es par bateaux par les l&eacute;gendaires marins Mushuks.</p>\r\n\r\n<p>Les factions humaines interviennent dans le commerce, ils contr&ocirc;lent les ports et taxent toutes les marchandises. Les Steinns, et principalement le clan Rakaj, fournissent la majeure partie des objets m&eacute;talliques raffin&eacute;es, que ce soit des armes, des armures ou des bijoux ; bien s&ucirc;r, les forgerons humains et bestiaux sont capables de forger de tels objets, mais ils ne peuvent surpasser le savoir-faire des Steinns.</p>\r\n\r\n<p>La monnaie utilis&eacute;e pour les &eacute;changes en grandes quantit&eacute;s est le b&eacute;rylium, un m&eacute;tal fragile et inutilisable pour la m&eacute;tallurgie, il a donc &eacute;t&eacute; transform&eacute; en monnaie d&#39;&eacute;change par les Ogmarim. Le b&eacute;rylium prend la forme d&#39;un petit lingot de dimensions 12cm x 7cm x 2cm. Les pi&egrave;ces d&#39;or servent d&#39;appoint pour le b&eacute;rylium ou pour des objets de grande valeur. Les marchands utilisent plut&ocirc;t des pi&egrave;ces d&#39;argent ou de cuivre.</p>\r\n\r\n<p>Un lingot de b&eacute;rylium vaut 100 pi&egrave;ces d&#39;or, 1 000 pi&egrave;ces d&#39;argent ou 10 000 pi&egrave;ces de cuivre. L&#39;avantage principal des lingots de b&eacute;rylium est leur poids, ils ne p&egrave;sent que 250 grammes, contrairement &agrave; 100 pi&egrave;ces d&#39;or qui p&egrave;se 1 kilogramme.</p>\r\n\r\n<p>La majorit&eacute; des Ogmarim conservent leur argent chez eux, bien &agrave; l&#39;abri dans un coffre ou une cache secr&egrave;te. Les aventuriers en revanche sont plus propices &agrave; se d&eacute;placer aux quatre coins de la civilisation &agrave; la recherche d&#39;un emploi. C&#39;est pourquoi il existe un syst&egrave;me de banque organis&eacute; par les diff&eacute;rentes factions du monde civilis&eacute; permettant aux plus ais&eacute;s d&#39;entreposer une somme quelque part et de la retirer plus tard dans une autre ville.</p>\r\n</div>
3	2	4	Matériaux rares	1	materiaux	t	<div>\r\n<ul>\r\n\t<li>Virgonium :M&eacute;tal gris clair brillant poss&eacute;dant des propri&eacute;t&eacute;s anti-magiques. Utilis&eacute; pour les talismans Chonos et autres bijoux anti-magique. Il perturbe le lien entre Karna&iuml; et la r&eacute;alit&eacute;, rendant impossible l&#39;usage de la magie &agrave; sa proximit&eacute; et allant jusqu&#39;&agrave; annuler toute forme de magie l&#39;approchant. Ce m&eacute;tal m&eacute;t&eacute;oritique est excessivement rare et cher.</li>\r\n\t<li>Karnyx :Essence de magie pure sous forme de cristal. Se forme sous terre dans des endroits li&eacute;s &agrave; Karna&iuml;. Le cristal peut &ecirc;tre neutre ou bien charg&eacute; de la psych&eacute; d&#39;un Inkarna&iuml; en particulier. Ces pierres sont dangereuses en cas d&#39;exposition prolong&eacute;e, pouvant mener &agrave; la folie voire &agrave; la mort.</li>\r\n\t<li>Gnistar :M&eacute;tal ultra solide d&#39;une l&eacute;g&egrave;ret&eacute; &eacute;tonnante. On peut produire des armures imp&eacute;n&eacute;trables et des armes qui ne perdent jamais leur tranchant.</li>\r\n\t<li>Skymma :Ce m&eacute;tal se forme au plus profond de la terre l&agrave; o&ugrave; la pression est &eacute;crasante. C&#39;est un m&eacute;tal noir extr&ecirc;mement dense, on le confond souvent avec de l&#39;obsidienne mais le Skymma est plus mall&eacute;able de part sa nature m&eacute;tallique. On l&#39;utilise pour des objets d&#39;exceptions, peu nombreux sont les artisans capables de lui donner forme.</li>\r\n\t<li>Lakma :Cet alliage de titane &agrave; haute teneur en carbone ne se trouve qu&#39;en milieu naturel. Il se forme dans des volcans explosifs et ne se trouve qu&#39;en petite quantit&eacute; dans le c&oelig;ur des bombes volcaniques. Presque aussi rare que le skymma, ce m&eacute;tal clair co&ucirc;te une vraie fortune.</li>\r\n\t<li>Nilaroy :Cristal de roche d&#39;une duret&eacute; remarquable pour son poids modeste. Le nilaroy est largement utilis&eacute; par les Mushuks qui ont &eacute;t&eacute; les premiers &agrave; le d&eacute;couvrir.</li>\r\n\t<li>Shoren :Corail des abysses, le Shoren est un mat&eacute;riau lourd et solide utilis&eacute; par les Azumas en tant qu&#39;ornement et pour fa&ccedil;onner des armes et des armures. Aussi solide que le plus solide des aciers, le Shoren poss&egrave;de une profonde couleur bleue.</li>\r\n\t<li>Kusni :Fibre v&eacute;g&eacute;tale infus&eacute;e de la psy de Kormo. Elle est utilis&eacute;e par les Sakhas pour des tenues de c&eacute;r&eacute;monies et pour tisser des armures pour les plus braves d&#39;entre eux.</li>\r\n\t<li>Orichalque :Le m&eacute;tal des marais, utilis&eacute; par les chonos &eacute;tant donn&eacute; qu&#39;ils sont les propri&eacute;taires des plus grosses mines. Ce m&eacute;tal verd&acirc;tre est plus solide que l&#39;acier et est capable de dissiper une partie de la magie qu&#39;il touche.</li>\r\n\t<li>Alkite :M&eacute;tal l&eacute;ger aux reflets bleu-vert. Extr&ecirc;mement lisse m&ecirc;me non raffin&eacute;e, fait glisser les lames et tranche comme un rasoir.</li>\r\n</ul>\r\n</div>
2	2	5	Langages courants	1	langages	t	<div>\r\n<ul>\r\n\t<li>Ashra&iuml; (Tuskizis)</li>\r\n\t<li>Balkrunn (Kantas)</li>\r\n\t<li>Da&iuml;torin (Azumas)</li>\r\n\t<li>Draconien (Sarpas)</li>\r\n\t<li>Igara&iuml; (Mushuks)</li>\r\n\t<li>Karnarak (Karnarim et Inkarna&iuml;s)</li>\r\n\t<li>Kugarite (Rodraki et autres cr&eacute;ations de Kuga)</li>\r\n\t<li>Gortrell (cyclopes, g&eacute;ants, ogres, trolls)</li>\r\n\t<li>Noko&iuml; (Chonos)</li>\r\n\t<li>Payaritt (Toris)</li>\r\n\t<li>Ralvakor (Severs)</li>\r\n\t<li>Sihir&auml;ll (Sihirs)</li>\r\n\t<li>Steinndarr (Steinns)</li>\r\n\t<li>Sylvestre (Sakhas et autres cr&eacute;ations de Kormo)</li>\r\n</ul>\r\n\r\n<p>Les langages humains poss&egrave;dent des racines communes et forment plut&ocirc;t un dialecte poss&eacute;dant des mots sp&eacute;cifiques &agrave; leur zone g&eacute;ographique. Une marchande Steinn ne connaissant que le Ralvakor et le Steinndarr, peut sans probl&egrave;me n&eacute;gocier avec un itin&eacute;rant Mushuk ne connaissant que le Da&iuml;torin et l&#39;Agara&iuml;.</p>\r\n</div>
\.


--
-- Name: armor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.armor_id_seq', 45, true);


--
-- Name: changelog_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.changelog_id_seq', 1, false);


--
-- Name: combat_art_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.combat_art_id_seq', 208, true);


--
-- Name: damage_type_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.damage_type_id_seq', 1, false);


--
-- Name: glossary_condition_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.glossary_condition_id_seq', 42, true);


--
-- Name: glossary_trait_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.glossary_trait_id_seq', 54, true);


--
-- Name: item_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.item_category_id_seq', 26, true);


--
-- Name: item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.item_id_seq', 118, true);


--
-- Name: material_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.material_id_seq', 45, true);


--
-- Name: skill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.skill_id_seq', 1, false);


--
-- Name: sort_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.sort_id_seq', 59, true);


--
-- Name: stance_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.stance_id_seq', 1, false);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.user_id_seq', 9, true);


--
-- Name: weapon_category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.weapon_category_id_seq', 30, true);


--
-- Name: weapon_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.weapon_id_seq', 114, true);


--
-- Name: weapon_property_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.weapon_property_details_id_seq', 75, true);


--
-- Name: weapon_property_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.weapon_property_id_seq', 45, true);


--
-- Name: web_content_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.web_content_id_seq', 14, true);


--
-- Name: web_content_section_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.web_content_section_id_seq', 22, true);


--
-- Name: armor_material armor_material_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.armor_material
    ADD CONSTRAINT armor_material_pkey PRIMARY KEY (armor_material, armor_category);


--
-- Name: armor armor_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.armor
    ADD CONSTRAINT armor_pkey PRIMARY KEY (id);


--
-- Name: changelog changelog_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.changelog
    ADD CONSTRAINT changelog_pkey PRIMARY KEY (id);


--
-- Name: combat_art combat_art_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.combat_art
    ADD CONSTRAINT combat_art_pkey PRIMARY KEY (id);


--
-- Name: combat_art_weapon_category combat_art_weapon_category_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.combat_art_weapon_category
    ADD CONSTRAINT combat_art_weapon_category_pkey PRIMARY KEY (combat_art_id, weapon_category_id);


--
-- Name: damage_type damage_type_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.damage_type
    ADD CONSTRAINT damage_type_pkey PRIMARY KEY (id);


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: glossary_condition glossary_condition_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.glossary_condition
    ADD CONSTRAINT glossary_condition_pkey PRIMARY KEY (id);


--
-- Name: glossary_trait glossary_trait_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.glossary_trait
    ADD CONSTRAINT glossary_trait_pkey PRIMARY KEY (id);


--
-- Name: item_category item_category_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.item_category
    ADD CONSTRAINT item_category_pkey PRIMARY KEY (id);


--
-- Name: item item_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT item_pkey PRIMARY KEY (id);


--
-- Name: material material_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.material
    ADD CONSTRAINT material_pkey PRIMARY KEY (id);


--
-- Name: skill skill_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.skill
    ADD CONSTRAINT skill_pkey PRIMARY KEY (id);


--
-- Name: sort sort_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.sort
    ADD CONSTRAINT sort_pkey PRIMARY KEY (id);


--
-- Name: stance stance_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.stance
    ADD CONSTRAINT stance_pkey PRIMARY KEY (id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: weapon_category weapon_category_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_category
    ADD CONSTRAINT weapon_category_pkey PRIMARY KEY (id);


--
-- Name: weapon weapon_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon
    ADD CONSTRAINT weapon_pkey PRIMARY KEY (id);


--
-- Name: weapon_property_details weapon_property_details_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_property_details
    ADD CONSTRAINT weapon_property_details_pkey PRIMARY KEY (id);


--
-- Name: weapon_property weapon_property_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_property
    ADD CONSTRAINT weapon_property_pkey PRIMARY KEY (id);


--
-- Name: weapon_property_weapon weapon_property_weapon_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_property_weapon
    ADD CONSTRAINT weapon_property_weapon_pkey PRIMARY KEY (weapon_id, weapon_property_details_id);


--
-- Name: web_content web_content_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.web_content
    ADD CONSTRAINT web_content_pkey PRIMARY KEY (id);


--
-- Name: web_content_section web_content_section_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.web_content_section
    ADD CONSTRAINT web_content_section_pkey PRIMARY KEY (id);


--
-- Name: idx_1f1b251e12469de2; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_1f1b251e12469de2 ON public.item USING btree (category_id);


--
-- Name: idx_29dba0b129dba0b1; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_29dba0b129dba0b1 ON public.armor_material USING btree (armor_material);


--
-- Name: idx_29dba0b15329cce5; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_29dba0b15329cce5 ON public.armor_material USING btree (armor_category);


--
-- Name: idx_2f0b82895c019e1; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_2f0b82895c019e1 ON public.web_content_section USING btree (web_content_id);


--
-- Name: idx_5f20560795b82273; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_5f20560795b82273 ON public.weapon_property_weapon USING btree (weapon_id);


--
-- Name: idx_5f205607cf8aec93; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_5f205607cf8aec93 ON public.weapon_property_weapon USING btree (weapon_property_details_id);


--
-- Name: idx_6933a7e612469de2; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_6933a7e612469de2 ON public.weapon USING btree (category_id);


--
-- Name: idx_a51dca956c5a615; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_a51dca956c5a615 ON public.weapon_property_details USING btree (weapon_property_id);


--
-- Name: idx_b04be02023a1db73; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_b04be02023a1db73 ON public.combat_art_weapon_category USING btree (combat_art_id);


--
-- Name: idx_b04be0204011281b; Type: INDEX; Schema: public; Owner: -
--

CREATE INDEX idx_b04be0204011281b ON public.combat_art_weapon_category USING btree (weapon_category_id);


--
-- Name: uniq_166a9e37140ab620; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_166a9e37140ab620 ON public.web_content USING btree (page);


--
-- Name: uniq_1f1b251e1f1b251e; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_1f1b251e1f1b251e ON public.item USING btree (item);


--
-- Name: uniq_3c3ccf3ebdd68843; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_3c3ccf3ebdd68843 ON public.glossary_condition USING btree (condition);


--
-- Name: uniq_533c1638cde5729; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_533c1638cde5729 ON public.damage_type USING btree (type);


--
-- Name: uniq_5e3de4775e3de477; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_5e3de4775e3de477 ON public.skill USING btree (skill);


--
-- Name: uniq_6933a7e68cde5729; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_6933a7e68cde5729 ON public.weapon USING btree (type);


--
-- Name: uniq_6a41d10a64c19c1; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_6a41d10a64c19c1 ON public.item_category USING btree (category);


--
-- Name: uniq_7758ab0864c19c1; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_7758ab0864c19c1 ON public.weapon_category USING btree (category);


--
-- Name: uniq_7cbe75957cbe7595; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_7cbe75957cbe7595 ON public.material USING btree (material);


--
-- Name: uniq_82fd433c82fd433c; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_82fd433c82fd433c ON public.stance USING btree (stance);


--
-- Name: uniq_8d93d649e7927c74; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_8d93d649e7927c74 ON public."user" USING btree (email);


--
-- Name: uniq_c8422601bf1cd3c3; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_c8422601bf1cd3c3 ON public.changelog USING btree (version);


--
-- Name: uniq_caf9008fa1041dd9; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_caf9008fa1041dd9 ON public.glossary_trait USING btree (trait);


--
-- Name: uniq_fae6ae178bf21cde; Type: INDEX; Schema: public; Owner: -
--

CREATE UNIQUE INDEX uniq_fae6ae178bf21cde ON public.weapon_property USING btree (property);


--
-- Name: item fk_1f1b251e12469de2; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.item
    ADD CONSTRAINT fk_1f1b251e12469de2 FOREIGN KEY (category_id) REFERENCES public.item_category(id);


--
-- Name: armor_material fk_29dba0b129dba0b1; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.armor_material
    ADD CONSTRAINT fk_29dba0b129dba0b1 FOREIGN KEY (armor_material) REFERENCES public.material(id);


--
-- Name: armor_material fk_29dba0b15329cce5; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.armor_material
    ADD CONSTRAINT fk_29dba0b15329cce5 FOREIGN KEY (armor_category) REFERENCES public.armor(id);


--
-- Name: web_content_section fk_2f0b82895c019e1; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.web_content_section
    ADD CONSTRAINT fk_2f0b82895c019e1 FOREIGN KEY (web_content_id) REFERENCES public.web_content(id);


--
-- Name: weapon_property_weapon fk_5f20560795b82273; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_property_weapon
    ADD CONSTRAINT fk_5f20560795b82273 FOREIGN KEY (weapon_id) REFERENCES public.weapon(id);


--
-- Name: weapon_property_weapon fk_5f205607cf8aec93; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_property_weapon
    ADD CONSTRAINT fk_5f205607cf8aec93 FOREIGN KEY (weapon_property_details_id) REFERENCES public.weapon_property_details(id);


--
-- Name: weapon fk_6933a7e612469de2; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon
    ADD CONSTRAINT fk_6933a7e612469de2 FOREIGN KEY (category_id) REFERENCES public.weapon_category(id);


--
-- Name: weapon_property_details fk_a51dca956c5a615; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.weapon_property_details
    ADD CONSTRAINT fk_a51dca956c5a615 FOREIGN KEY (weapon_property_id) REFERENCES public.weapon_property(id);


--
-- Name: combat_art_weapon_category fk_b04be02023a1db73; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.combat_art_weapon_category
    ADD CONSTRAINT fk_b04be02023a1db73 FOREIGN KEY (combat_art_id) REFERENCES public.combat_art(id);


--
-- Name: combat_art_weapon_category fk_b04be0204011281b; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.combat_art_weapon_category
    ADD CONSTRAINT fk_b04be0204011281b FOREIGN KEY (weapon_category_id) REFERENCES public.weapon_category(id);


--
-- PostgreSQL database dump complete
--

\unrestrict WXUkq7xPLy21Mtc27tp0ZGxqi6doh3s2oJt5RLQqEmvsA6wsu2mSh4HSPuGsXkd

