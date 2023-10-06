<?php

namespace App\Controller;

use App\Service\SidebarItems;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class PagesLoginController extends AbstractController
{
    #[Route('/pages/login', name: 'app_pages_login')]
    public function index(SidebarItems $sidebarItems, Request $request, RouterInterface $router): Response
    {

        $currentPath = $router->getRouteCollection()->get(
            $request->attributes->get("_route")
        ) -> getPath();

        $sidebarItems->setCurrentPath($currentPath);

        return $this->render('pages_login/index.html.twig', [
            'sidebarItems' => $sidebarItems->getSidebarMap(),
            'controller_name' => 'PagesLoginController',
        ]);
    }
}
