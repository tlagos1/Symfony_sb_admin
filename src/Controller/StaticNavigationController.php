<?php

namespace App\Controller;

use App\Service\SidebarItems;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class StaticNavigationController extends AbstractController
{
    #[Route('/static/navigation', name: 'app_static_navigation')]
    public function index(SidebarItems $sidebarItems, Request $request, RouterInterface $router): Response
    {

        $currentPath = $router->getRouteCollection()->get(
            $request->attributes->get("_route")
        ) -> getPath();

        $sidebarItems->setCurrentPath($currentPath);

        return $this->render('static_navigation/index.html.twig', [
            'sidebarItems' => $sidebarItems->getSidebarMap(),
            'controller_name' => 'StaticNavigationController',
        ]);
    }
}
