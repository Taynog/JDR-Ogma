# Règles de résolution — Système de dés

Spécification de référence du système de résolution de jet pour Ogma.

## État

Version retenue : **« double attribut, garde meilleur + compétence fixe »**.
Cette version est figée pour expérimentation.

Variante à expérimenter (non retenue pour l'instant) : **« moitié du secondaire + meilleur »** — voir section [Variantes](#variantes).

---

## 1. Système actuel (contexte)

- **Attributs** (8) : représentés par un dé unique, gradué d'un cran : `1d4 → 1d6 → 1d8 → 1d10 → 1d12 → 1d12+1 → 1d12+2 ...`.
- **Compétences** : bonus fixe selon le rang, de `+1` à `+5` (`0` pour non formé).
- **Résolution actuelle** : dé d'attribute + bonus de compétence.
- **Résolutions** : contre un DC fixe (MJ) ou en test opposé entre deux adversaires (même mécanique).
- **Marge** : l'écart entre le jet et le score à battre améliore la réussite ou empire l'échec.
- **Avantage / désavantage** : un dé de même échelle que les attributs (`1d2 → 1d4 → 1d6 → ...`), positif pour l'avantage, négatif pour le désavantage. Chaque avantage monte le dé d'un cran. Avantages et désavantages peuvent se cumuler sur un même jet, leurs résultats s'ajoutent (soustraction pour le désavantage) au résultat final. Les jets sont rarement au-delà de ±3, souvent neutres.

---

## 2. Version retenue — « double attribut, garde meilleur + compétence fixe »

### 2.1 Principe

Le jet roule le dé de l'attribut **principal** et celui (ceux) de l'attribut **secondaire**, puis **garde le meilleur** de ces dés comme dé de base. La compétence (rang `+1..+5`) et les avantages/désavantages restent des **bonus fixes** ajoutés au total.

```
Dé de base = meilleur( dé attribut principal, dé attribut secondaire )
Jet final  = Dé de base
           + bonus de compétence (rang +1..+5)
           + dés d'avantage            (positifs, additifs)
           − dés de désavantage        (résultat du dé, soustrait)
```

### 2.2 Application par type de compétence

| Type de compétence | Règle |
|--------------------|-------|
| **À 2 attributs** | Double tirage : on roule les deux dés et on garde le meilleur. |
| **À 1 seul attribut** | Un seul dé roulé (pas de double tirage). L'attribut secondaire est considéré comme nul → on garde le dé de l'attribut unique. |
| **À 3+ attributs** | On roule tous les dés et on garde le meilleur de l'ensemble. Le bénéfice marginal d'un 3e attribut est faible mais présent. |

### 2.3 Interactions avec les avantages / désavantages

- Les avantages et désavantages restent **additifs / soustractifs** sur le **total final** (comme dans le système actuel).
- Ils ne s'appliquent **pas** au « meilleur des deux » du dé de base.
- Chaque avantage ajoute un dé de l'échelle `d2 → d4 → d6 → ...` au résultat final ; chaque désavantage soustrait le même type de dé.

### 2.4 Amplitude

- **Dé de base** : borné de `1` à `12` (le meilleur de deux dés améliore le plancher mais reste borné en haut).
- **Jets typiques (moyenne)** :
  - Compétence médiane (rang 3), attributs médians (d8 & d8) : ≈ **8.8**
  - Spécialiste (rang 5), attributs (d12 & d12) : ≈ **12.6**
  - Débutant non formé (rang 0, d6 seul) : ≈ **3.5**
- **Très compétents + avantages** : moyenne ~12.6 + 2 avantages (~+3.5 chacun) ≈ **15 à 19** sur les jets remarquables.
- Cible : jets denses dans la zone **~5–11**, seul les plus compétents dépassent **15**, plafond théorique ~20.

### 2.5 Paliers de marge (largeur 2)

Un jet est **réussi** dès que la marge est ≥ 0 : atteindre exactement la valeur à atteindre (marge 0) est une réussite.

| Marge (Jet final − DC) | Résultat |
|------------------------|----------|
| ≤ −4 | Échec critique |
| −3 à −2 | Échec net |
| −1 | Échec de justesse |
| 0 à +1 | Réussite étroite |
| +2 à +3 | Réussite nette |
| +4 à +5 | Réussite majeure |
| ≥ +6 | Réussite spectaculaire |

### 2.6 Tests opposés

Même formule pour chaque adversaire. Le plus haut gagne ; la **marge** est la différence absolue entre les deux jets, comparée aux paliers ci-dessus pour déterminer l'ampleur de l'effet.

---

## 3. Justification (objectifs couverts)

1. **Mieux exploiter plusieurs attributs élevés** : le « garder le meilleur » monte le plancher du dé de base dès que les deux attributs sont bons.
   - Escalade (Force + Agilité) : d8 & d8 → meilleur ≈ **5.8** ; d12 & d4 → meilleur ≈ **4.9**. Le profil équilibré surpasse le profil déséquilibré, même sans compétence.
2. **Compétence prioritaire face à un attribut fort sans compétence** : le bonus de compétence reste le décideur du haut de gamme.
   - Compétent (rang 5, d6 & d6) ≈ 4.5 + 5 = **9.5** ; non formé (d12 seul) ≈ **6.5**. Le compétent l'emporte commodément mais le non formé garde une chance sur un gros jet.

### Moyennes du « meilleur de deux dés » (référence)

| Première \ Deuxième | d4 | d6 | d8 | d10 | d12 |
|---------------------|----|----|----|-----|-----|
| **d4**              | 3.1 | 3.9 | 4.4 | 4.7 | 4.9 |
| **d6**              | 3.9 | 4.5 | 5.0 | 5.3 | 5.6 |
| **d8**              | 4.4 | 5.0 | 5.8 | 6.1 | 6.4 |
| **d10**             | 4.7 | 5.3 | 6.1 | 6.7 | 7.0 |
| **d12**             | 4.9 | 5.6 | 6.4 | 7.0 | 7.6 |

---
