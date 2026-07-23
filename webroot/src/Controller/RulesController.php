<?php

namespace App\Controller;

use App\Repository\ArmorRepository;
use App\Repository\WeaponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/regles")]
class RulesController extends AbstractController
{
    #[Route("/", "app_rules_index")]
    public function index(): Response
    {
		return $this->render('@App/rules/systeme.html.twig');
    }

    #[Route("/personnage", "app_rules_character")]
    public function personnage(): Response
    {
        return $this->render('@App/rules/personnage.html.twig');
    }

    #[Route("/magie", "app_rules_magic")]
    public function magie(): Response
    {
        return $this->render('@App/rules/magie.html.twig');
    }

    #[Route("/survie", "app_rules_survival")]
    public function survival(): Response
    {
        return $this->render('@App/rules/survie.html.twig');
    }

    #[Route("/artisanat", "app_rules_crafting")]
    public function crafting(): Response
    {
        return $this->render('@App/rules/artisanat.html.twig');
    }

    #[Route("/objets", "app_rules_items")]
    public function items(): Response
    {
        return $this->render('@App/rules/objets.html.twig');
    }

    #[Route("/glossaire", "app_rules_glossary")]
    public function glossary(): Response
    {
        return $this->render('@App/rules/glossaire.html.twig');
    }

    #[Route("/combat", "app_rules_combat")]
    public function combat(): Response
    {
        return $this->render('@App/rules/combat.html.twig');
    }

    #[Route("/armes", "app_rules_weapons")]
    public function armes(WeaponRepository $weaponRepository): Response
    {
        $grouped = $weaponRepository->findGroupedByType();

        return $this->render('@App/rules/armes.html.twig', [
            'degats' => 15,
            'weaponsMelee' => $grouped['melee'],
            'weaponsRanged' => $grouped['ranged'],
        ]);
    }

    #[Route("/armures", "app_rules_armors")]
    public function armures(ArmorRepository $armorRepository): Response
    {
        $armors = $armorRepository->findAll();

        return $this->render('@App/rules/armures.html.twig', [
            'armors' => $armors
        ]);
    }
}