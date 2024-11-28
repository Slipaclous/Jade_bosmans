<?php

namespace App\Controller;

use App\Repository\CoverHomepageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(CoverHomepageRepository $coverHomepageRepository): Response
    {
        $coverHomepage= $coverHomepageRepository->findAll();
        return $this->render('homepage/index.html.twig', [
            'coverHomepage' => $coverHomepage,
            'title' => 'Welcome to your Symfony Homepage',
        ]);
    }
}
