<?php

namespace Elwira\Models;

use PDOException;
use PDO;

class PlatformModel extends BaseModel
{
    private $conn;
    private $table_users = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    // Example query for user
    public function getUsersByBalance()
    {
        $query = "SELECT * FROM " . $this->table_users . " ORDER BY balance DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
