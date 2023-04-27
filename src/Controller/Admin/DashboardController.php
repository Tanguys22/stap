<?php

namespace App\Controller\Admin;

use App\Entity\Lits;
use App\Entity\Suivie;
use App\Entity\Patient;
use Symfony\Component\HttpFoundation\Response;
use App\Controller\Admin\PatientCrudController;
use App\Entity\Salle;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Menu\SubMenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]

    public function index(): Response
    {
        //  return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(LitsCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sout App');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section('Hopital');

        // yield MenuItem::section('Salle');


        yield MenuItem::subMenu('Salle', 'fas fa-person-booth')->setSubItems([
            MenuItem::linkToCrud('Ajouter une Salle', 'fas fa-plus', Salle::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Montrer les Salles', 'fas fa-eye', Salle::class)
        ]);

        // yield MenuItem::section('Gestion des Lits','fas fa-bed');

        yield MenuItem::subMenu('Gestion des lits', 'fas fa-bed')->setSubItems([
            MenuItem::linkToCrud('Ajouter un Lit', 'fas fa-plus', Lits::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Montrer un Lit', 'fas fa-eye',  Lits::class)
        ]);

        // yield MenuItem::section('Patient');

        yield MenuItem::subMenu('Patient', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Ajouter un Patient', 'fas fa-plus', Patient::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Montrer un Patient', 'fas fa-eye', Patient::class)
        ]);


        // yield MenuItem::section('Suivie du Patient');

        yield MenuItem::subMenu('Suivie du Patient', 'fa-solid fa-hospital-user')->setSubItems([
            MenuItem::linkToCrud('Ajouter un Suivie', 'fas fa-plus', Suivie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Montrer un Suivie', 'fas fa-eye',  Suivie::class)
        ]);

        yield MenuItem::section('Parametre');

        // yield MenuItem::linkToCrud('Gestion des Lits', 'fas fa-bed', Lits::class);
        // yield MenuItem::linkToCrud('Suivie du Patient', 'fa-solid fa-hospital-user', Suivie::class);
        // yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
