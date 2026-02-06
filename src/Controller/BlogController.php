<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            
        ]);
    }
    #[Route('/commentaire', name: 'app_commentaire')]
    public function commentaire(): Response
    {
        return $this->render('blog/commentaire.html.twig', [
            
        ]);
    }
}
