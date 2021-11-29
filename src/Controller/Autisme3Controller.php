<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Autisme3Controller extends AbstractController
{
    /**
     * @Route("/autisme3", name="autisme3")
     */
    public function index(): Response
    {
        return $this->render('autisme3/index.html.twig', [
            'controller_name' => 'Autisme3Controller',
        ]);
    }
}
