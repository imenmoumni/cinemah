<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/film", name="film")
     */
    public function index(): Response
    {
        $film = $this->entityManager->getRepository(Film::class)
        ->findAll();

        return $this->render('film/index.html.twig', [
            'film' => $film,
        ]);
    }
    /**
     * @Route("/film/{id}", name="film_show")
     */
    public function show($id)
    {
        $film = $this->getDoctrine()
                      ->getRepository(Film::class)
                      ->findOneBy(['id'=>$id]);
                      return $this->render('film/show.html.twig', [
                        'film' => $film]);
}
}

