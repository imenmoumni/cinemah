<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Autisme6Controller extends AbstractController
{
    /**
     * @Route("/autisme6", name="autisme6")
     */
    public function index(): Response
    {
        return $this->render('autisme6/index.html.twig', [
            'controller_name' => 'Autisme6Controller',
        ]);
    }
}
