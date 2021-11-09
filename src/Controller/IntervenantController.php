<?php

namespace App\Controller;

use App\Entity\Intervenant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class IntervenantController extends AbstractController


{
   #[Route("/intervenant")]
    public function index()
    {

        $entityManager = $this->getDoctrine()->getManager();
        // Création d’une instance
        $inter = new Intervenant();
        $inter->setNom("Leclerc");
        $inter->setPrenom("Gautier");
        $inter->setSpecialiteprofessionnelle("Docteur en informatique");
        $entityManager->persist($inter);
        $entityManager->flush();
        return new Response("Création d'un intervenant");
    }
}
