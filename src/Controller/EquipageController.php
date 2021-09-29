<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipageController extends AbstractController
{
    /**
     * @Route("/", name="app_equipage_index")
     */
    public function index(): Response
    {
        return $this->render('equipage/index.html.twig', [
            'controller_name' => 'EquipageController',
        ]);
    }
}
