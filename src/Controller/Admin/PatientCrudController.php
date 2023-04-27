<?php

namespace App\Controller\Admin;

use App\Entity\Patient;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class PatientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Patient::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('Id')->hideOnForm(),
            TextField::new('Nom')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('Prenom')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('Age')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('Sexe')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            EmailField::new('Email')->hideOnIndex()->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TelephoneField::new('Telephone')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            // TextField::new('Suivie')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('id_Lit')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            // AssociationField::new('Suivie')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            // TextEditorField::new(''),
        ];
    }
    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Patient) return;
        // $entityInstance->setCreatedAt(New \DateTimeImmutable);
        parent:: persistEntity($em, $entityInstance);
    }
}
