<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Film;
use App\Entity\Ville;
use App\Entity\Publicite;
use App\Entity\Reservation;
use App\Entity\SalleProjection;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Cinehub');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Admin', 'fa fa-home');
        yield MenuItem::linkToCrud('film', 'fas fa-list', Film::class);
        yield MenuItem::linkToCrud('publicite', 'fas fa-list', Publicite::class);
        yield MenuItem::linkToCrud('salle_projection', 'fas fa-list', SalleProjection::class);
        yield MenuItem::linkToCrud('reservation', 'fas fa-list', Reservation::class);
        yield MenuItem::linkToCrud('ville', 'fas fa-list', Ville::class);
        yield MenuItem::linkToCrud('category', 'fas fa-list', Category::class);




    }
}
