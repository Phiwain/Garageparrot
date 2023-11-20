<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Cars;
use App\Form\CarFilterType;
use App\Form\SearchForm;
use App\Repository\CarsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VoituresController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/voitures', name: 'voitures')]
    public function index(CarsRepository $repository, Request $request): Response
    {
        $voitures = $this->entityManager->getRepository(Cars::class)->findAll();
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $voitures = $repository->findSearch($data);

        return $this->render('voitures/index.html.twig', [
            'voitures' => $voitures,
            'form' => $form->createView()
        ]);
    }

    #[Route('/voiture/{slug}', name: 'voiture')]
    public function show($slug): Response
    {
        $voiture = $this->entityManager->getRepository(Cars::class)->findOneBy(['Slug' => $slug]);

        if (!$voiture) {
            return $this->redirectToRoute('voitures');
        }

        return $this->render('voitures/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }
}
