<?php

namespace App\Controller;

use App\Entity\Adivinar;
use App\Form\AdivinarType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FormularioController extends AbstractController
{
    /**
     * @Route("/formulario", name="formulario")
     */
    public function index(Request $request): Response
    {
 
        $adivinar = new Adivinar();
        $formulario = $this->createForm(AdivinarType::class, $adivinar);
        $formulario->handleRequest($request);
            
        $numeroAdivinado = 0;
        if($formulario->isSubmitted() && $formulario->isValid()){
            $numeroAdivinado = $adivinar->numero();
        }

        return $this->render('formulario/index.html.twig', [
            'controller_name' => 'FormularioController',
             'formulario' => $formulario->createView(),
             'numeroAdivinado' =>  $numeroAdivinado
        ]);
    }
}
