<?php

namespace App\Controller\Admin;

use App\Entity\Salle;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SalleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Salle::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id')->hideOnIndex()->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('Nom')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            NumberField::new('Nombre_Lit')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            NumberField::new('NbLits_occupe')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('Services')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            // TextEditorField::new('description'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Salle) return;
        // $entityInstance->setCreatedAt(New \DateTimeImmutable);
        parent:: persistEntity($em, $entityInstance);
    }
}
