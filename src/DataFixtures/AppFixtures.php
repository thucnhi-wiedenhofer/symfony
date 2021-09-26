<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $a1 = new Post();
        $a1->setTitle("Recettes Express");
        $a1->setContent("Repas prêt en 30 minutes chrono");
        $a1->setDate(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "2021-09-13 12:00:00"));
        $a1->setImg("moules.jpg");
        $manager->persist($a1);

        $a2 = new Post();
        $a2->setTitle("Recettes exotiques");
        $a2->setContent("A la découverte des saveurs orientales");
        $a2->setDate(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "2021-09-20 12:00:00"));
        $a2->setImg("bol.jpg");
        $manager->persist($a2);

        $a3 = new Post();
        $a3->setTitle("Recettes traditionnelles");
        $a3->setContent("Redécouvrons les plats typiques de nos régions");
        $a3->setDate(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "2021-09-15 12:00:00"));
        $a3->setImg("plat.jpg");
        $manager->persist($a3);

        $c1 = new Comment();
        $c1->setAuthor("");
        $c1->setContent("Délicieux et rapides, que demander de plus!");
        $c1->setDate(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "2021-09-13 12:00:00"));
        $c1->setPost($a1);
        $manager->persist($c1);

        $c2 = new Comment();
        $c2->setAuthor("");
        $c2->setContent("Ces recettes nous font voyager");
        $c2->setDate(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "2021-09-13 12:00:00"));
        $c2->setPost($a2);
        $manager->persist($c2);

        $c3 = new Comment();
        $c3->setAuthor("");
        $c3->setContent("Ma grand mère faisait la même recette");
        $c3->setDate(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', "2021-09-13 12:00:00"));
        $c3->setPost($a3);
        $manager->persist($c3);

        $manager->flush();
    }
}
