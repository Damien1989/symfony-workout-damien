<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="app_program")
     */

       public function index(): Response
       {

                return $this->render('program/index.html.twig', [
                    'website' => 'Damien Diaz',
                ]);
       }
}