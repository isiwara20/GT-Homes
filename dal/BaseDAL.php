<?php

declare(strict_types=1);

/**
 * GT HOMES — Base DAL (Data Access Layer)
 *
 * All DAL classes extend this.
 * Provides a shared PDO connection and helper query methods.
 *
 * DAL rules:
 *  - ALL SQL lives here — never in BLL or Controllers
 *  - ONLY PDO prepared statements
 *  - Returns arrays (not objects) to BLL
 *  - Never renders HTML
 *  - Never accesses $_POST, $_GET, $_SESSION directly
 */
abstract class BaseDAL
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Execute a SELECT query and return all rows.
     *
     * @param  array<string, mixed> $params
     * @return array<int, array<string, mixed>>
     */
    protected function fetchAll(string $sql, array $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Execute a SELECT query and return a single row.
     *
     * @param  array<string, mixed> $params
     * @return array<string, mixed>|null
     */
    protected function fetchOne(string $sql, array $params = []): ?array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch();
        return $row !== false ? $row : null;
    }

    /**
     * Execute an INSERT, UPDATE, or DELETE statement.
     * Returns the number of affected rows.
     *
     * @param  array<string, mixed> $params
     */
    protected function execute(string $sql, array $params = []): int
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount();
    }

    /**
     * Execute an INSERT and return the last inserted ID.
     *
     * @param  array<string, mixed> $params
     */
    protected function insertAndGetId(string $sql, array $params = []): int
    {
        $this->execute($sql, $params);
        return (int) $this->pdo->lastInsertId();
    }
}
