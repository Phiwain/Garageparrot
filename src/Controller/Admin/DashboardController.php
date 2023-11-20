<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use App\Entity\Car;
use App\Entity\Carburants;
use App\Entity\Cars;
use App\Entity\Contact;
use App\Entity\Employee;
use App\Entity\Opening;
use App\Entity\Options;
use App\Entity\Services;
use App\Entity\Voitures;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V. PARROT - Espace professionel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Menu', 'fa fa-home');
        yield MenuItem::linkToCrud('Employés', 'fas fa-user', Employee::class);
        yield MenuItem::linkToCrud('Carburants', 'fas fa-gas-pump', Carburants::class);
        yield MenuItem::linkToCrud('Options', 'fas fa-list', Options::class);
        yield MenuItem::linkToCrud('Cars', 'fas fa-car', Cars::class);
        yield MenuItem::linkToCrud('Ouverture', 'fas fa-clock', Opening::class);
        yield MenuItem::linkToCrud('Services', 'fas fa-bell-concierge', Services::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-comment', Avis::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-comment', Contact::class);
    }
}
