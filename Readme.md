# Symfony project: sb_admin - Bootstrap 5.3.2

Symfony web project for sb_admin template using Bootstrap 5.3.2.
This repository is intended to provide the community a symfony project with this template.

This project includes a basic session control configuration.

If you like this project give it a star :)

## Setup

Webpack
```
npm run build 
```
Composer
```
composer install
```
Enable sql in .env
```
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=8.0.32&charset=utf8mb4"
# DATABASE_URL="mysql://app:!ChangeMe!@127.0.0.1:3306/app?serverVersion=10.5.20-MariaDB&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"
```
Populate database and add default credentials
```
symfony console doctrine:fixtures:load
```

Run server
```
symfony server:start --no-tls
```

## Navigation Items

The navigation items are managed in /src/Service/SidebarItems.

To use SidebarItems in the driver, it must be injected and configured in the following way:

```
public function index(SidebarItems $sidebarItems, Request $request, RouterInterface $router): Response
{

    $currentPath = $router->getRouteCollection()->get(
        $request->attributes->get("_route")
    ) -> getPath();

    $sidebarItems->setCurrentPath($currentPath);

    return $this->render('dashboard/index.html.twig', [
        'sidebarItems' => $sidebarItems->getSidebarMap(),
        ...
    ]);
}
```

In parallel the path must be added in the makeSidebarMap() function inside the SidebarItems object.

This project supports a single Nav element and contracted Nav elements  

To differentiate each nav format the SidebarHeader object provides a field for each format:
- items: used for SidebarItemData objects
- collapseItems: used for SidebarCollapseItemsData objects
- subCollapseItems: used for double-depth SidebarCollapseItemsData objects.