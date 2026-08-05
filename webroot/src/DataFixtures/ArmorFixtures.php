<?php

namespace App\DataFixtures;

use App\Entity\Armor;
use App\Entity\Material;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArmorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $armorsData = [
            ['category' => 'Légère', 'protection' => 1, 'protectionMagical' => 0, 'price' => '75 pa', 'enc' => 1],
            ['category' => 'Légère', 'protection' => 2, 'protectionMagical' => 0, 'price' => '150 pa', 'enc' => 1],
            ['category' => 'Légère', 'protection' => 3, 'protectionMagical' => 1, 'price' => '375 pa', 'enc' => 1],
            ['category' => 'Légère', 'protection' => 4, 'protectionMagical' => 2, 'price' => '1000 pa', 'enc' => 1],
            ['category' => 'Légère', 'protection' => 5, 'protectionMagical' => 3, 'price' => '1800 pa', 'enc' => 1],
            ['category' => 'Intermédiaire', 'protection' => 2, 'protectionMagical' => 0, 'price' => '100 pa', 'enc' => 2],
            ['category' => 'Intermédiaire', 'protection' => 3, 'protectionMagical' => 1, 'price' => '200 pa', 'enc' => 2],
            ['category' => 'Intermédiaire', 'protection' => 4, 'protectionMagical' => 2, 'price' => '500 pa', 'enc' => 2],
            ['category' => 'Intermédiaire', 'protection' => 5, 'protectionMagical' => 3, 'price' => '1200 pa', 'enc' => 2],
            ['category' => 'Intermédiaire', 'protection' => 6, 'protectionMagical' => 4, 'price' => '2500 pa', 'enc' => 2],
            ['category' => 'Lourde', 'protection' => 3, 'protectionMagical' => 1, 'price' => '125 pa', 'enc' => 3],
            ['category' => 'Lourde', 'protection' => 4, 'protectionMagical' => 2, 'price' => '300 pa', 'enc' => 3],
            ['category' => 'Lourde', 'protection' => 5, 'protectionMagical' => 3, 'price' => '750 pa', 'enc' => 3],
            ['category' => 'Lourde', 'protection' => 6, 'protectionMagical' => 4, 'price' => '1500 pa', 'enc' => 3],
            ['category' => 'Lourde', 'protection' => 7, 'protectionMagical' => 5, 'price' => '3000 pa', 'enc' => 3],
        ];

        $materials = [
            'Peau',
            'Cuir',
            'Alkite',
            'Kusni',
            'Gnistar',
            'Chitine',
            'Os',
            'Nilaroy',
            'Adamantine',
            'Lakma',
            'Fer',
            'Acier',
            'Shoren',
            'Orichalque',
            'Skymma',
        ];

        $materialEntities = [];
        foreach ($materials as $materialName) {
            $material = new Material();
            $material->setMaterial($materialName);
            $manager->persist($material);
            $materialEntities[] = $material;
        }

        $armorEntities = [];
        foreach ($armorsData as $data) {
            $armor = new Armor();
            $armor->setCategory($data['category']);
            $armor->setProtection($data['protection']);
            $armor->setProtectionMagical($data['protectionMagical']);
            $armor->setPrice($data['price']);
            $armor->setENC($data['enc']);
            $manager->persist($armor);
            $armorEntities[] = $armor;
        }

        // armor_material pivot: armor[i] <-> material[i] (1:1 positional)
        foreach ($armorEntities as $i => $armor) {
            $armor->addMaterial($materialEntities[$i]);
        }

        $manager->flush();
    }
}
