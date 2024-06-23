<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FilmController extends AbstractController
{
    #[Route('/film', name: 'app_film')]
    public function film(): Response
    {
        return $this->render('film/film.html.twig', [
            'controller_name' => 'FilmController',
        ]);
    }
}
