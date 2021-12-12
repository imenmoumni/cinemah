<?php

namespace App\Controller\Admin;

use App\Entity\Medecin;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MedecinCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Medecin::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('category'),
            TextField::new('nom'),
            TextField::new('adresse'),
            NumberField::new('num_tel'),
            TextField::new('description'),
            ImageField::new('image')
            ->setBasePath('image/')
            ->setUploadDir('public/image')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }

}
