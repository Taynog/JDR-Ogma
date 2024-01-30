<?php

namespace App\Controller;

use App\Entity\WebContent;
use Symfony\Component\HttpFoundation\Response;

class FrontendController extends AbstractController
{
    #[Route("/", "app_index")]
    public function index(): Response
    {
        $template = $this->getDoctrine()->getRepository(WebContent::class)->findByPage("index");
        return $this->render($template);
    }
    #[Route("/{page}", "app_front")]
    public function front (string $page): Response
    {
        $template = $this->getDoctrine()->getRepository(WebContent::class)->findByPage($page);
        return $this->render($template);
    }
}