<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Post;
use App\Form\PostType;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class AdminArticleController extends AbstractController
{
    /**
     * @Route("/admin/article", name="admin_article")
     */
    public function index(): Response
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->getAllPosts();
        return $this->render('admin_article/adminArticle.html.twig',[
            "posts" => $posts
        ]);
    }

    /**
     * @Route("/publier-article/" , name="blog_create")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function create(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post)->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getManager()->persist($post);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("afficher_article", ["id" => $post->getId()]);
        }
        return $this->render("create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    /**
     * @Route("/modifier-article/{id}" , name="blog_update", methods="GET|POST")
     * @param Post $post
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function update(Post $post, Request $request): Response
    {
        $form = $this->createForm(PostType::class, $post)->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {

            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute("afficher_article", ["id" => $post->getId()]);
        }
        return $this->render("update.html.twig", [
            "post" => $post,
            "form" => $form->createView()
        ]);
    }

    /**
     *@Route("/delete-article/{id}" , name="blog_delete", methods= "delete")
     */
    public function delete( Post $post , Request $request, EntityManagerInterface $entityManager): Response
    {   if($this->isCsrfTokenValid("SUP".$post->getId(), $request->get('_token'))){
            $entityManager->remove($post);
            $entityManager->flush();
            return $this->redirectToRoute("admin_article");
        }      
    }
}
