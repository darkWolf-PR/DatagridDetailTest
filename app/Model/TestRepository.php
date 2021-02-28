<?php

declare(strict_types=1);

namespace App\Model;

use Nette\Database\Explorer;


class TestRepository extends Repository
{
    const TABLE_NAME = 'test';


    public function __construct(Explorer $database)
    {
        parent::__construct($database);
    }


    public function getGridData()
    {
        return $this->db->table(self::TABLE_NAME);
    }
}