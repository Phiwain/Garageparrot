<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class CarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cars::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(propertyName: 'Name'),
            SlugField::new('Slug')->setTargetFieldName('Name'),
            NumberField::new('Kilometrage'),
            AssociationField::new(propertyName: 'Carburant'),
            AssociationField::new('Options'),
            NumberField::new(propertyName: 'Year'),
            TextareaField::new(propertyName: 'description'),
            NumberField::new('Price'),
            ImageField::new('Illustration')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('galery1')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('galery2')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('galery3')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('galery4')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('galery5')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            ImageField::new('galery6')
                ->setBasePath('uploads/images/Cars')
                ->setUploadDir('public/uploads/images/Cars')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),



        ];
    }
}
