<?php

namespace App\Controller;

use App\Entity\Publicite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CenterController extends AbstractController
{
   
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/center", name="center")
     */
    public function index(): Response
    {
       
        $publicite= $this->entityManager->getRepository(Publicite::class)
        ->findAll();
        return $this->render('center/index.html.twig', [
            'publicite' => $publicite,


            

            
        ]);
    }
}
