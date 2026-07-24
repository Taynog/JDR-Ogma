<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    private const NB_CERCLE = 8;

    private const TIME_SCALE = ['un round', 'une minute', 'une heure', 'une journée', 'une semaine', 'un mois', 'une année', 'une décennie', 'un siècle', 'un millénaire', 'permanent'];
    private const DIST_SCALE = ['10 mètres', '100 mètres', '1 km', '10 km', '100 km', '1 000 km', '10 000 km', '100 000 km', '1 000 000 km'];
    private const DICE_SCALE = ['d2', 'd4', 'd6', 'd8', 'd10', 'd12', 'd12+1', 'd12+2', 'd12+3', 'd12+4', 'd12+5'];
    private const GABARIT_SCALE = ['I', 'Min', 'TP', 'P', 'M', 'G', 'TG', 'Gig', 'Col'];

    public function getFilters(): array
    {
        return [
            new TwigFilter('slug', [$this, 'slugify']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('calc_dc', [$this, 'calcDc']),
            new TwigFunction('calc_mag', [$this, 'calcMag']),
            new TwigFunction('nb_cercles', [$this, 'getNbCercles']),
        ];
    }

    public function getNbCercles(): int
    {
        return self::NB_CERCLE;
    }

    /**
     * @return array<int|string>
     */
    public function calcDc(string $formula): array
    {
        if (str_contains($formula, '+')) {
            $parts1 = explode('+', $formula);
            $a = (int) $parts1[0];
            $parts2 = explode('X', $parts1[1]);
            $b = (int) $parts2[0];
            $res = [];
            for ($i = 0; $i < self::NB_CERCLE; $i++) {
                $res[] = $a + $b * $i;
            }
            return $res;
        }

        return [$formula];
    }

    /**
     * @return array<int, array<int|string>>
     */
    public function calcMag(string $formula): array
    {
        $exprs = explode('&& ', $formula);
        $res = [];
        $y = 0;

        foreach ($exprs as $expr) {
            $types = explode(' ', $expr);
            $type = $types[0];
            $mag = trim(substr($expr, strlen($type) + 1));

            switch ($type) {
                case 'Dice_scale':
                    $magIndex = array_search($mag, self::DICE_SCALE);
                    if ($magIndex !== false) {
                        for ($i = 0; $i < self::NB_CERCLE; $i++) {
                            $res[$y][$i] = self::DICE_SCALE[$magIndex + $i] ?? end(self::DICE_SCALE);
                        }
                    }
                    break;

                case 'Dice_nb':
                    $magParts = explode('d', $mag);
                    $nbDicesStart = (int) $magParts[0];
                    $restMag = substr($mag, strlen((string) $nbDicesStart) + 1);
                    for ($i = 0; $i < self::NB_CERCLE; $i++) {
                        $res[$y][$i] = ($nbDicesStart + $i) . 'd' . $restMag;
                    }
                    break;

                case 'Time':
                    $magIndex = array_search($mag, self::TIME_SCALE);
                    if ($magIndex !== false) {
                        for ($i = 0; $i < self::NB_CERCLE; $i++) {
                            $res[$y][$i] = self::TIME_SCALE[$magIndex + $i] ?? end(self::TIME_SCALE);
                        }
                    }
                    break;

                case 'Distance':
                    $magIndex = array_search($mag, self::DIST_SCALE);
                    if ($magIndex !== false) {
                        for ($i = 0; $i < self::NB_CERCLE; $i++) {
                            $res[$y][$i] = self::DIST_SCALE[$magIndex + $i] ?? end(self::DIST_SCALE);
                        }
                    }
                    break;

                case 'Gabarit':
                    $magIndex = array_search($mag, self::GABARIT_SCALE);
                    if ($magIndex !== false) {
                        for ($i = 0; $i < self::NB_CERCLE; $i++) {
                            $res[$y][$i] = self::GABARIT_SCALE[min($magIndex + $i, 8)];
                        }
                    }
                    break;

                case 'AD':
                    if (str_starts_with($mag, '+')) {
                        for ($i = 0; $i < self::NB_CERCLE; $i++) {
                            $nbAd = (int) $mag + $i;
                            $d = $nbAd === 1 ? ' avantage' : ' avantages';
                            $res[$y][$i] = '+' . $nbAd . $d;
                        }
                    } elseif (str_starts_with($mag, '-')) {
                        $magVal = $mag === '-0' ? '0' : $mag;
                        for ($i = 0; $i < self::NB_CERCLE; $i++) {
                            $nbAd = (int) $magVal - $i;
                            $d = $nbAd === -1 ? ' désavantage' : ' désavantages';
                            $res[$y][$i] = $nbAd . $d;
                        }
                    }
                    break;

                case 'Formula':
                    $res[$y] = $this->calcDc($mag);
                    break;

                case 'Double':
                    for ($i = 0; $i < self::NB_CERCLE; $i++) {
                        $res[$y][$i] = (float) $mag * pow(2, $i);
                    }
                    break;

                default:
                    for ($i = 0; $i < self::NB_CERCLE; $i++) {
                        $res[$y][$i] = $mag;
                    }
                    break;
            }
            $y++;
        }

        return $res;
    }

    public function slugify(string $text): string
    {
        $text = preg_replace('/\(.+\)/', '', $text);
        $text = preg_replace('/[^\p{L}\p{N}]+/u', '_', $text);
        $text = trim($text, '_');
        $text = mb_strtolower($text, 'UTF-8');
        $text = preg_replace('/_+/', '', $text);

        return $text;
    }
}
