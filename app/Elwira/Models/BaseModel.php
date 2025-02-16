<?php

namespace Elwira\Models;

use Vision\Modules\Database;

class BaseModel
{
    private $conn;

    public function __construct(Database $db)
    {
        $this->conn = $db;
    }
}
