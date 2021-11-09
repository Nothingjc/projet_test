<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AccueilController
{

    // #[route("/", methods:['GET'], name: "racine")]

    /**
     * @Route("/", methods = {"GET"}, name = "racine")
     */
    function bonjour()
    {
        return new Response('bonjour et bienvenue');
    }


    // /**
    //  * @Route("/produits/affiche-creneau-journee")
    //  */
    // function afficheCreneau(){
    //     return new Response(content: "Future page d'affichage de créneaux");
    // }

    // /**
    //  * @Route("/produits/{joker}")
    //  */
    // function afficheCreneau($joker){
    //     return new Response("Future page d'affichage de créneaux : {$joker}");
    // }
}
