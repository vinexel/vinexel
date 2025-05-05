<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license Envato License
 */

namespace Vision\Modules;

use \Vinexel\Modules\Database\DatabaseConnection;
use \Vinexel\Modules\Database\QueryBuilder;

class Database
{
    private $dbConnection;
    private $queryBuilder;

    // public function __construct()
    // {
    //     $this->dbConnection = new DatabaseConnection(); // Database connection
    //     $this->queryBuilder = new QueryBuilder($this->dbConnection); // Query builder
    // }

    public function __construct(DatabaseConnection $dbConnection = null, QueryBuilder $queryBuilder = null)
    {
        $this->dbConnection = $dbConnection ?? new DatabaseConnection();
        $this->queryBuilder = $queryBuilder ?? new QueryBuilder($this->dbConnection);
    }


    public function query($query)
    {
        $this->queryBuilder->query($query);
        return $this;  // Return $this for chaining method
    }

    public function bind($param, $value, $type = null)
    {
        $this->queryBuilder->bind($param, $value, $type);
        return $this;  // Return $this for chaining method
    }

    public function batchBind(array $params)
    {
        $this->queryBuilder->batchBind($params);
        return $this;  // Return $this for chaining method
    }

    public function execute()
    {
        return $this->queryBuilder->execute();
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

    /**
     * Menutup koneksi database
     */
    public function closeConnection()
    {
        $this->dbConnection->closeConnection(); // Memanggil closeConnection dari DatabaseConnection
    }
}
