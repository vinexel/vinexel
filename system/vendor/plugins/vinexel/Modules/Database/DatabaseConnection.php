<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Database;

use Vision\Modules\Config;

use PDO;
use PDOException;

class DatabaseConnection
{
    private $conn;

    public function __construct()
    {
        $host = Config::get('DB_HOST');
        $dbname = Config::get('DB_NAME');
        $username = Config::get('DB_USER');
        $password = Config::get('DB_PASSWORD');

        if (empty($host) || empty($dbname) || empty($username)) {
            throw new PDOException('Database configuration is not properly set.');
        }

        $dsn = "mysql:host=$host;dbname=$dbname";

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->conn = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
