<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            TextField::new('prenom'),
            IntegerField::new('num_tel'),
            ImageField::new('image')
            ->setBasePath('image/')
            ->setUploadDir('public/image')
            ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }

}
