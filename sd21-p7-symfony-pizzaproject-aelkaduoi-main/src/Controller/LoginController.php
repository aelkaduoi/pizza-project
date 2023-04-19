<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Bestelling;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class LoginController extends AbstractController
{


    #[Route('/login', name: 'login')]
public function show(ManagerRegistry $doctrine): Response
    {
        $bestelling=$doctrine->getRepository(bestelling::class)->findAll();

        if (!$bestelling){
            throw $this->createNotFoundException(
                'geen id'
            );
        }
        return $this->render('login.html.twig', ['bestelling'=>$bestelling]);
    }



}