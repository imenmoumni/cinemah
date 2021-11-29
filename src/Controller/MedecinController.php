<?php

namespace App\Controller;


use DateTimeImmutable;
use App\Entity\Medecin;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CalendarRepository;
use Doctrine\ORM\EntityManagerInterface;
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
    public function index(): Response
    {
        $medecin= $this->entityManager->getRepository(Medecin::class)->findAll();

        return $this->render('medecin/index.html.twig', [
            'medecin' =>$medecin
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



    public function index1(CalendarRepository $calendar)
    {
        $events = $calendar->findAll();

        $rdvs = [];

        foreach ($events as $event) {
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getbackgroundcolor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ];
        }


    }
   }  

