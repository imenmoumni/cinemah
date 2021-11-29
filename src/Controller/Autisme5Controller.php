<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Autisme5Controller extends AbstractController
{
    /**
     * @Route("/autisme5", name="autisme5")
     */
    public function index(): Response
    {
        return $this->render('autisme5/index.html.twig', [
            'controller_name' => 'Autisme5Controller',
        ]);
    }
}
