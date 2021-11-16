<?php

namespace App\Controller;

use App\Entity\Intervenant;
use App\Form\IntervenantFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class IntervenantController extends AbstractController


{
//    #[Route("/intervenant")]
//     public function index()
//     {

//         $entityManager = $this->getDoctrine()->getManager();
//         // Création d’une instance
//         $inter = new Intervenant();
//         $inter->setNom("Leclerc");
//         $inter->setPrenom("Gautier");
//         $inter->setSpecialiteprofessionnelle("Docteur en informatique");
//         $entityManager->persist($inter);
//         $entityManager->flush();
//         return new Response("Création d'un intervenant");
//     }

    /**
     * @Route("/intervenant/create", name="intervenant_create")
     */
    public function new(Request $request)
    {
        $task = new Intervenant();

        $form = $this->createForm(IntervenantFormType::class, $task);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $task = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->render('intervenant/static/success.html.twig');
            //return $this->redirectToRoute('newIntervenant_success');
        }

        return $this->render('intervenant/new.html.twig',
        ['intervenantForm' => $form->createView(),
    ]);
    }

    /**
     * @Route("/intervenant/liste", name="intervenant_liste")
     */
    public function intervenantsList(){
        $sousTitre = 'Liste des intervenants : ';
        $inter = $this->getDoctrine()
            ->getRepository(Intervenant::class)
            ->findAll();
        return $this->render('intervenant/intervenant.html.twig', [
            'intervenants_liste' => $inter,
            'sous_titre'=> $sousTitre,
        ]);
    }
    #[route("intervenant/delete/{value}", name: 'intervenant_delete')]
    public function delete($value) {
        $em = $this->getDoctrine()->getManager();
        $intervenant = $em->getRepository(Intervenant::class)->find($value);
        $em->remove($intervenant);
        $em->flush();
        return $this->intervenantsList();
    }


    #[route("intervenant/dashboard", name: 'intervenant_dashboard')]
    public function dashboard() {        
        return $this->render('intervenant/intervenantDashboard.html.twig');
    }

    #[route("intervenant/intervenant/matieres/lister", name: 'intervenant_matieres_lister')]
    public function IntervenantMatieresLister() {        
        return $this->render('intervenant/intervenant_matieres_lister.html.twig', []);
    }
    
}
