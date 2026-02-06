<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CommentaireType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Commentaire;
use App\Form\CategorieType;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\ArticleType;
use App\Entity\Article;


final class BlogController extends AbstractController
{
    #[Route('/', name: 'app_blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
           
        ]);
    }

    #[Route('/commentaire', name: 'app_commentaire')]
    public function commentaire(Request $request, EntityManagerInterface $em): Response
    {   
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class, $commentaire);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($commentaire);
                $em->flush();
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('app_commentaire');
            }
            }
        return $this->render('blog/commentaire.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/categorie', name: 'app_categorie')]
public function categorie(Request $request, EntityManagerInterface $em): Response
{
    $categorie = new Categorie();
    $form = $this->createForm(CategorieType::class, $categorie);
		
    if($request->isMethod('POST')){
        $form->handleRequest($request);
        if ($form->isSubmitted()&&$form->isValid()){
            $em->persist($categorie);	
				$em->flush();
            $this->addFlash('notice','Message envoyé'); 
            return $this->redirectToRoute('app_categorie');
        }
    }
    
    return $this->render('blog/categorie.html.twig', [
        'form' => $form->createView()
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
