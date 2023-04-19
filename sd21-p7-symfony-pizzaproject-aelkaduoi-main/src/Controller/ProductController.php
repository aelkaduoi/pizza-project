<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

        #[Route('/product/{id}', name:'product_show')]
        public function show(ManagerRegistry $doctrine, string $id): Response{
          $category=$doctrine->getRepository(Category::class)->find($id);

          if (!$category){
              throw $this->createNotFoundException(
                  'No product for id '. $id
              );
          }
            return $this->render('product.html.twig', ['category'=>$category]);
        }

}