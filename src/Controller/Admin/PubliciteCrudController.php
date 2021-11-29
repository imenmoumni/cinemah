<?php

namespace App\Controller\Admin;

use App\Entity\Publicite;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PubliciteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Publicite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),

            TextField::new('description'),
            NumberField::new('lon'),
            NumberField::new('lat'),
            ImageField::new('image')
            ->setBasePath('image/')
            ->setUploadDir('public/image')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }

}
     
