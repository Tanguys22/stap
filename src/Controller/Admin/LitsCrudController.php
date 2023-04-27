<?php

namespace App\Controller\Admin;

use App\Entity\Lits;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lits::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id')->hideOnIndex(),
            TextField::new('Nom_Lit')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            TextField::new('Etat')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            // TextEditorField::new('description'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Lits) return;
        // $entityInstance->setCreatedAt(New \DateTimeImmutable);
        parent:: persistEntity($em, $entityInstance);
    }
}
