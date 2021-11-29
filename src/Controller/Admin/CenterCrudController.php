<?php

namespace App\Controller\Admin;

use App\Entity\Center;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CenterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Center::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            NumberField::new('lon'),
            NumberField::new('lat'),
            ImageField::new('image')
            ->setBasePath('image/')
            ->setUploadDir('public/image')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
    
}
