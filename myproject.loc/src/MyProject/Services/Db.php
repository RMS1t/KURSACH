<?php

namespace MyProject\Services;

use MyProject\Exceptions\DbException;

class Db
{
    private static $instance;

    /** @var \PDO */
    private $pdo;

    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];
        $dsn = "pgsql:host={$dbOptions['host']};dbname={$dbOptions['dbname']};options='--client_encoding=UTF8';";
        try {
            $this->pdo = new \PDO(
                $dsn,
                $dbOptions['user'],
                $dbOptions['password']
            );
        } catch (\PDOException $e) {
            throw new DbException('Ошибка при подключении к базе данных: ' . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
}