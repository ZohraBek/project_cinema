<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture

{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }
  
    private const NB_ARTICLES = 20;

    private const CATEGORIES = ["Action","Comedie", "Drame", "Horreur", "Science-fiction", "Thriller", "Western"];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $categories = [];

        foreach (self::CATEGORIES as $categoryTitle) {
            $category = new Category();
            $category->setTitle($categoryTitle);

            $manager->persist($category);
            $categories[] = $category;
        }

        for ($i = 0; $i < self::NB_ARTICLES; $i++) {
            $article = new Article();
            $article
                ->setTitle($faker->words($faker->numberBetween(4, 7), true))
                ->setContent($faker->realTextBetween(400, 1500))
                ->setCreatedAt(DateTimeImmutable::createFromMutable($faker->dateTimeBetween('-2 years')));
               

            $manager->persist($article);
        }

        $user = new User();
        $user
            ->setEmail('user@cinema.net')
            ->setPassword('user');

        $manager->persist($user);

        $admin = new User();
        $admin
            ->setEmail('admin@cinema.net')
            ->setPassword('admin')
            ->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        // Envoyer les modifications en base de données
        $manager->flush();
    }
}