<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class SideBarItemComponent
{

    public bool $isRoute;

    public string $routePath;

    public string $routeName;

    public string $icon;
}
