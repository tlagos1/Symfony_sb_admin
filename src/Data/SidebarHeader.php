<?php

namespace App\Data;

class SidebarHeader
{
    public function __construct(
        public string     $headerName,
        public array|null $items,
        public array|null $collapseItems,
        public array|null $subCollapseItems,
    ){
    }
}
