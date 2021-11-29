<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Autisme4Controller extends AbstractController
{
    /**
     * @Route("/autisme4", name="autisme4")
     */
    public function index(): Response
    {
        return $this->render('autisme4/index.html.twig', [
            'controller_name' => 'Autisme4Controller',
        ]);
    }
}
