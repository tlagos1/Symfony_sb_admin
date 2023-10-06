<?php

namespace App\Data;

class SidebarCollapseItemsData
{
    public function __construct(
        public string      $collapseSetName,
        public string|null $collapseSetIcon,
        public array       $items
    ){
    }
}