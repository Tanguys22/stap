<?php

namespace App\Controller\Admin;

use App\Entity\Suivie;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SuivieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Suivie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('date_entre')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
                // ->setFormat('yyyy.MM.dd G'),
            TextField::new('date_Sortie')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
                // ->setFormat('yyyy.MM.dd G'),
            TextField::new('Salle')->setColumns('col-sm-6 col-lg-5 col-xxl-3'),
            // TextEditorField::new('description'),
        ];
    }

    public function persistEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Suivie) return;
        // $entityInstance->setCreatedAt(New \DateTimeImmutable);
        parent:: persistEntity($em, $entityInstance);
    }
}
