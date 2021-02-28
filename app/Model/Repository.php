<?php

declare(strict_types=1);

namespace App\Model;

use Nette\Database\Explorer;
use Nette\SmartObject;


abstract class Repository
{
    use SmartObject;

    /** @var Explorer */
    protected $db;


    public function __construct(Explorer $database)
    {
        $this->db = $database;
    }
}