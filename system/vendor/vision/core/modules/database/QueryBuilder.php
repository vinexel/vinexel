<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Database;

use PDO;
use PDOException;

class QueryBuilder
{
    private $conn;
    private $stmt;

    public function __construct(DatabaseConnection $dbConnection)
    {
        $this->conn = $dbConnection->getConnection();
    }

    public function query($query)
    {
        if (!$this->conn) {
            throw new PDOException("No 'query' PDO connection established");
        }
        $this->stmt = $this->conn->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function prepare($query)
    {
        if (!$this->conn) {
            throw new PDOException("No 'prepare' PDO connection established");
        }
        return $this->conn->prepare($query);
    }
}
