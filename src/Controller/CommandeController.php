<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CommandeController extends AbstractController
{

    // function recap()
    // {
    //     return new Response('récapitulatif des commandes');
    // }

    // /**
    //  * @Route("/commandes/{joker}", requirements={"joker"="^(soldées)|(en cours)$"})
    //  */
    // function afficheCommande($joker){
    //     return new Response("Liste des commandes {$joker}");
    // }

    /**
     * @Route("/commandes/{var}")
     */
    function afficheCreneau($var)
    {
        $commentaires = [
            'je ne serai pas disponible sur cette période (Gauthier)',
            'Je veux bien assurer la relève (Sophie)',
            "Pensez à repporter l'heure manquante (Mélanie)"
        ];

        return $this->render('creneau/affiche.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $var)),
            'commentaires' => $commentaires,
        ]);
    }
}
