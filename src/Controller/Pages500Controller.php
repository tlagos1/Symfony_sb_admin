<?php

namespace App\Controller;

use App\Service\SidebarItems;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;

class Pages500Controller extends AbstractController
{
    #[Route('/pages500', name: 'app_pages500')]
    public function index(SidebarItems $sidebarItems, Request $request, RouterInterface $router): Response
    {

        $currentPath = $router->getRouteCollection()->get(
            $request->attributes->get("_route")
        ) -> getPath();

        $sidebarItems->setCurrentPath($currentPath);

        return $this->render('pages500/index.html.twig', [
            'sidebarItems' => $sidebarItems->getSidebarMap(),
            'controller_name' => 'Pages500Controller',
        ]);
    }
}
