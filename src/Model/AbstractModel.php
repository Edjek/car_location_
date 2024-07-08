<?php

namespace App\Model;

use App\Core\Database;

abstract class AbstractModel
{
    /**
     * @var \PDO
     */
    protected \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnectionInstance();
    }
}
