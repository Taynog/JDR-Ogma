<?php

namespace App\Controller;

use App\Repository\ArmorRepository;
use App\Repository\CombatArtRepository;
use App\Repository\ItemCategoryRepository;
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

    #[Route("/gabarit", "app_rules_gabarit")]
    public function gabarit(): Response
    {
        return $this->render('@App/rules/gabarit.html.twig');
    }

    #[Route("/types-actions", "app_rules_types_actions")]
    public function typesActions(): Response
    {
        return $this->render('@App/rules/types_actions.html.twig');
    }

    #[Route("/arts-du-combat", "app_rules_arts_combat")]
    public function artsDuCombat(CombatArtRepository $combatArtRepository): Response
    {
        $combatArts = $combatArtRepository->findAll();

        return $this->render('@App/rules/arts_du_combat.html.twig', [
            'combatArts' => $combatArts,
        ]);
    }

    #[Route("/objets-services", "app_rules_objets_bdd")]
    public function objetsBdd(ItemCategoryRepository $itemCategoryRepository): Response
    {
        $categories = $itemCategoryRepository->findAll();

        return $this->render('@App/rules/objetsbdd.html.twig', [
            'categories' => $categories,
        ]);
    }
}