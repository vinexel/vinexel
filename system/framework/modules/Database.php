<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vision\Modules;

use Iconic\Core\Modules\Database\DatabaseConnection;
use Iconic\Core\Modules\Database\QueryBuilder;

class Database
{
    private $dbConnection;
    private $queryBuilder;

    public function __construct()
    {
        $this->dbConnection = new DatabaseConnection(); // Koneksi database
        $this->queryBuilder = new QueryBuilder($this->dbConnection); // Query builder yang mengakses koneksi
    }

    public function query($query)
    {
        $this->queryBuilder->query($query);
    }

    public function bind($param, $value, $type = null)
    {
        $this->queryBuilder->bind($param, $value, $type);
    }

    public function execute()
    {
        $this->queryBuilder->execute();
    }

    public function resultSet()
    {
        return $this->queryBuilder->resultSet();
    }

    public function single()
    {
        return $this->queryBuilder->single();
    }

    public function rowCount()
    {
        return $this->queryBuilder->rowCount();
    }

    public function prepare($query)
    {
        return $this->queryBuilder->prepare($query);
    }
}
