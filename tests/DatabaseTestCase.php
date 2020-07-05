<?php

namespace ppAlgorithm;

use PDO;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;

abstract class DatabaseTestCase extends TestCase
{
    use TestCaseTrait;

    // сохранить соединения для других Test case's
    static private $pdo = null;

    // сохранить экземпляр PHPUnit\DbUnit\Database\Connection для других Test case's
    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo === null) {
                self::$pdo = new PDO( $GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'] );
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, $GLOBALS['DB_DBNAME']);
        }

        return $this->conn;
    }

    final public function getDataSet()
    {
        return new ArrayDataSet([]);
    }
}