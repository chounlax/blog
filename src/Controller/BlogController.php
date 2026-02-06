<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CategorieType;

final class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(): Response
    {
        $form = $this->createForm(CategorieType::class);
        return $this->render('blog/index.html.twig', [
            'form' => $form->createView()  
        ]);
    }
    #[Route('/categorie', name: 'app_categorie')]
public function categorie(): Response
{
return $this->render('blog/categorie.html.twig', [
]);
}
}
