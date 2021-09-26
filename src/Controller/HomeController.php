<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {   $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();
        return $this->render('index.html.twig',[
            "posts" => $posts
        ]);
    }

    /**
     * @Route("/article/{id}" , name="afficher_article")
     */
    public function afficherArticle(Post $post): Response
    {
        return $this->render('afficheArticle.html.twig',[
            "post"=> $post
        ]);
    }
}
