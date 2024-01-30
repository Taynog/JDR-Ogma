<?php

namespace App\Entity;

enum WebContentCategory: string
{
    case RULES = 'rules';
    case LORE = 'lore';
    case OTHER = 'other';
    case UNCLASSIFIED = 'unclassified';
}
