<?php

namespace App\Controller\Admin;


use App\Entity\Avs;
use App\Entity\User;
use App\Entity\Center;
use App\Entity\Article;
use App\Entity\Medecin;
use App\Entity\Category;
use App\Entity\Publicite;
use App\Entity\Commentaire;
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
            ->setTitle('autisme1');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Admin','fa fa-home');
        yield MenuItem::linkToCrud('Users','fas fa-user', User::class);
        yield MenuItem::linkToCrud('medecin', ' fas fa-list', Medecin::class);
        yield MenuItem::linkToCrud('avs', 'fas fa-list', Avs::class);
        yield MenuItem::linkToCrud('center','fas fa-list', Center::class);
        yield MenuItem::linkToCrud('publicite','fas fa-list', Publicite::class);
        
        




    }
}
