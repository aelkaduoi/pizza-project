<?php

namespace App\Controller;

use App\Entity\Bestelling;
use App\Form\BestelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BestelController extends AbstractController
{
    #[Route('/bestel/{id}', name: 'bestel')]
    public function bestel(Request $request, EntityManagerInterface $em)
    {
      $bestel=new Bestelling();
      $form=$this->createForm(BestelType::class,$bestel);
      return $this->renderForm('form.html.twig', [
          'departmentForm' =>$form
      ]);
    }


}
