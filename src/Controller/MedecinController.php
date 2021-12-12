<?php

namespace App\Controller;


use DateTimeImmutable;
use App\Entity\Medecin;
use App\Data\SearchData;
use App\Form\SearchForm;
use App\Entity\Commentaire;
use App\Form\CommentaireType;

use App\Repository\MedecinRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MedecinController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }
    /** 
     * @Route("/medecin", name="medecin")
     */
    public function index(Request $request, PaginatorInterface $paginator, MedecinRepository $repository): Response
    {
        //pagination
        $donnees = $this->entityManager->getRepository(Medecin::class)->findAll();

        $medecin = $paginator->paginate(
            $donnees, //on passe les donnees
            $request->query->getInt('page', 1),//numero de la page en cour ,1 par defaut
            10
        );



         //search

        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);

        $medecin = $repository->findSearch($data);


        return $this->render('medecin/index.html.twig', [
            'medecin' =>$medecin,
            'form' => $form->createView()
        ]);
    }
     /** 
     * @Route("/medecin/{id}", name="medecin_show")
     */
    public function show(Medecin $medecin, Request $request, EntityManagerInterface  $manager)
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $commentaire->setCreatedAt(new \DateTimeImmutable())
                     ->setMedecin($medecin);

            $manager->persist($commentaire);
            $manager->flush();

            return $this->redirectToRoute('medecin_show', ['id' => $medecin->getId()]);
        }

        return $this->render('medecin/show.html.twig', [

            'medecin' => $medecin,
            'commentaireForm' => $form->createView()



        ]);
    }
   
}
