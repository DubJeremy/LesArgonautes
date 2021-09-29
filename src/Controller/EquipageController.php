<?php

namespace App\Controller;

use App\Repository\ArgonauteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipageController extends AbstractController
{
    /**
     * @Route("/", name="app_equipage_index")
     */
    public function index(ArgonauteRepository $argonauteRepository): Response
    {
        $argonautes = $argonauteRepository->findByAll();

        return $this->render('equipage/index.html.twig', [
            'argonautes' => $argonautes,
        ]);
    }
}
