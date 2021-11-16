<?php

namespace App\Controller;

use App\Entity\Matiere;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatiereController extends AbstractController
{
    #[Route('/matiere', name: 'matiere')]
    public function index(): Response
    {
        return $this->render('matiere/index.html.twig', [
            'controller_name' => 'MatiereController',
        ]);
    }

    #[Route('/matiere/ceer', name: 'matiere_creer')]
    public function matireCreer() 
    {
        $entityManager= $this->getDoctrine()->getManager();
        $inter = $this->getDoctrine()->getRepository(Intervenant::class)->find(1);
        $newMat = new Matiere();
        $newMat->setIntitule("Java");
        $newMat->setDuree(39);
        $newMat->setFkIntervenant($inter);
        $entityManager->persist($newMat);
        $entityManager->flush();
        return new Response("Création d'une matière avec l'id" . $newMat->getId());


    }
}
