<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $employee = new Employee();
        $form = $this->createForm(RegisterType::class, $employee);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $employee = $form->getData();

            $password = $encoder->hashPassword($employee,$employee->getPassword());
            $employee->setPassword($password);

            $this->entityManager->persist($employee);
            $this->entityManager->flush();

        }

        return $this->render('register/index.html.twig', [
            'form'=> $form->createView()
        ]);
    }
}
