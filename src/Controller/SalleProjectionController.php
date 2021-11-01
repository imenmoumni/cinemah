<?php

namespace App\Controller;

use App\Entity\Ville;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleProjectionController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/salle/projection", name="salle_projection")
     */
    public function index(): Response
    {
        $ville = $this->entityManager->getRepository(Ville::class)->findAll();
        
        return $this->render('salle_projection/index.html.twig', [
            
            'ville' => $ville
        ]);
    }
}
