<?php

namespace App\Controller\Admin;

use App\Entity\CoverHomepage;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CoverHomepageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CoverHomepage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            ImageField::new('image')
                ->setBasePath('/images')
                ->setUploadDir('public/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false), // Set the required option to false
        ];
    }
}
