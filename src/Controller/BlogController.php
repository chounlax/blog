<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\CategorieType;
use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;

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
public function categorie(Request $request, EntityManagerInterface $em): Response
{
    $categorie = new Contact();
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
}
