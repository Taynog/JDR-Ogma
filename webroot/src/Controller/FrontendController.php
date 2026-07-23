<?php

namespace App\Controller;

use App\Repository\ChangelogRepository;
use App\Repository\WebContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FrontendController extends AbstractController
{
    #[Route("/", "app_index")]
    public function index(ChangelogRepository $changelogRepository): Response
    {
        $changelogs = $changelogRepository->findAll();
        return $this->render('@App/pages/accueil.html.twig', [
            'changelogs' => $changelogs
        ]);
    }
    #[Route("/{page}", "app_front", priority: -10)]
    public function page (string $page, WebContentRepository $webContentRepository): Response
    {
        $template = $webContentRepository->find($page);
        if(is_null($template)) {
            return $this->redirectToRoute("app_index");
        }
        return $this->render('@App/frontend/webcontent.html.twig', [
            'template' => $template
        ]);
    }
    #[Route("/factions/{faction}", "app_factions", priority: -1)]
    public function factions (string $faction): Response
    {
        try {
            return $this->render("@App/factions/$faction.html.twig");
        }
        catch (\Exception $exception) {
            return $this->redirectToRoute("app_index");
        }
    }
    #[Route("/univers/{page}", "app_univers", priority: -1)]
    public function univers (string $page): Response
    {
        try {
            return $this->render("@App/world/$page.html.twig");
        }
        catch (\Exception $exception) {
            return $this->redirectToRoute("app_index");
        }
    }
}