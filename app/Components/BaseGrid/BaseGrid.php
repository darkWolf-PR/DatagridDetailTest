<?php

declare(strict_types=1);

namespace App\Components\BaseGrid;

use Nette\Application\UI\Control;
use Ublaboo\DataGrid\DataGrid;


abstract class BaseGrid extends Control
{
    public function __construct()
    {
        DataGrid::$iconPrefix = 'fas fa-fw fa-';
    }
}