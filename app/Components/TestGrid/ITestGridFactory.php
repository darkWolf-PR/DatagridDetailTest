<?php

declare(strict_types=1);

namespace App\Components\TestGrid;


interface ITestGridFactory
{
    /**
     * @return TestGrid
     */
    public function create(): TestGrid;
}