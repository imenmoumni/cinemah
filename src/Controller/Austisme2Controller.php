<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Austisme2Controller extends AbstractController
{
    /**
     * @Route("/austisme2", name="austisme2")
     */
    public function index(): Response
    {
        return $this->render('austisme2/index.html.twig', [
            'controller_name' => 'Austisme2Controller',
        ]);
    }
}
