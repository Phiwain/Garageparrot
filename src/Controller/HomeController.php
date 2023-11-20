<?php

namespace App\Controller;



use App\Entity\Opening;
use App\Repository\AvisRepository;
use App\Repository\FooterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('', name: 'home')]
    public function index(AvisRepository $avisRepository): Response
    {

        $avis = $avisRepository->findAvis();
        $openings = $this->entityManager->getRepository(Opening::class)->findAll();
        return $this->render('home/index.html.twig', [
            'avis'=>$avis,
            'openings'=>$openings
        ]);
    }
}
