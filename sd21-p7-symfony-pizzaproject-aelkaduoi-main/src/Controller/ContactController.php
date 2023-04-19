<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
class ContactController extends AbstractController
{
    #[route('/contact', name:'contact')]
    public function conact():Response{
        return $this->render('contact.html.twig');
    }
}