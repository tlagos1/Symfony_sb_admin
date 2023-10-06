<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent()]
final class SideBarCollapseItemsComponent
{
    public string $collapseListName;

    public string|null $icon;

    public array $items;
}
