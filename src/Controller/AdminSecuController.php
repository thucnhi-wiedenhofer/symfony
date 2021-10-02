<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/registration", name="registration")
     */
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this-> createForm(RegisterType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $passwordCrypt = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordCrypt);
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute("index");
        }
        return $this->render('admin_secu/registration.html.twig',[
           "form" => $form->createView()
        ]);
    }
}
