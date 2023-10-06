<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class SideBarSubCollapseItemsComponent
{
    public string $mainCollapseListName;

    public string $icon;

    public array $collapseItems;
}
