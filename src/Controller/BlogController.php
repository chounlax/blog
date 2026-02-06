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

    #[Route('/article', name: 'app_article')]
    public function article(): Response
    {
        return $this->render('blog/article.html.twig', [
            
        ]);
    }
}
