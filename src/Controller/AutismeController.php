<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutismeController extends AbstractController
{
    /**
     * @Route("/autisme", name="autisme")
     */
    public function index(): Response
    {
        return $this->render('autisme/index.html.twig', [
            'controller_name' => 'AutismeController',
        ]);
    }
}
