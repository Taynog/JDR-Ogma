<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as BaseController;

class AbstractController extends BaseController
{
    private ManagerRegistry $doctrine;
    public function getDoctrine() {
        return $this->doctrine;
    }
}