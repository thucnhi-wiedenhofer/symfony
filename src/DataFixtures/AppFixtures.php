<?php

namespace App\DataFixtures;

use App\Entity\Post;
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

        $manager->flush();
    }
}
