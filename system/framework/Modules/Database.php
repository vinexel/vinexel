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

use Vinexel\Modules\Database\DatabaseConnection;
use Vinexel\Modules\Database\QueryBuilder;
use PDO;

/**
 * Class Database
 *
 * Provides a high-level abstraction layer for interacting with the database.
 * This class integrates the PDO-based connection with a QueryBuilder instance,
 * offering a clean and fluent API for executing queries and managing transactions.
 */
class Database
{
    /**
     * The active database connection instance.
     *
     * @var DatabaseConnection
     */
    private $dbConnection;

    /**
     * The query builder instance used for executing SQL queries.
     *
     * @var QueryBuilder
     */
    private $queryBuilder;

    /**
     * Create a new Database instance.
     *
     * @param DatabaseConnection|null $dbConnection
     */
    public function __construct(?DatabaseConnection $dbConnection = null)
    {
        $this->dbConnection = $dbConnection ?? new DatabaseConnection();
        $this->queryBuilder = new QueryBuilder($this->dbConnection);
    }

    /**
     * Get the active PDO connection.
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->dbConnection->getConnection();
    }

    /**
     * Begin a new database transaction.
     *
     * @return void
     */
    public function beginTransaction()
    {
        $this->getConnection()->beginTransaction();
    }

    /**
     * Commit the current database transaction.
     *
     * @return void
     */
    public function commit()
    {
        $this->getConnection()->commit();
    }

    /**
     * Roll back the current database transaction.
     *
     * @return void
     */
    public function rollBack()
    {
        $this->getConnection()->rollBack();
    }

    /**
     * Prepare a SQL query for execution.
     *
     * @param string $query
     * @return self
     */
    public function query(string $query): self
    {
        $this->queryBuilder->query($query);
        return $this;
    }

    /**
     * Bind a parameter to the query.
     *
     * @param mixed $param
     * @param mixed $value
     * @param int|null $type
     * @return self
     */
    public function bind($param, $value, $type = null): self
    {
        $this->queryBuilder->bind($param, $value, $type);
        return $this;
    }

    /**
     * Bind multiple parameters to the query in a batch.
     *
     * @param array $params
     * @return self
     */
    public function batchBind(array $params): self
    {
        $this->queryBuilder->batchBind($params);
        return $this;
    }

    /**
     * Execute the prepared query.
     *
     * @return bool
     */
    public function execute(): bool
    {
        return $this->queryBuilder->execute();
    }

    /**
     * Fetch all rows from the executed query as an array.
     *
     * @return array
     */
    public function resultSet(): array
    {
        return $this->queryBuilder->resultSet();
    }

    /**
     * Fetch a single row from the executed query.
     *
     * @return array|null
     */
    public function single(): ?array
    {
        return $this->queryBuilder->single();
    }

    /**
     * Get the number of affected rows from the last executed statement.
     *
     * @return int
     */
    public function rowCount(): int
    {
        return $this->queryBuilder->rowCount();
    }

    /**
     * Prepare a SQL statement manually.
     *
     * @param string $query
     * @return \PDOStatement
     */
    public function prepare(string $query)
    {
        return $this->queryBuilder->prepare($query);
    }

    /**
     * Fetch a single column value from the next row of a result set.
     *
     * @param int $column
     * @return mixed
     */
    public function fetchColumn($column = 0)
    {
        return $this->queryBuilder->fetchColumn($column);
    }

    /**
     * Close the current cursor, freeing the connection to execute new queries.
     *
     * @return void
     */
    public function closeCursor()
    {
        $this->queryBuilder->closeCursor();
    }

    /**
     * Get the current PDO statement instance.
     *
     * @return \PDOStatement|null
     */
    public function getStmt()
    {
        return $this->queryBuilder->getStmt();
    }

    /**
     * Close the current database connection.
     *
     * @return void
     */
    public function closeConnection(): void
    {
        $this->dbConnection->closeConnection();
    }

    /**
     * Get the ID of the last inserted row.
     *
     * @return string
     */
    public function lastInsertId(): string
    {
        return $this->getConnection()->lastInsertId();
    }
}
