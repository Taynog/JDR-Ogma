<?php

namespace App\Controller;

use App\Entity\Armor;
use App\Entity\Changelog;
use App\Entity\Weapon;
use App\Entity\WebContent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route("/regles")]
class RulesController extends AbstractController
{
    #[Route("/", "app_rules_index")]
    public function index(): Response
    {
        $template = $this->getDoctrine()->getRepository(WebContent::class)->find('rules_index');

        return $this->render('@App/frontend/webcontent.html.twig', [
            'template' => $template
        ]);
    }

    #[Route("/personnage", "app_rules_character")]
    public function personnage(): Response
    {
        return $this->render('@App/rules/personnage.html.twig');
    }

    #[Route("/armes", "app_rules_weapons")]
    public function armes(): Response
    {
        $weapons = $this->getDoctrine()->getRepository(Weapon::class)->findAll();

        return $this->render('@App/rules/armes.html.twig', [
            'weapons' => $weapons
        ]);
    }

    #[Route("/armures", "app_rules_armors")]
    public function armures(): Response
    {
        $armors = $this->getDoctrine()->getRepository(Armor::class)->findAll();

        return $this->render('@App/rules/armures.html.twig', [
            'armors' => $armors
        ]);
    }
}