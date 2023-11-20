<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/avis', name: 'avis')]
    public function index(
        Request $request,
        AvisRepository $avisRepository

    ): Response
    {
        $avis = $avisRepository->findAvis();
        $avi = new Avis();
        $form = $this->createForm(AvisType::class, $avi);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $avi->setIsPublished(false);
            $avi = $form->getData();
            $this->entityManager->persist($avi);
            $this->entityManager->flush();

            return $this->redirectToRoute('thk');

        }


        return $this->render('avis/index.html.twig', [
            'form'=>$form->createView(),
            'avis'=>$avis
        ]);
    }
}
