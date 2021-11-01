<?php

namespace App\Controller;



use App\Entity\Publicite;
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
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
       
        $publicite= $this->entityManager->getRepository(Publicite::class)
        ->findAll();
        return $this->render('home/index.html.twig', [
            'publicite' => $publicite,
            

            
        ]);
    }
}
