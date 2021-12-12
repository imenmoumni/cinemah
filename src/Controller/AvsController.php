<?php

namespace App\Controller;

use App\Entity\Avs;
use App\Form\SearchForm1;
use App\Data1\SearchData1;
use App\Repository\AvsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, PaginatorInterface $paginator, AvsRepository $repository): Response
    {
        //pagination
        $donnees = $this->entityManager->getRepository(Avs::class)->findAll();

        $avs = $paginator->paginate(
            $donnees, //on passe les donnees
            $request->query->getInt('page', 1),//numero de la page en cour ,1 par defaut
            10
        );



         //search

        $data = new SearchData1();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm1::class, $data);
        $form->handleRequest($request);

        $avs = $repository->findSearch($data);


        return $this->render('avs/index.html.twig', [
            'avs' =>$avs,
            'form' => $form->createView()
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