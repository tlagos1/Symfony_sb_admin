<?php

namespace App\Data;

class SidebarItemData
{
    public function __construct(
        public bool $isRoute,
        public string $routePath,
        public string $routeName,
        public string|null $icon
    ){
    }
}