<?php

namespace App\Controller\Admin;

use App\Entity\Avs;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use phpDocumentor\Reflection\Types\Integer;

class AvsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Avs::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
           
            TextField::new('nom'),
            NumberField::new('num_tel'),
            TextField::new('adresse'),
            TextField::new('email'),
            NumberField::new('experience'),
            TextField::new('diplome'),
            ImageField::new('image')
            ->setBasePath('image/')
            ->setUploadDir('public/image')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
    
}
