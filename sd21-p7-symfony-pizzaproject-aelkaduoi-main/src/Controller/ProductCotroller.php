<?php
//
//namespace App\Controller;
//use App\Entity\Product;
//use Doctrine\Persistence\ManagerRegistry;
//use Symfony\Component\HttpFoundation\Response;
//use Symfony\Component\Routing\Annotation\Route;
//class ProductController extends AbstractController
//{
//    /**
//     * @param ManagerRegistry $doctrine
//     * @return Response
//     */
//    #[Route('/product', name: 'create_product')]
//    public function createProduct(ManagerRegistry $doctrine): Response
//    {
//        $entityManager = $doctrine->getManager();
//
//        $product = new Product();
//        $product->setName('Keyboard');
//        $product->setPrice(1999);
//        $product->setDescription('Ergonomic and stylish!');
//
//        // tell Doctrine you want to (eventually) save the Product (no queries yet)
//        $entityManager->persist($product);
//
//        // actually executes the queries (i.e. the INSERT query)
//        $entityManager->flush();
//
//        return new Response('Saved new product with id '.$product->getId());
//    }
//}