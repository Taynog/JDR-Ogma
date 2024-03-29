<?php
$title = "Bestiaire";
include($_SERVER['DOCUMENT_ROOT'] . "/header.php");
function print_bestiaire($cat): void
{
    global $db,$debut_url;
    $smtCat = $db->prepare("SELECT DISTINCT Sous_cat FROM bestiaire WHERE Cat = :c ORDER BY Sous_cat");
    $smtCat->execute(['c' => $cat]);
    $S_cats = $smtCat->fetchAll();
    foreach ($S_cats as $S_cat) :
        $smt = $db->prepare("SELECT * FROM bestiaire WHERE Sous_Cat <=> :c ORDER BY Nom");
        $smt->execute(['c' => $S_cat['0']]);
        $rows = $smt->fetchAll();
        if(sizeof($rows)>1 && !is_null($S_cat['0'])) :
        ?>
        <h2 id="<?=$S_cat[0]?>" onclick="hideContent(this)"><?=$S_cat[0]?></h2>
        <div class="hidden">

        <?php
            $smt_desc = $db->prepare("SELECT * FROM bestiaire WHERE Sous_Cat = :c AND Nom LIKE CONCAT(:d,'%')");
            $smt_desc->execute(['c' => $S_cat['0'],'d' => 'desc_']);
            $Cat_desc = $smt_desc->fetchAll();
            echo $Cat_desc['0']['Description'];
        endif;
        foreach ($rows as $row) : ?>
        <?php
        if(substr($row['Nom'],0,5)=== 'desc_'){
            continue;
        }
        ?>
        <h3 id="<?=$row['Nom']?>" onclick="hideContent(this)"><?=$row['Nom']?></h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p><?=$row['Description']?></p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td><?=$row['Force']?></td>
                            <td><?=$row['Dexterite']?></td>
                            <td><?=$row['Agilite']?></td>
                            <td><?=$row['Vigueur']?></td>
                            <td><?=$row['Intelligence']?></td>
                            <td><?=$row['Volonte']?></td>
                            <td><?=$row['Perception']?></td>
                            <td><?=$row['Eloquence']?></td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p style="text-align: center">Attributs</p>
                    <p><strong>Gabarit : </strong><?=$row['Gabarit']?></p>
                    <p><strong>Blessures max : </strong><?=$row['Blessures_max']?></p>
                    <p><strong>Résistance Physique : </strong><?=$row['RP']?></p>
                    <p><strong>Résistance Magique : </strong><?=$row['RM']?></p>
                    <p><strong>Vitesse : </strong><?=$row['Vitesse']?></p>
                    <?php if($row['Langages']!=NULL) : ?>
                        <p><strong>Langages : </strong><?=$row['Langages']?></p>
                    <?php endif; ?>
                    <hr/>
                    <?php if($row['Traits']!=NULL) : ?>
                        <p style="text-align: center">Trait(s)</p>
                        <?php
                        $traits = explode(';',$row['Traits']);
                        foreach ($traits as $trait) :
                            $tr = explode(':',$trait);
                            $tr_nom = $tr[0];
                            if(isset($tr[1])) {
                                $tr_desc = $tr[1];
                                ?>
                                <p><strong><?=$tr_nom?> : </strong><?=$tr_desc?></p>
                                <?php
                            }
                            else{?>
                                <p><strong><?=$tr_nom?></strong></p>
                            <?php
                            }
                        unset($tr_desc);
                        endforeach;?>
                    <hr/>
                    <?php endif; ?>
                    <?php if($row['Competences']!=NULL) : ?>
                            <p style="text-align: center">Compétences(s)</p>
                            <?php
                            $comps = explode(';',$row['Competences']);
                            foreach ($comps as $comp) :
                                $c = explode(':',$comp);
                                $c_nom = $c[0];
                                $c_desc = $c[1];
                                ?>
                                <p><strong><?=$c_nom?> : </strong><?=$c_desc?></p>
                            <?php endforeach;?>
                        <hr/>
                    <?php endif; ?>
                    <?php if($row['Attaques']!=NULL) : ?>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Attaque</th>
                            <th>Dégâts</th>
                            <th>Portée</th>
                            <th>Propriétés</th>
                        </tr>
                        <?php
                        $atqs = explode(';',$row['Attaques']);
                        foreach ($atqs as $atq) :
                            $a = explode('/',$atq);
                            $a_nom = $a[0];
                            $a_dmg = $a[1];
                            $a_port = $a[2];
                            $a_prop = $a[3];
                            ?>
                            <tr>
                                <td><?=$a_nom?></td>
                                <td><?=$a_dmg?></td>
                                <td><?=$a_port?></td>
                                <td><?=$a_prop?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <hr/>
                    <?php endif; ?>
                    <?php if($row['Capacites']!=NULL) : ?>
                        <p style="text-align: center">Capacité(s) Spéciale(s)</p>
                        <?php
                        $caps = explode(';',$row['Capacites']);
                        foreach ($caps as $cap) :
                            $c = explode(':',$cap);
                            $c_nom = $c[0];
                            if(isset($c[1])) {
                                $c_desc = $c[1];
                                ?>
                                <p><strong><?=$c_nom?> : </strong><?=$c_desc?></p>
                                <?php
                            }
                            else{?>
                                <p><strong><?=$c_nom?></strong></p>
                                <?php
                            }
                            unset($c_desc);
                        endforeach;?>
                        <hr/>
                    <?php endif; ?>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="<?=$row['Nom']?>" src="<?= $debut_url . 'Images/Bestiary/' . $row['Image']?>"/>
                </div>
            </div>
            <hr/>
        </div>
    <?php endforeach;

        if(sizeof($rows)>1 && !is_null($S_cat['0'])) :
            ?>
        </div>
    <?php
        endif;
        endforeach;
}
?>
    <h3 id="empty" onclick="hideContent(this)"></h3>
    <div class="hidden">
        <div class="bestiary_entity">
            <div class="bestiary_entity_part">
                <p></p>
                <hr/>
                <table class="table_bestiary">
                    <tbody>
                    <tr>
                        <th>FOR</th>
                        <th>DEX</th>
                        <th>AGI</th>
                        <th>VIG</th>
                        <th>INT</th>
                        <th>VOL</th>
                        <th>PER</th>
                        <th>ELO</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <hr/>
                <p><strong>Vitalité : </strong></p>
                <p><strong>Endurance : </strong></p>
                <p><strong>Protection : </strong><br/><i></i></p>
                <p><strong>Trait(s) : </strong></p>
                <p><strong>Vitesse : </strong></p>
                <p><strong>Taille : </strong></p>
                <p><strong>Langages : </strong></p>
                <hr/>
                <table class="table_bestiary">
                    <tbody>
                    <tr>
                        <th>Attaque</th>
                        <th>Dégâts</th>
                        <th>Portée</th>
                        <th>Propriétés</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <hr/>
                <p><strong></strong></p>
            </div>
            <div class="bestiary_entity_part">
                <img alt="" src="../../Images/Bestiary"/>
            </div>
        </div>
        <hr/>
    </div>

    <h1>Bestiaire</h1>
    <p>Ici sont recensés la plupart des créatures d'Ogma selon différentes catégories.</p>
    <h2 style="color: darkred">Attention le bestiaire n'est pas mis à jour d'un point de vue mécanique mais reste disponible pour le lore d'Ogma</h2>

    <h1 id="aquatiques" onclick="hideContent(this)">Aquatiques</h1>
    <div>
        <p>Les aquatiques sont des créatures évoluant la majorité du temps dans l'eau, qu'elle soit douce ou salée. Cette catégorie regroupe aussi bien les amphibiens que les monstres marins</p>

        <h3 id="koibra" onclick="hideContent(this)">Koïbra</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Résidant dans les étangs et les rivières calmes, le koïbra est un prédateur mortel. Les neurotoxines qu'il injecte par sa morsure affecte le système nerveux de sa victime, causant une paralysie et de terribles douleurs.</p>
                    <p>Cette salamandre se nourrit principalement de poissons, grenouilles et petits serpents. Le koïbra préfère fuir sous la surface lorsqu'on le dérange et ne se bat qu'en dernier recours.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td>54</td>
                            <td>61</td>
                            <td>32</td>
                            <td>8</td>
                            <td>12</td>
                            <td>64</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>5</p>
                    <p><strong>Endurance : </strong>10</p>
                    <p><strong>Protection : </strong>1<br/><i>Sa peau écailleuse fait glisser les lames et les flèches.</i></p>
                    <p><strong>Vitesse : </strong>au sol 12m, dans l'eau 20m</p>
                    <p><strong>Taille : </strong>Petite</p>
                    <p><strong>Langages : </strong>Aucun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Morsure</td>
                            <td>64</td>
                            <td>-</td>
                            <td>1d6 P</td>
                        </tr>
                        <tr>
                            <td>Griffes</td>
                            <td>58</td>
                            <td>-</td>
                            <td>2d4 T</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Poison : </strong>Si une créature est mordu par le koïbra, elle doit réussir un jet de Vigueur avec un malus de 18 ou être empoisonnée. Les effets du poison sont : 1d6 de dégâts par tour et paralysie totale. Si la cible rate son jet de Vigueur, elle peut le relancer une fois par tour, sur une réussite les effets du poison se dissipent.</p>
                    <p><strong>Amphibien : </strong>Le koïbra peut respirer à la fois dans l'air et sous l'eau.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Koibra.png"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>
    <h1 id="betes" onclick="hideContent(this)">Bêtes</h1>
    <div>
        <p>Les bêtes sont des créatures primitives, certaines d'entre elles peuvent être élevées voire dressées.</p>

        <h3 id="bulvak" onclick="hideContent(this)">Bulvak</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces imposants cervidés vivent dans les contrées froides d'Ogma, ils vivent y vivent paisiblement en troupeau d'une quinzaine d'individus.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>78</td>
                            <td>22</td>
                            <td>47</td>
                            <td>69</td>
                            <td>6</td>
                            <td>16</td>
                            <td>42</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>15</p>
                    <p><strong>Endurance : </strong>30</p>
                    <p><strong>Protection : </strong>1<br/><i>Une épaisse couche de poils et de graisse protèges les organes vitaux du bulvak</i></p>
                    <p><strong>Résistance(s) : </strong>Froid</p>
                    <p><strong>Vitesse : </strong>12m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Aucun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Bois</td>
                            <td>52</td>
                            <td>36</td>
                            <td>1d6 C</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Charge : </strong>Si le bulvak parcourt plus de 10m en ligne droite et percute un adversaire avec ses bois, l'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d'Agilité ou être mise à terre.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Bulvak.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="demigriffon" onclick="hideContent(this)">Demigriffon</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Les demigriffons sont des hybrides entre les griffons et les chevaux. Ces créatures sont extrêmement rares et difficiles à obtenir. La meilleur méthode pour créer un demi griffon consiste à obtenir un oeuf de griffon, l'élever de façon à lui retirer son appétit pour les chevaux et le faire se reproduire avec les meilleurs destriers.</p>
                    <p>Ce sont des montures fantastiques de par leur puissance et leur robustesse bien qu'elles ne possèdent pas les ailes des griffons purs.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>72</td>
                            <td>34</td>
                            <td>53</td>
                            <td>67</td>
                            <td>23</td>
                            <td>34</td>
                            <td>42</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>15</p>
                    <p><strong>Endurance : </strong>30</p>
                    <p><strong>Protection : </strong>1<br/><i>Le cuir et les muscles des demigriffons les rendent robustes.</i></p>
                    <p><strong>Vitesse : </strong>20m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Aucun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Bec</td>
                            <td>56</td>
                            <td>-</td>
                            <td>1d8+2 P</td>
                        </tr>
                        <tr>
                            <td>Griffes</td>
                            <td>48</td>
                            <td>-</td>
                            <td>2d6 T</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Charge : </strong>Si le demigriffon parcourt plus de 10m en ligne droite et frappe un adversaire avec ses griffes, l'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d'Agilité avec un malus de 20 ou être mise à terre.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Demigriffon.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="kipine" onclick="hideContent(this)">Kipine</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Les kipines sont de redoutables prédateurs nocturnes capables de voler sans le moindre bruit pour fondre sur une proie trop audacieuse.</p>
                    <p>Ces chouettes monstrueuses sont dotés de serres acérées, au sommet de leur crâne trônent des bois recherchés par les alchimistes. Leurs plumes noires les camouflent parfaitement dans l'obscurité.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>61</td>
                            <td>72</td>
                            <td>89</td>
                            <td>43</td>
                            <td>23</td>
                            <td>21</td>
                            <td>82</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>12</p>
                    <p><strong>Endurance : </strong>25</p>
                    <p><strong>Protection : </strong>0</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Vitesse: </strong>au sol 15m, en vol 30m</p>
                    <p><strong>Langages : </strong>Aucun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Serres</td>
                            <td>59</td>
                            <td>-</td>
                            <td>2d6+2 P et T</td>
                        </tr>
                        <tr>
                            <td>Bois</td>
                            <td>54</td>
                            <td>32</td>
                            <td>1d10+2 C</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Saisie : </strong>La kipine peut survoler à toute vitesse un opposant et le saisir avec ses serres, si la cible ne parvient pas à se défendre (via une esquive ou autre chose), elle subit 2d4 de dégâts perforants et est prisonnière des serres de la kipine mais peut essayer de défendre pour la faire lâcher prise.</p>
                    <p><strong>Vision nocturne : </strong>Même par une nuit sans lune, la kipine est parfaitement capable de discerner sa cible à plus de 40m d'altitude.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Kipine.png"/>
                </div>
            </div>
            <hr/>
        </div>


        <h3 id="spitfire" onclick="hideContent(this)">Spitfire</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces petites bêtes cracheuses de feu pullulent dans les Monts Ardents. Se nourrissant de charbon, elles sont capables de grimper sur n'importe quelle surface pour dénicher une veine.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td>21</td>
                            <td>52</td>
                            <td>33</td>
                            <td>8</td>
                            <td>6</td>
                            <td>36</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>3</p>
                    <p><strong>Endurance : </strong>6</p>
                    <p><strong>Protection : </strong>2<br/><i>Ses écailles sont dures comme la pierre et difficiles à pénétrer.</i></p>
                    <p><strong>Résistance : </strong>Feu (Majeure)</p>
                    <p><strong>Vitesse : </strong>12m</p>
                    <p><strong>Taille : </strong>Très petite</p>
                    <p><strong>Langages : </strong>Aucun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Morsure</td>
                            <td>45</td>
                            <td>-</td>
                            <td>1d6 P</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Crachât brûlant : </strong> Le spitfire crache un mélange de bave et de roche brûlante, infligeant 1d6 de dégâts de feu à une seule cible. Précision 50, portée 10m/30m.</p>
                    <p><strong>Escalade rapide : </strong> Cette créature peut se déplacer à vitesse normale sur n'importe quelle surface rocheuse qu'importe son inclinaison.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Spitfire.png"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>

    <h1 id="creatures_artificielles" onclick="hideContent(this)">Créatures artificielles</h1>
    <div>
        <p>Les créatures artificielles sont des objets animés ou des créatures construites de toutes pièces.</p>
        <h3 id="arbre_golem" onclick="hideContent(this)">Arbre golem</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Protecteurs des Sakhas, les arbres golems sont une création de Kormo. Ils montent la garde dans les villages et les lieux sacrés pour empêcher les visiteur importants de saccager les lieux.</p>
                    <p>Ils sont un assemblent de racines et d'écorce, capables d'endurer les assaults les plus rudes en se régénérant lorsqu'ils prennent racines.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>92</td>
                            <td>36</td>
                            <td>32</td>
                            <td>78</td>
                            <td>23</td>
                            <td>67</td>
                            <td>38</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>35</p>
                    <p><strong>Endurance : </strong>70</p>
                    <p><strong>Protection : </strong>2<br/><i>L'écorce magique de Kormo les rend résistant.</i></p>
                    <p><strong>Vulnérabilité(s) : </strong>Feu (Majeure)</p>
                    <p><strong>Vitesse : </strong>6m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Sylvestre (ne peut pas parler)</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Poings</td>
                            <td>58</td>
                            <td>-</td>
                            <td>2d8 C</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Fouet végétal : </strong>L'arbre golem peut agripper une créature située à moins de 10m de lui et l'amener à son contact grâce à un fouet de lianes ou de racines. La cible peut esquiver avec un malus de 15, en cas d'échec elle subit 2d6 de dégâts tranchants et doit réussir un jet de Force (opposée à celui du golem) pour résister au déplacement.</p>
                    <p><strong>Racines : </strong>Le golem peut fusionner ses pieds avec le sol s'il se trouve sur de la terre, tant qu'il est enraciné, il regagne 2d6 points de vie par tour, et ne peut pas être déplacé ni mis à terre.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Arbre_golem.png"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>

    <h1 id="creatures_magiques" onclick="hideContent(this)">Créatures magiques</h1>
    <div>
        <p>Les créatures magiques, anciennement des monstres et des bêtes primaux, ont évolué depuis l'apparition de la magie jusqu'à devenir des êtres d'une intelligence rare pour des être non civilisés la plupart comprennent au moins une langue, certains d'entre eux peuvent même s'exprimer dans une ou plusieurs langues.</p>

        <h3 id="geant_foret" onclick="hideContent(this)">Géant des forêts</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Les géants des forêts sont des créatures lentes et silencieuses arpentant les bois les plus profonds au sommet des plus hautes montagnes. Vivants au plus loin de la civilisation, il est bien rare d'en rencontrer un.</p>
                    <p>La plupart des géants des forêt possèdent plus de deux yeux, une longue barbe infesté de lichen, mousses et branchages. Ils sont passifs à moins qu'on ne leur montre du feu.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>128</td>
                            <td>42</td>
                            <td>53</td>
                            <td>112</td>
                            <td>46</td>
                            <td>56</td>
                            <td>45</td>
                            <td>36</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>50</p>
                    <p><strong>Endurance : </strong>100</p>
                    <p><strong>Protection : </strong>3<br/><i>Le cuir d'un géant est difficile à percer</i></p>
                    <p><strong>Résistances : </strong>Magie (Mineure)</p>
                    <p><strong>Vulnérabilités : </strong>Feu</p>
                    <p><strong>Vitesse : </strong>12m</p>
                    <p><strong>Taille : </strong>Gigantesque</p>
                    <p><strong>Langages : </strong>Géant</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Poings</td>
                            <td>46</td>
                            <td>-</td>
                            <td>2d8 C</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Éruption : </strong>Le géant enfonce ses deux poings dans le sol, causant une éruption florale. Les créatures se trouvant dans un rayon de 5m de l'impact qui ne parviennent pas à esquiver (avec un malus de 15) subissent 3d6 de dégâts contondants et le sol autour de l'impact devient un terrain difficile jusqu'a ce qu'on coupe les plantes ce qui prend environ une minute.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Geant_foret.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="griffon" onclick="hideContent(this)">Griffon</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces créatures majestueuses parcourent le ciel au dessus des montagnes. Les griffons forment des couple durant pour la vie, protégeant jusqu'à la mort leur progéniture.</p>
                    <p>Ils trônent au sommet de la chaîne alimentaire aux cotés d'autre super-prédateurs, ils sont capable d'emporter dans les airs avec eux une vache ou un cheval.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>78</td>
                            <td>56</td>
                            <td>84</td>
                            <td>54</td>
                            <td>35</td>
                            <td>46</td>
                            <td>68</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>20</p>
                    <p><strong>Endurance : </strong>40</p>
                    <p><strong>Protection : </strong>1<br/><i>Les griffons sont protégés par un cuir épais.</i></p>
                    <p><strong>Vitesse : </strong>au sol 12m, en vol 25m</p>
                    <p><strong>Taille : </strong>Très grande</p>
                    <p><strong>Langages : </strong>/</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Bec</td>
                            <td>58</td>
                            <td>-</td>
                            <td>1d10+3 P</td>
                        </tr>
                        <tr>
                            <td>Griffes</td>
                            <td>52</td>
                            <td>-</td>
                            <td>2d8 T</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Saisie : </strong>Le griffon peut survoler à toute vitesse un opposant et le saisir avec ses serres, si la cible ne parvient pas à se défendre (via une esquive ou autre chose), elle subit 2d6 de dégâts perforants et est prisonnière des serres du griffon mais peut essayer de défendre pour le faire lâcher prise.</p>
                    <p><strong>Cri perçant : </strong>Le griffon pousse un hurlement puissant, chaque créature dans un rayon de 10m autour de sa tête et qui peuvent l'entendre doivent réussir un jet de Vigueur ou de Volonté avec un malus de 20 sous peine d'être étourdi jusqu'à la fin du prochain tour du griffon et assourdi pendant 10 tours.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Griffon.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="leshen" onclick="hideContent(this)">Leshen</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Véritable gardien des bois, le leshen est une créature territoriale qui n'hésite pas à tuer pour protéger son domaine. Capable de contrôler la faune et la flore l'entourant, c'est un redoutable adversaire.</p>
                    <p>Certains disent qu'ils seraient liés aux Sakhas, d'autre que ce sont une incarnation de Kormo elle même. Les leshens ne sont pas toujours hostiles, il leur arrivent de guider des voyageurs ou des animaux domestiques perdus dans les sous-bois, il ne le fait pas directement et évite le contact direct.</p>
                    <p>Un leshen est capable de se métamorphoser en n'importe quelle créature forestière pour passer inaperçu. Pour tuer un leshen, il est nécessaire de détruire les totems qu'ils placent dans son domaine.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>75</td>
                            <td>67</td>
                            <td>54</td>
                            <td>63</td>
                            <td>72</td>
                            <td>84</td>
                            <td>51</td>
                            <td>64</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>30</p>
                    <p><strong>Endurance : </strong>60</p>
                    <p><strong>Protection : </strong>4<br/><i>Son écorce est renforcée par magie.</i></p>
                    <p><strong>Immunité(s) : </strong>Poison</p>
                    <p><strong>Résistance(s) : </strong>Contondants</p>
                    <p><strong>Vulnérabilité(s) : </strong>Feu (Majeure)</p>
                    <p><strong>Vitesse : </strong>12m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Sylvestre</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Griffes</td>
                            <td>63</td>
                            <td>42</td>
                            <td>2d6+2</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Régénération : </strong>Le leshen récupère 15 points d'endurance par tour tant qu'il lui reste un totem, il ne se régénère pas s'il a subi des dégâts de feu ce tour.</p>
                    <p><strong>Pas totémique : </strong>Le leshen peut, par une action complexe, se téléporter vers un de ses totems s'il se trouve sur son domaine.</p>
                    <p><strong>Assault végétal : </strong>S'il le souhaite, le leshen peut frapper deux cibles situées à moins de 30m de lui avec des racines qui surgissent du sol. Les cibles doivent réussir une esquive avec un malus de 15 ou subir 3d6 de dommages contondants et être agrippées. Les créatures agrippées peuvent se libérer en réussissant un jet de Force, d'Agilité, de Vigueur ou en tranchant les racines. Chaque tour passé en étant agrippé par les racines fait subir 1d6 de dégâts contondants car les racines resserrent leur prise.</p>
                    <p><strong>Appel bestial : </strong>Le leshen peut appeler 2d4 corbeaux (PV 2, Atq 8, Dgt 1d4 P), 1d4 loups (PV 15, Atq 12, Dgt 1d6 P), ou un ours (PV 50, Atq 14, Dgt 1d10 T) pour lui venir en aide. Les créatures sont controllées par le leshen et ne fuient pas le combat sauf s'il les laisse partir.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Leshen.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="zheng" onclick="hideContent(this)">Zheng</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Le zheng est un grand léopard à cinq queue vivant dans les régions montagneuses. Souvent appelés le léopard licorne à cause des cornes qu'il possède sur son visage.</p>
                    <p>Il est chassé pour sa fourrure et ses cornes, malgré cela il aide les voyageurs paisibles traversant son territoire. Ils communiquent par télépathie.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>68</td>
                            <td>56</td>
                            <td>89</td>
                            <td>48</td>
                            <td>54</td>
                            <td>48</td>
                            <td>72</td>
                            <td>42</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>15</p>
                    <p><strong>Endurance : </strong>30</p>
                    <p><strong>Protection : </strong>0</p>
                    <p><strong>Vitesse : </strong>16m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Commun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Crocs</td>
                            <td>64</td>
                            <td>-</td>
                            <td>1d10 P</td>
                        </tr>
                        <tr>
                            <td>Griffes</td>
                            <td>61</td>
                            <td>-</td>
                            <td>2d6 T</td>
                        </tr>
                        <tr>
                            <td>Queues</td>
                            <td>58</td>
                            <td>-</td>
                            <td>3d4 C</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Bond : </strong>Si le zheng parcourt plus de 10m en ligne droite, il peut bondir sur un adversaire. La cible peut esquiver, si elle échoue, elle doit réussir un jet de Vigueur avec un malus de 20 ou être mise au sol. Le zheng peut porter une attaque de crocs en action bonus à la cible.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Zheng.png"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>

    <h1 id="humanoides" onclick="hideContent(this)">Humanoïdes</h1>
    <div>
        <p>Les humanoïdes possèdent généralement deux bras, deux jambes et une tête, ou encore un torse semblable à celui des humains, des bras et une tête. La plupart d'entre eux peuvent parler et possèdent un certain degré de sociabilité.</p>

        <h3 id="minotaure" onclick="hideContent(this)">Minotaure</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Les minotaures sont d'immenses créatures pouvant rivaliser avec les Kantas les plus massifs. Ils sont taillés pour le combat et n'hésitent pas à foncer tête baissée pour embrocher leurs adversaires.</p>
                    <p>Ils vivent dans des lieux éloignés de toute civilisation tels que les Étendues Mortelles et les Plaines Silencieuses bien que certains spécimens eut étés observés près des frontières de la civilisation.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>82</td>
                            <td>43</td>
                            <td>52</td>
                            <td>74</td>
                            <td>37</td>
                            <td>46</td>
                            <td>51</td>
                            <td>42</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>20</p>
                    <p><strong>Endurance : </strong>40</p>
                    <p><strong>Protection : </strong>1<br/><i>Le cuir épais du minotaure le protège des coups les plus faibles.</i></p>
                    <p><strong>Vitesse : </strong>9m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Géant</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Hache à deux mains</td>
                            <td>55</td>
                            <td>50</td>
                            <td>1d10 T</td>
                        </tr>
                        <tr>
                            <td>Cornes</td>
                            <td>60</td>
                            <td>-</td>
                            <td>1d8 P</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Charge : </strong>Si le minotaure se déplace d'au moins 10 mètres en ligne droite vers une cible, puis la touche lors d'une attaque avec sa corne dans le même tour, l'attaque est considéré comme une charge et la cible doit réussir un jet de Vigueur ou d'Agilité avec un malus de 15 ou être mise à terre.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="minotaure" src="../../Images/Bestiary/Minotaure.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h2 id="rodraki" onclick="hideContent(this)">Rodraki</h2>
        <div class="hidden">
            <p>Les Rodraki sont une création de Kuga, l'Inkarnaï des maladies et de l'alchimie. Amusé par les créations sihirälls, il fut tenté d'ajouter une nouvelle origine bestiale dans le plan matériel mais ne souhaitant pas quitter son domaine, il s'y pris d'une tout autre manière. Kuga injecta une substance mutagène dont il a le secret dans de nombreuses colonies de rats, cette substance eu pour effet d'augmenter considérablement les facultés cognitives des rats jusqu'à les rendre semi-intelligents et leur à donné une apparence humanoïde.</p>
            <p>Un rodrak est aussi haut qu'un Steinn mais d'une constitution bien plus frêle. Seuls, il ne représente pas une grande menace, mais lorsqu'ils se rassemblent, ils peuvent former un véritable raz-de-marée. Ce sont des êtres lâches et perfides, prêt à trahir leurs pairs pour survivre quelques instants de plus, ils se cachent dans des galeries souterraines creusées au plus près de la civilisation, vivants de rapines. Une cité peut en être infestée sans que ses habitants ne se doutent de leur présence.</p>

            <h3 id="assassin_rodraki" onclick="hideContent(this)">Assassin Rodraki</h3>
            <div class="hidden">
                <div class="bestiary_entity">
                    <div class="bestiary_entity_part">
                        <p>Agissant depuis les ombres, un assassin rodraki est chargé d'éliminer les cibles pouvant nuire à la colonie rodraki dans la plus grande discrétion. Souvent chargé de surveiller les tunnels reliant leur territoire à la surface, il s'occupe des gardes des cités trop imprudents s'y aventurant.</p>
                        <p>Un assassin fait aussi office d'espion à la solde de ses supérieurs, rapportant des informations sur les patrouilles des gardes de la surface, sur les lieux les plus propices à un assaut surprise ou même sur d'autres colonies rodraki.</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>FOR</th>
                                <th>DEX</th>
                                <th>AGI</th>
                                <th>VIG</th>
                                <th>INT</th>
                                <th>VOL</th>
                                <th>PER</th>
                                <th>ELO</th>
                            </tr>
                            <tr>
                                <td>46</td>
                                <td>74</td>
                                <td>78</td>
                                <td>38</td>
                                <td>42</td>
                                <td>36</td>
                                <td>72</td>
                                <td>33</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Vitalité : </strong>6</p>
                        <p><strong>Endurance : </strong>12</p>
                        <p><strong>Protection : </strong>0</p>
                        <p><strong>Vitesse : </strong>12m</p>
                        <p><strong>Taille : </strong>Petite</p>
                        <p><strong>Langages : </strong>Kugarite</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>Arme</th>
                                <th>Attaque</th>
                                <th>Parade</th>
                                <th>Dégâts</th>
                            </tr>
                            <tr>
                                <td>Épée courte</td>
                                <td>58</td>
                                <td>53</td>
                                <td>1d6+1 P ou T</td>
                            </tr>
                            <tr>
                                <td>Dague</td>
                                <td>70</td>
                                <td>26</td>
                                <td>1d4+1 P ou T</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Lames suintantes : </strong>Un assassin rodraki utilise divers poison pour rendre ses assaut plus mortels encore, une cible touchée par un assassin doit réussir un jet de Vigueur ou subir 1d4 de dégâts supplémentaires de poison.</p>
                    </div>
                    <div class="bestiary_entity_part">
                        <img alt="" src="../../Images/Bestiary/Rodrak_assassin.png"/>
                    </div>
                </div>
                <hr/>
            </div>

            <h3 id="rodrak_esclave" onclick="hideContent(this)">Esclave Rodraki</h3>
            <div class="hidden">
                <div class="bestiary_entity">
                    <div class="bestiary_entity_part">
                        <p>La société rodraki ne fait preuve d'aucun scrupules ni de pitié, les individus les moins importants sont méprisés et maltraités. Ils sont alors considérés comme des esclaves, leurs vies ne valent rien, ils forment souvent la première ligne d'une invasion rodraki.</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>FOR</th>
                                <th>DEX</th>
                                <th>AGI</th>
                                <th>VIG</th>
                                <th>INT</th>
                                <th>VOL</th>
                                <th>PER</th>
                                <th>ELO</th>
                            </tr>
                            <tr>
                                <td>40</td>
                                <td>65</td>
                                <td>65</td>
                                <td>40</td>
                                <td>35</td>
                                <td>25</td>
                                <td>70</td>
                                <td>30</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Vitalité : </strong>3</p>
                        <p><strong>Endurance : </strong>6</p>
                        <p><strong>Protection : </strong>0</p>
                        <p><strong>Vitesse : </strong>10m</p>
                        <p><strong>Taille : </strong>Petite</p>
                        <p><strong>Langages : </strong>Kugarite</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>Arme</th>
                                <th>Attaque</th>
                                <th>Parade</th>
                                <th>Dégâts</th>
                            </tr>
                            <tr>
                                <td>Couteau</td>
                                <td>50</td>
                                <td>30</td>
                                <td>1d4 T</td>
                            </tr>
                            <tr>
                                <td>Griffes/Crocs</td>
                                <td>55</td>
                                <td>-</td>
                                <td>1d4 P</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bestiary_entity_part">
                        <img alt="Esclave Rodraki" src="../../Images/Bestiary/Rodrak_esclave.png"/>
                    </div>
                </div>
                <hr/>
            </div>

            <h3 id="rodrak_geant" onclick="hideContent(this)">Rodrak géant</h3>
            <div class="hidden">
                <div class="bestiary_entity">
                    <div class="bestiary_entity_part">
                        <p>Ces monstres de puissance sont le résultat d'expérimentations atroces sur le corps des rodraki. L'injection de Karnyx de Kuga dans un rodrak encore jeune provoque d'intense mutations corporelles développant considérablement sa taille et sa force physique au détriment de son intellect.</p>
                        <p>Un Rodrak géant est plus grand qu'un homme lorsqu'il se tient debout, mais ces bêtes préfèrent se déplacer en s'appuyant sur leurs bras immenses. Les plus gros spécimens peuvent atteindre une masse de 850 kg.</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>FOR</th>
                                <th>DEX</th>
                                <th>AGI</th>
                                <th>VIG</th>
                                <th>INT</th>
                                <th>VOL</th>
                                <th>PER</th>
                                <th>ELO</th>
                            </tr>
                            <tr>
                                <td>82</td>
                                <td>34</td>
                                <td>51</td>
                                <td>62</td>
                                <td>12</td>
                                <td>18</td>
                                <td>38</td>
                                <td>-</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Vitalité : </strong>25</p>
                        <p><strong>Endurance : </strong>50</p>
                        <p><strong>Protection : </strong>1<br/><i>Les rodraks géants ont une peau particulièrement épaisse</i></p>
                        <p><strong>Vitesse : </strong>9m</p>
                        <p><strong>Taille : </strong>Grande</p>
                        <p><strong>Langages : </strong>Kugarite (ne peut pas parler)</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>Arme</th>
                                <th>Attaque</th>
                                <th>Parade</th>
                                <th>Dégâts</th>
                            </tr>
                            <tr>
                                <td>Poings</td>
                                <td>58</td>
                                <td>-</td>
                                <td>1d8 C</td>
                            </tr>
                            <tr>
                                <td>Crocs</td>
                                <td>53</td>
                                <td>-</td>
                                <td>1d8 P</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bestiary_entity_part">
                        <img alt="" src="../../Images/Bestiary/Rodrak_geant.png"/>
                    </div>
                </div>
                <hr/>
            </div>

            <h3 id="rodrak_guerrier" onclick="hideContent(this)">Guerrier Rodraki</h3>
            <div class="hidden">
                <div class="bestiary_entity">
                    <div class="bestiary_entity_part">
                        <p>Certains rodraki parviennent à prouver leur valeur au combat et deviennent des guerriers. Ils sont mieux équipés et mieux traités que les esclaves et n'hésitent pas à rappeler à ces derniers qu'ils sont désormais leurs supérieurs.</p>
                        <p>Ce sont eux qui se chargent de maintenir l'ordre dans les colonies et de la protection des rodraki de rand plus élevés que le leur.</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>FOR</th>
                                <th>DEX</th>
                                <th>AGI</th>
                                <th>VIG</th>
                                <th>INT</th>
                                <th>VOL</th>
                                <th>PER</th>
                                <th>ELO</th>
                            </tr>
                            <tr>
                                <td>52</td>
                                <td>64</td>
                                <td>62</td>
                                <td>46</td>
                                <td>35</td>
                                <td>32</td>
                                <td>70</td>
                                <td>42</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Vitalité : </strong>8</p>
                        <p><strong>Endurance : </strong>15</p>
                        <p><strong>Protection : </strong>2<br/><i>Leur armure est un assemblage de pièces assez efficace pour protéger son porteur</i></p>
                        <p><strong>Vitesse : </strong>8m</p>
                        <p><strong>Taille : </strong>Petite</p>
                        <p><strong>Langages : </strong>Kugarite</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>Arme</th>
                                <th>Attaque</th>
                                <th>Parade</th>
                                <th>Dégâts</th>
                            </tr>
                            <tr>
                                <td>Fauchard</td>
                                <td>59</td>
                                <td>48</td>
                                <td>1d8</td>
                            </tr>
                            <tr>
                                <td>Épée courte</td>
                                <td>55</td>
                                <td>52</td>
                                <td>1d6</td>
                            </tr>
                            <tr>
                                <td>Rondache</td>
                                <td>53</td>
                                <td>64</td>
                                <td>1d4</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bestiary_entity_part">
                        <img alt="" src="../../Images/Bestiary/Rodrak_guerrier.png"/>
                    </div>
                </div>
                <hr/>
            </div>

            <h3 id="rodrak_ingenieur" onclick="hideContent(this)">Ingénieur Rodraki</h3>
            <div class="hidden">
                <div class="bestiary_entity">
                    <div class="bestiary_entity_part">
                        <p>Plus savants fous qu'ingénieurs, ils manient l'alchimie et la magie pour modifier tout un arsenal de machines meurtrières et en équiper ses troupes. Ils sont très friands des machines fabriquées par les Steinns, ils les étudient sous tout les angles pour en tirer des leçons et les appliquer sur leur propres créations.</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>FOR</th>
                                <th>DEX</th>
                                <th>AGI</th>
                                <th>VIG</th>
                                <th>INT</th>
                                <th>VOL</th>
                                <th>PER</th>
                                <th>ELO</th>
                            </tr>
                            <tr>
                                <td>55</td>
                                <td>73</td>
                                <td>68</td>
                                <td>56</td>
                                <td>67</td>
                                <td>52</td>
                                <td>71</td>
                                <td>56</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Vitalité : </strong>10</p>
                        <p><strong>Endurance : </strong>20</p>
                        <p><strong>Protection : </strong>4<br/><i>Leur exosquelette accroit leur force physique et les protègent de tout assaut</i></p>
                        <p><strong>Résistance(s) : </strong>Poison</p>
                        <p><strong>Vitesse : </strong>9m</p>
                        <p><strong>Taille : </strong>Petite</p>
                        <p><strong>Langages : </strong>Kugarite</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>Arme</th>
                                <th>Attaque</th>
                                <th>Parade</th>
                                <th>Dégâts</th>
                            </tr>
                            <tr>
                                <td>Lance de Karnyx</td>
                                <td>62</td>
                                <td>53</td>
                                <td>1d6+2</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Éclair de Karnyx : </strong>Un puissant arc d'énergie magique corrosive projeté depuis un cristal logé dans l'armure de l'ingénieur infligeant 1d10 de dégâts d'acide à une cible. (Précision 55, portée 10/20m)</p>
                        <p><strong>Gaz toxique : </strong>Contenu dans une petite fiole, ce gaz inflige 1d6 de dégâts par round à toute personne se trouvant dans un rayon de 3m de l'explosion de la fiole. le nuage de poison se dissipe dans l'air après une minute environ.</p>
                    </div>
                    <div class="bestiary_entity_part">
                        <img alt="" src="../../Images/Bestiary/Rodrak_ingenieur.png"/>
                    </div>
                </div>
                <hr/>
            </div>

            <h3 id="rodrak_seigneur" onclick="hideContent(this)">Seigneur Rodraki</h3>
            <div class="hidden">
                <div class="bestiary_entity">
                    <div class="bestiary_entity_part">
                        <p>Ces chefs de guerre ont obtenu leur droit à régner en trahissant sans vergogne leur pairs, s'accaparant la gloire là où ils ont fuit comme des lâches. Ils sont la représentation parfaite de la société Rodraki : injuste et répugnante.</p>
                        <p>Ils dirigent les colonies pendants de courte périodes étant donnés la fréquence à laquelle ils se font poignardés par un lieutenant venus prendre leur place. Ce sont eux qui décident où et quand sont menées les invasions sur la surface. Il arrive parfois que plusieurs seigneurs s'allient pour tenter une invasion sur une cité d'importance, bien que ces projets échouent souvent dans l'œuf pour cause de luttes internes.</p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>FOR</th>
                                <th>DEX</th>
                                <th>AGI</th>
                                <th>VIG</th>
                                <th>INT</th>
                                <th>VOL</th>
                                <th>PER</th>
                                <th>ELO</th>
                            </tr>
                            <tr>
                                <td>62</td>
                                <td>65</td>
                                <td>48</td>
                                <td>53</td>
                                <td>45</td>
                                <td>52</td>
                                <td>70</td>
                                <td>65</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr/>
                        <p><strong>Vitalité : </strong>12</p>
                        <p><strong>Endurance : </strong>25</p>
                        <p><strong>Protection : </strong>4<br/><i>Ils sont les seuls à posséder une armure digne de ce nom dans les rangs rodraki</i></p>
                        <p><strong>Vitesse : </strong>8m</p>
                        <p><strong>Taille : </strong>Petite</p>
                        <p><strong>Langages : </strong></p>
                        <hr/>
                        <table class="table_bestiary">
                            <tbody>
                            <tr>
                                <th>Arme</th>
                                <th>Attaque</th>
                                <th>Parade</th>
                                <th>Dégâts</th>
                            </tr>
                            <tr>
                                <td>Hallebarde</td>
                                <td>63</td>
                                <td>52</td>
                                <td>1d8+1</td>
                            </tr>
                            <tr>
                                <td>Épée courte</td>
                                <td>58</td>
                                <td>54</td>
                                <td>1d6+1</td>
                            </tr>
                            <tr>
                                <td>Rondache</td>
                                <td>55</td>
                                <td>68</td>
                                <td>1d4</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bestiary_entity_part">
                        <img alt="" src="../../Images/Bestiary/Rodrak_seigneur.png"/>
                    </div>
                </div>
                <hr/>
            </div>
        </div>

        <h2 id="soldats" onclick="hideContent(this)">Soldats</h2>
        <div class="hidden">
            <p>Les personnages présentés ci-dessous sont des archétypes pour de multiples origines ou factions, il convient de leur ajouter leur bonus et traits raciaux. Il est également possible de modifier leur équipement.</p>
            <ul type="square">

                <li><h3 id="cavalier" onclick="hideContent(this)">Cavalier</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Du haut de leur montures, les cavaliers sont la force de frappe mobile des armées. Qu'ils se battent à la pique, à l'épée ou même à l'arc, ce sont des soldats d'exception.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>60</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>55</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>10</p>
                                <p><strong>Endurance : </strong>20</p>
                                <p><strong>Protection : </strong>4<br/><i>Armure lourde composée d'une cotte de mailles, d'un casque, de jambières et solerets de métal.</i></p>
                                <p><strong>Vitesse : </strong>20m à cheval, 7m à pied</p>
                                <p><strong>Taille : </strong>Grande</p>
                                <p><strong>Langages : </strong>Selon origine</p>
                                <p><strong>Origines applicables : </strong>Toutes (monture différente selon origine)</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Pique</td>
                                        <td>60</td>
                                        <td>-</td>
                                        <td>1d8+1 P</td>
                                    </tr>
                                    <tr>
                                        <td>Épée longue</td>
                                        <td>55</td>
                                        <td>55</td>
                                        <td>1d6+1 P ou T</td>
                                    </tr>
                                    <tr>
                                        <td>Bouclier</td>
                                        <td>50</td>
                                        <td>70</td>
                                        <td>1d4 C</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Charge : </strong>Si le cavalier parcourt plus de 20m en ligne droite et frappe un adversaire avec sa pique, l'attaque est considéré comme une charge montée et la cible doit réussir un jet de Vigueur ou d'Agilité avec un malus de 10 ou être mise à terre.</p>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_cavalier.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>

                <li><h3 id="combattant" onclick="hideContent(this)">Combattant</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Ces guerriers au bouclier forment l'infanterie de choc d'une armée. Habiles de leur lame, ils peuvent taillader les rangs adverses tout en se protégeant grâce à leur bouclier.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>60</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>12</p>
                                <p><strong>Endurance : </strong>25</p>
                                <p><strong>Protection : </strong>3<br/><i>Armure intermédiaire de cuir renforcé</i></p>
                                <p><strong>Vitesse : </strong>8m</p>
                                <p><strong>Taille : </strong>Moyenne</p>
                                <p><strong>Langages : </strong>Selon l'origine</p>
                                <p><strong>Origines applicables : </strong>Toutes</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Épée courte</td>
                                        <td>55</td>
                                        <td>55</td>
                                        <td>1d6+1 P ou T</td>
                                    </tr>
                                    <tr>
                                        <td>Bouclier</td>
                                        <td>50</td>
                                        <td>70</td>
                                        <td>1d4 C</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_combattant.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>

                <li><h3 id="éclaireur" onclick="hideContent(this)">Éclaireur</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Envoyés en avant pour sécuriser le passage du corps principal et recueillir des informations, les éclaireurs sont aussi silencieux que mortels.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>50</td>
                                        <td>70</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>40</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>10</p>
                                <p><strong>Endurance : </strong>20</p>
                                <p><strong>Protection : </strong>1<br/><i>Armure légère de cuir</i></p>
                                <p><strong>Vitesse : </strong>10m</p>
                                <p><strong>Taille : </strong>Moyenne</p>
                                <p><strong>Langages : </strong>Selon origine</p>
                                <p><strong>Origines applicables : </strong>Toutes</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Arc court</td>
                                        <td>65</td>
                                        <td>-</td>
                                        <td>1d8+1 P</td>
                                    </tr>
                                    <tr>
                                        <td>Arbalète</td>
                                        <td>65</td>
                                        <td>-</td>
                                        <td>1d10+1</td>
                                    </tr>
                                    <tr>
                                        <td>Épée courte</td>
                                        <td>55</td>
                                        <td>55</td>
                                        <td>1d6</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_eclaireur.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>

                <li><h3 id="lancier" onclick="hideContent(this)">Lancier</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Formant la colonne vertébrale d'une armées, les lanciers peuvent tenir une ligne ou stopper une charge en restant en formation.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>60</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>12</p>
                                <p><strong>Endurance : </strong>25</p>
                                <p><strong>Protection : </strong>3<br/><i>Armure intermédiaire de cuir renforcé</i></p>
                                <p><strong>Vitesse : </strong>8m</p>
                                <p><strong>Taille : </strong>Moyenne</p>
                                <p><strong>Langages : </strong>Selon origine</p>
                                <p><strong>Origines applicables : </strong>Toutes</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Lance</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>1d6 P</td>
                                    </tr>
                                    <tr>
                                        <td>Bouclier</td>
                                        <td>10</td>
                                        <td>15</td>
                                        <td>1d4 C</td>
                                    </tr>
                                    <tr>
                                        <td>Pique</td>
                                        <td>60</td>
                                        <td>50</td>
                                        <td>1d8 P</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_lancier.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>

                <li><h3 id="mage_guerre" onclick="hideContent(this)">Mage de guerre</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Les mages de guerre sont des soldats spécialisés dans la magie. Ils ne sont pas nombreux dans un corps d'armée et sont souvent gradés.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>50</td>
                                        <td>65</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>75</td>
                                        <td>75</td>
                                        <td>50</td>
                                        <td>60</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>10</p>
                                <p><strong>Endurance : </strong>20</p>
                                <p><strong>Protection : </strong>3<br/><i>Leur tunique semble légère, mais elle est renforcée par magie.</i></p>
                                <p><strong>Vitesse : </strong>9m</p>
                                <p><strong>Taille : </strong>Moyenne</p>
                                <p><strong>Langages : </strong>Selon origine (2 langues)</p>
                                <p><strong>Origines applicables : </strong>Toutes (sauf Chonos)</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Rapière</td>
                                        <td>65</td>
                                        <td>50</td>
                                        <td>1d6+2 P</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Doué de magie : </strong>Les mages de guerre sont tout à fait capables de se servir de leur magie en plein coeur de la bataille, bien qu'il préfèrent rester à distance.</p>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_mage.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>

                <li><h3 id="officier" onclick="hideContent(this)">Officier</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Dirigeant des opérations, l'officier commande une partie des troupes, il a obtenu ce poste à la sueur de son front et le fait bien comprendre à ses subordonnés.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>70</td>
                                        <td>70</td>
                                        <td>50</td>
                                        <td>70</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>75</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>15</p>
                                <p><strong>Endurance : </strong>30</p>
                                <p><strong>Protection : </strong>5<br/><i>Armure lourde de métal</i></p>
                                <p><strong>Vitesse : </strong>7m</p>
                                <p><strong>Taille : </strong>Moyenne</p>
                                <p><strong>Langages : </strong>Selon origine</p>
                                <p><strong>Origines applicables : </strong>Toutes</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Épée longue</td>
                                        <td>63</td>
                                        <td>58</td>
                                        <td>1d6+2 P ou T</td>
                                    </tr>
                                    <tr>
                                        <td>Bouclier</td>
                                        <td>55</td>
                                        <td>75</td>
                                        <td>1d4 C</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_officier.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>

                <li><h3 id="soldat_sorcier" onclick="hideContent(this)">Soldat Sorcier</h3>
                    <div class="hidden">
                        <div class="bestiary_entity">
                            <div class="bestiary_entity_part">
                                <p>Les soldats sorcier forment une force d’élite indépendante de l’armée régulière Azuma, ils se distinguent par une maîtrise totale de la magie et des armes plus conventionnelles.</p>
                                <p>Ils effectuent des missions secrètes en temps de paix mais sont tout autant efficace sur le front pour faire une percée dans les lignes ennemis.</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>FOR</th>
                                        <th>DEX</th>
                                        <th>AGI</th>
                                        <th>VIG</th>
                                        <th>INT</th>
                                        <th>VOL</th>
                                        <th>PER</th>
                                        <th>ELO</th>
                                    </tr>
                                    <tr>
                                        <td>75</td>
                                        <td>75</td>
                                        <td>65</td>
                                        <td>65</td>
                                        <td>70</td>
                                        <td>70</td>
                                        <td>65</td>
                                        <td>80</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Vitalité : </strong>13</p>
                                <p><strong>Endurance : </strong>26</p>
                                <p><strong>Protection : </strong>6<br/><i>Armure lourde faite sur mesure pour chaque soldat</i></p>
                                <p><strong>Vitesse : </strong>9m</p>
                                <p><strong>Taille : </strong>Moyenne</p>
                                <p><strong>Langages : </strong>Commun + 2 autres</p>
                                <p><strong>Origines applicables : </strong>Azumas</p>
                                <hr/>
                                <table class="table_bestiary">
                                    <tbody>
                                    <tr>
                                        <th>Arme</th>
                                        <th>Attaque</th>
                                        <th>Parade</th>
                                        <th>Dégâts</th>
                                    </tr>
                                    <tr>
                                        <td>Katana</td>
                                        <td>75</td>
                                        <td>70</td>
                                        <td>1d6+3 P ou T</td>
                                    </tr>
                                    <tr>
                                        <td>Wakizashi</td>
                                        <td>85</td>
                                        <td>50</td>
                                        <td>1d4+3 P ou T</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <p><strong>Doué de magie : </strong>Les soldats sorciers sont tout à fait capables de se servir de leur magie en plein coeur de la bataille.</p>
                            </div>
                            <div class="bestiary_entity_part">
                                <img alt="" src="../../Images/Bestiary/Soldat_sorcier.png"/>
                            </div>
                        </div>
                        <hr/>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <h1 id="karnarim" onclick="hideContent(this)">Karnarim</h1>
    <div>
        <p>Les Karnarim sont des êtres provenant du plan de Karnaï.</p>

        <h3 id="elementaire_mineur" onclick="hideContent(this)">Élémentaire mineur</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces petites créatures éthérés errent dans Karnaï, ils cherchent à acquérir de la puissance en servant d'autres élémentaires plus puissants et en absorbant de la psy.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                            <td>30</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>11</p>
                    <p><strong>Endurance : </strong>3</p>
                    <p><strong>Protection : </strong>0<br/><i></i></p>
                    <p><strong>Immunité(s) : </strong>Selon Élément</p>
                    <p><strong>Faiblesse(s) : </strong>Selon Élément</p>
                    <p><strong>Trait(s) : </strong>Éthéré</p>
                    <p><strong>Vitesse : </strong>9</p>
                    <p><strong>Taille : </strong>P</p>
                    <p><strong>Langages : </strong>Karnarim</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Attaque</th>
                            <th>Dégâts</th>
                            <th>Portée</th>
                            <th>Propriétés</th>
                        </tr>
                        <tr>
                            <td>Frappe en mêlée</td>
                            <td>3 élémentaire</td>
                            <td>Courte</td>
                            <td>Magique</td>
                        </tr>
                        <tr>
                            <td>Flèche d'Assaut Élémentaire (SC3)</td>
                            <td>6 élémentaire</td>
                            <td>100m</td>
                            <td>3 par heure</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong></strong></p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Elementaire_mineur.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="elementaire" onclick="hideContent(this)">Élémentaire</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces créatures éthérés sont l'incarnation d'un élément, ils dirigent pour la plupart des groupes entiers d'élémentaires mineurs et servent eux-mêmes les élémentaires majeurs.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>50</td>
                            <td>50</td>
                            <td>50</td>
                            <td>50</td>
                            <td>50</td>
                            <td>50</td>
                            <td>50</td>
                            <td>50</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>20</p>
                    <p><strong>Endurance : </strong>5</p>
                    <p><strong>Protection : </strong>0<br/><i></i></p>
                    <p><strong>Immunité(s) : </strong>Selon Élément</p>
                    <p><strong>Faiblesse(s) : </strong>Selon Élément</p>
                    <p><strong>Trait(s) : </strong>Éthéré</p>
                    <p><strong>Vitesse : </strong>15</p>
                    <p><strong>Taille : </strong>M</p>
                    <p><strong>Langages : </strong>Karnarim</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Attaque</th>
                            <th>Dégâts</th>
                            <th>Portée</th>
                            <th>Propriétés</th>
                        </tr>
                        <tr>
                            <td>Frappe en mêlée</td>
                            <td>5 élémentaire</td>
                            <td>Courte</td>
                            <td>Magique</td>
                        </tr>
                        <tr>
                            <td>Flèche d'Assaut Élémentaire (SC5)</td>
                            <td>10 élémentaire</td>
                            <td>100m</td>
                            <td>5 par heure</td>
                        </tr>
                        <tr>
                            <td>Cône d'Assaut Élémentaire (SC5)</td>
                            <td>10 élémentaire</td>
                            <td>10m</td>
                            <td>1 par heure</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong></strong></p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Elementaire.png"/>
                </div>
            </div>
            <hr/>
        </div>

        <h3 id="elementaire_majeur" onclick="hideContent(this)">Élémentaire majeur</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces créatures éthérés sont la représentation la plus pure d'un élément ayant pris vie, ils sont au sommet de la hiérarchie des élémentaires mineurs.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                            <td>70</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>42</p>
                    <p><strong>Endurance : </strong>7</p>
                    <p><strong>Protection : </strong>0<br/><i></i></p>
                    <p><strong>Immunité(s) : </strong>Selon Élément</p>
                    <p><strong>Faiblesse(s) : </strong>Selon Élément</p>
                    <p><strong>Trait(s) : </strong>Éthéré</p>
                    <p><strong>Vitesse : </strong>21</p>
                    <p><strong>Taille : </strong>G</p>
                    <p><strong>Langages : </strong>Karnarim</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Attaque</th>
                            <th>Dégâts</th>
                            <th>Portée</th>
                            <th>Propriétés</th>
                        </tr>
                        <tr>
                            <td>Frappe en mêlée</td>
                            <td>7 élémentaire</td>
                            <td>Courte</td>
                            <td>Magique</td>
                        </tr>
                        <tr>
                            <td>Flèche d'Assaut Élémentaire (SC7)</td>
                            <td>14 élémentaire</td>
                            <td>100m</td>
                            <td>7 par heure</td>
                        </tr>
                        <tr>
                            <td>Cône d'Assaut Élémentaire (SC7)</td>
                            <td>14 élémentaire</td>
                            <td>10m</td>
                            <td>3 par heure</td>
                        </tr>
                        <tr>
                            <td>Tempête d'Assaut Élémentaire (SC7)</td>
                            <td>14 élémentaire</td>
                            <td>100m</td>
                            <td>1 par heure, 9m de diamètre pouvant se déplacer de 7m par round</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong></strong></p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Elementaire_majeur.png"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>

    <h1 id="morts_vivants" onclick="hideContent(this)">Morts-vivants</h1>
    <div>
        <p>Les morts-vivants sont des créatures qui ont cessé de vivre et ont été animées par des forces spirituelles ou surnaturelles.</p>
    </div>

    <h1 id="plantoides" onclick="hideContent(this)">Plantoïdes</h1>
    <div>
        <p>Les plantoïdes ne sont pas de la flore ordinaire, ce sont des créatures végétales sentientes. La plupart d'entre elles peuvent se mouvoir et certaines sont carnivores.</p>
    </div>

    <h1 id="vermine" onclick="hideContent(this)">Vermine</h1>
    <div>
        <p>Ce type de créature regroupe les insectes, les arachnides, les arthropodes, les vers et autres invertébrés du même genre.</p>

        <h3 id="scaratrok" onclick="hideContent(this)">Scaratrok</h3>
        <div class="hidden">
            <div class="bestiary_entity">
                <div class="bestiary_entity_part">
                    <p>Ces scarabées géants vivent dans des cavernes souterraines infestées de champignons toxiques. Leur carapace et leurs cornes sont recouverte de spores.</p>
                    <p>Ce sont des animaux passifs tant qu'on ne vient pas les chercher dans leur tanière, ils se nourrissent de petits mammifères et de racines.</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>FOR</th>
                            <th>DEX</th>
                            <th>AGI</th>
                            <th>VIG</th>
                            <th>INT</th>
                            <th>VOL</th>
                            <th>PER</th>
                            <th>ELO</th>
                        </tr>
                        <tr>
                            <td>74</td>
                            <td>32</td>
                            <td>43</td>
                            <td>64</td>
                            <td>12</td>
                            <td>16</td>
                            <td>38</td>
                            <td>-</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Vitalité : </strong>15</p>
                    <p><strong>Endurance : </strong>30</p>
                    <p><strong>Protection : </strong>5<br/><i>La carapace du scaratrok est aussi solide que le métal.</i></p>
                    <p><strong>Résistances : </strong>Acide (Majeure), Poison</p>
                    <p><strong>Immunités : </strong>Poison</p>
                    <p><strong>Vitesse : </strong>9m</p>
                    <p><strong>Taille : </strong>Grande</p>
                    <p><strong>Langages : </strong>Aucun</p>
                    <hr/>
                    <table class="table_bestiary">
                        <tbody>
                        <tr>
                            <th>Arme</th>
                            <th>Attaque</th>
                            <th>Parade</th>
                            <th>Dégâts</th>
                        </tr>
                        <tr>
                            <td>Cornes</td>
                            <td>62</td>
                            <td>34</td>
                            <td>1d6+3</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr/>
                    <p><strong>Poison : </strong>Une créature touchée par une des cornes du scaratrok doit réussir un jet de Vigueur (avec un malus de 20) ou subir 1d6 de dégâts de poison par tour pendant 5 tours. Une épreuve ratée peut être retentée tout les tours au prix d'une action simple.</p>
                    <p><strong>Spores incapacitants : </strong>Un fois par jour, le scaratrok peut relâcher une nuée de spore sur toutes les créatures situées à moins de 5m de lui. Les créatures dans la zone doivent réussir un jet de Volonté (avec un malus de 20) ou être étourdies. Une épreuve ratée peut être retentée tout les tours au prix d'une action simple, le malus diminue de 5 à chaque tentative ratée.</p>
                    <p><strong>Escalade : </strong> Cette créature peut se déplacer à la moitié de sa vitesse sur n'importe quelle surface rocheuse qu'importe son inclinaison.</p>
                </div>
                <div class="bestiary_entity_part">
                    <img alt="" src="../../Images/Bestiary/Scaratrok.png"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>
<?php
include($_SERVER['DOCUMENT_ROOT'] . "/footer.php");