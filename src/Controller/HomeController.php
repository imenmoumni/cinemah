<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Center;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
  
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
  /**
     * @Route("/home_show/{id}", name="home_show")
     */
    public function show($id)
    {
        return $this->render('home_show/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
       
    }
  
     
        

    public function index1(): Response  
    {
       
        $center= $this->entityManager->getRepository(Center::class)->findAll();
        return $this->render('home/index.html.twig', [
            'center' => $center,

        ]);
            
      }

    }