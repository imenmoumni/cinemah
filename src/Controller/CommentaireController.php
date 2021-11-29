<?php

namespace App\Controller;

use DateTimeImmutable;
use App\Entity\Medecin;
use App\Entity\Commentaire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentaireController extends AbstractController
{
   
    /**
     * @Route("/commentaire/add", name="commentaire_add")
     */
    public function add(Request $request)
    {
        $post_id = $request->request->get('post_id');

        $user = $this->getUser();

        $post = $this->getDoctrine()
                ->getRepository(Medecin::class)
                ->find($post_id);

        $comment = new Commentaire();
        $comment->setText($request->request->get('_comment'));
        $comment->setUser($user);
        $comment->setMedecin($post);
        $comment->setCreatedAt(new \DateTimeImmutable());

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($comment);
        $entityManager->flush();

        $post_id = $post->getId();

        return $this->redirectToRoute('medecin_show',[
            'id' =>  $post_id
        ]);
    }

 
}
