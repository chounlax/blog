<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;


final class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            
        ]);
    }

    #[Route('/article', name: 'app_article')]
    public function article(Request $request, EntityManagerInterface $em): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        if ($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($article);
                 $em->flush();

                $this->addFlash('notice','Article envoyé');
                return $this->redirectToRoute('app_article');
            }
            }
        return $this->render('blog/article.html.twig', [
            'form' => $form->createView()

        ]);
    }
}
