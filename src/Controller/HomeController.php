<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\GameRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(GameRepository $gameRepository,Request $request): Response
    {
        return $this->render('home/index.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }
}
