<?php

namespace App\Service;

use App\Data\SidebarCollapseItemsData;
use App\Data\SidebarHeader;
use App\Data\SidebarItemData;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;

final class SidebarItems
{

    private string|null $currentPath = null;
    private array|null $sidebarMap = null;

    private RouteCollection $routeCollection;

    public function __construct(RouterInterface $router)
    {
        $this->routeCollection = $router->getRouteCollection();
    }

    public function setCurrentPath(string $path): void
    {
        $this->currentPath = $path;
    }

    public function getSidebarMap(): array|null
    {
        $this->makeSidebarMap();

        return $this->sidebarMap;
    }

    private function makeSidebarMap(): void
    {
        if($this->currentPath == null){
            return;
        }
        $this->sidebarMap = array(
            new SidebarHeader(
                headerName: "CORE",
                items: array(
                    new SidebarItemData(
                        isRoute: $this->routeCollection->get("app_dashboard")->getPath() == $this->currentPath,
                        routePath: $this->routeCollection->get("app_dashboard")->getPath(),
                        routeName: "Dashboard",
                        icon: "fas fa-tachometer-alt"
                    )
                ),
                collapseItems: null,
                subCollapseItems: null
            ),
            new SidebarHeader(
                headerName: "INTERFACE",
                items: null,
                collapseItems: array(
                    new SidebarCollapseItemsData(
                        collapseSetName: "Layouts",
                        collapseSetIcon:"fas fa-columns",
                        items: array(
                            new SidebarItemData(
                                isRoute: $this->routeCollection->get("app_static_navigation")->getPath() == $this->currentPath,
                                routePath: $this->routeCollection->get("app_static_navigation")->getPath(),
                                routeName: "Static Navigation",
                                icon: null
                            ),
                            new SidebarItemData(
                                isRoute: $this->routeCollection->get("app_light_sidenav")->getPath() == $this->currentPath,
                                routePath: $this->routeCollection->get("app_light_sidenav")->getPath(),
                                routeName: "Light Sidenav",
                                icon: null
                            )
                        )
                    )
                ),
                subCollapseItems: array(
                    new SidebarCollapseItemsData(
                        collapseSetName: "Pages",
                        collapseSetIcon:"fas fa-book-open",
                        items: array(
                            new SidebarCollapseItemsData(
                                collapseSetName: "Authentication",
                                collapseSetIcon: null,
                                items: array(
                                    new SidebarItemData(
                                        isRoute: $this->routeCollection->get("app_pages_login")->getPath() == $this->currentPath,
                                        routePath: $this->routeCollection->get("app_pages_login")->getPath(),
                                        routeName: "Login",
                                        icon: null
                                    ),
                                    new SidebarItemData(
                                        isRoute: $this->routeCollection->get("app_pages_register")->getPath() == $this->currentPath,
                                        routePath: $this->routeCollection->get("app_pages_register")->getPath(),
                                        routeName: "Register",
                                        icon: null
                                    ),
                                    new SidebarItemData(
                                        isRoute: $this->routeCollection->get("app_pages_forgot")->getPath() == $this->currentPath,
                                        routePath: $this->routeCollection->get("app_pages_forgot")->getPath(),
                                        routeName: "Forgot Password",
                                        icon: null
                                    ),
                                )
                            ),
                            new SidebarCollapseItemsData(
                                collapseSetName: "Error",
                                collapseSetIcon: null,
                                items: array(
                                    new SidebarItemData(
                                        isRoute: $this->routeCollection->get("app_pages401")->getPath() == $this->currentPath,
                                        routePath: $this->routeCollection->get("app_pages401")->getPath(),
                                        routeName: "401 Page",
                                        icon: null
                                    ),
                                    new SidebarItemData(
                                        isRoute: $this->routeCollection->get("app_pages404")->getPath() == $this->currentPath,
                                        routePath: $this->routeCollection->get("app_pages404")->getPath(),
                                        routeName: "404 Page",
                                        icon: null
                                    ),
                                    new SidebarItemData(
                                        isRoute: $this->routeCollection->get("app_pages500")->getPath() == $this->currentPath,
                                        routePath: $this->routeCollection->get("app_pages500")->getPath(),
                                        routeName: "500 Page",
                                        icon: null
                                    ),
                                )
                            )
                        )
                    )
                )
            ),
            new SidebarHeader(
                headerName: "Addons",
                items: array(
                    new SidebarItemData(
                        isRoute: $this->routeCollection->get("app_charts")->getPath() == $this->currentPath,
                        routePath: $this->routeCollection->get("app_charts")->getPath(),
                        routeName: "Charts",
                        icon: "fas fa-chart-area"
                    ),
                    new SidebarItemData(
                        isRoute: $this->routeCollection->get("app_tables")->getPath() == $this->currentPath,
                        routePath: $this->routeCollection->get("app_tables")->getPath(),
                        routeName: "Tables",
                        icon: "fas fa-table"
                    )
                ),
                collapseItems: null,
                subCollapseItems: null
            )
        );
    }
}