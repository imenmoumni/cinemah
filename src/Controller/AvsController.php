<?php

namespace App\Controller;

use App\Entity\Avs;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AvsController extends AbstractController
{
    
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }
    /** 
     * @Route("/avs", name="avs")
     */
    public function index(): Response
    {
        $avs= $this->entityManager->getRepository(Avs::class)->findAll();

        return $this->render('avs/index.html.twig', [
            'avs' =>$avs
        ]);
    }
       /**
    * @Route("/show/{id}",name="avs_show")
    */

    public function show($id){
     
        $avs = $this->getDoctrine()
        ->getRepository(Avs::class)
        ->findOneBy(['id'=>$id]);
        return $this->render('avs/show.html.twig',[
            
            'avs' => $avs
        ]);
    }
    
}