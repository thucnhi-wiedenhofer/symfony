<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\CommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {   $posts = $this->getDoctrine()->getRepository(Post::class)->getAllPosts();
        return $this->render('index.html.twig',[
            "posts" => $posts
        ]);
    }

    /**
     * @Route("/article/{id}" , name="afficher_article")
     * * @param Post $post
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function afficherArticle(Post $post, Request $request): Response
    {
        $comment = new Comment();
        $comment->setPost($post);
        $form = $this->createForm(CommentType::class, $comment)->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($comment);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("afficher_article", ["id" => $post->getId()]);
        }
        return $this->render("afficheArticle.html.twig", [
            "post" => $post,
            "form" => $form->createView()
        ]);
    }
}
