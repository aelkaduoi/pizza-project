<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/home', name: 'category')]
    public function showCategory(ManagerRegistry $doctrine):Response
    {
        $category = $doctrine->getRepository(Category::class)->findAll();
        return $this->render('home.html.twig', ['category'=>$category]);
    }



}