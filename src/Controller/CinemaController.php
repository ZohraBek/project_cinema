<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CinemaController extends AbstractController
{
    #[Route('/cinema', name: 'app_cinema')]
    public function cinema(): Response
    {
        return $this->render('cinema/cinema.html.twig', [
            'controller_name' => 'CinemaController',
        ]);
    }
}
