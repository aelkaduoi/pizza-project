<?php

namespace App\Controller;
use App\Entity\Bestelling;

use App\Entity\Product;
use App\Form\BestelType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class MenuController extends AbstractController
{
    #[Route('/menu', name:'menu')]
    public function conact():Response{
        return $this->render('product.html.twig');
    }

    #[Route('/bestel/{id}',name:'bestel')]
    public function bestel(Request $request,EntityManagerInterface $em, int $id)
        //Deze functie handelt een bestelling af door het opslaan van gegevens van het bestelformulier in de database met behulp van Doctrine's EntityManager.
    {
        $bestel = new Bestelling();
        $pizza = $em->getRepository(Product::class)->find($id);
        //haalt het Product-entity op uit de database met de gegeven $id en slaat het op in de $pizza variabele.
        $bestel->setProduct($pizza);
        //koppelt het gevonden Product-entity aan het Bestelling-entity dat eerder werd gemaakt.
        $form = $this->createForm(BestelType::class, $bestel);
        // maakt een formulierobject van het BestelType-formulier voor het Bestelling-entity.

        $form->handleRequest($request);
        //Hiermee wordt het formulier behandeld en gevalideerd op basis van de ingediende gegevens uit het Request-object.
        if ($form->isSubmitted() && $form->isValid())
        //Hiermee wordt gecontroleerd of het formulier is ingediend en geldig is.
        {
            $bestel = $form->getData();
            //Hiermee worden de gegevens uit het ingediende en geldige formulier opgehaald en toegewezen aan de variabele $bestel.
            $em->persist($bestel);
            //Hiermee wordt het $bestel-object opgeslagen in de database.
            $em->flush();
            // Hiermee worden alle wijzigingen in de database daadwerkelijk doorgevoerd.
            $this->addFlash('success', "Je pizza is onderweg!");
           // Hiermee wordt een success-flash message aan de sessie toegevoegd.
            return $this->redirectToRoute('home');
        }

        return $this->renderForm('form.html.twig',[
            'bestelForm' => $form
        ]);
    }

}