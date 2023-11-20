<?php
namespace App\Controller;

use App\Entity\Opening;
use App\Repository\FooterRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/footer', name: 'footer')]
    public function index(): Response
    {
        $openings = $this->entityManager->getRepository(Opening::class)->findAll();

        return $this->render('partial/footer.html.twig', [
            'openings' => $openings,
        ]);
    }
}