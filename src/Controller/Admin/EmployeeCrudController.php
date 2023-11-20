<?php

namespace App\Controller\Admin;

use App\Entity\Employee;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class EmployeeCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public static function getEntityFqcn(): string
    {
        return Employee::class;
    }
    private $entityManager;

    public function __construc(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;}
    public function configureFields(string $pageName): iterable
    {
        return [
            // ... other fields
            EmailField::new('Email'),
            TextField::new('password'),
            TextField::new('nom'),
            TextField::new('prenom'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Hash the password before persisting
        $this->encodePassword($entityInstance);

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        // Hash the password before updating
        $this->encodePassword($entityInstance);

        parent::updateEntity($entityManager, $entityInstance);
    }

    private function encodePassword(Employee $employee): void
    {
        $plainPassword = $employee->getPassword();
        if ($plainPassword) {
            $encodedPassword = $this->passwordEncoder->hashPassword($employee, $plainPassword);
            $employee->setPassword($encodedPassword);
        }
    }
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
