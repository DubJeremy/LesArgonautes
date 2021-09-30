<?php

namespace App\Controller;

use App\Entity\Argonaute;
use App\Form\ArgonauteFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ArgonauteRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EquipageController extends AbstractController
{
    /**
     * @Route("/", name="app_equipage_showArgonautes")
     */
    public function showArgonautes(ArgonauteRepository $argonauteRepository, Request $request, EntityManagerInterface $em): Response
    {
        // Show all Argonautes
        $argonautes = $argonauteRepository->findByAll();
        
        // Add new Argonaute
        $argonaute = new Argonaute();
        $form = $this->createForm(ArgonauteFormType::class, $argonaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $argonaute = $form->getData();
            $em->persist($argonaute);
            $em->flush();
            $this->addFlash('success', 'L\'Argonaute a été ajouté à l\'équipage!');

            return $this->redirectToRoute('app_equipage_showArgonautes');
        }

        return $this->render('equipage/index.html.twig', [
            'argonautes' => $argonautes,
            'formArgonaute' => $form->createView(),
        ]);
    }

    /**
    *@Route("/{id}/delete",name="app_home_deleteArgonaute", requirements={"id"="\d+"})
    */
    public function deleteArgonaute(Request $request,Argonaute $argonaute, EntityManagerInterface $em)
    {
        if($this->isCsrfTokenValid('argonaute_delete_'.$argonaute->getId(),
        $request->request->get('csrf_token')))
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($argonaute);
            $em->flush();
            $this->addFlash('delete', 'Vous avez raison, il n\'avait pas sa place au sein de l\'équipage!');
        }
        return $this->redirectToRoute('app_equipage_showArgonautes');    
    }
}
