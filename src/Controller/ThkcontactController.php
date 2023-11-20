<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThkcontactController extends AbstractController
{
    #[Route('/thkcontact', name: 'thkcontact')]
    public function index(): Response
    {
        return $this->render('contact/thk.html.twig');
    }
}
