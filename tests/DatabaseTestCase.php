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

    final protected function setUp(): void
    {
        $sql = '';

        foreach ($this->tables() as $tableName => $columns) {
            $sql .= "CREATE TABLE IF NOT EXISTS $tableName ($columns); TRUNCATE TABLE $tableName; ";
        }

        $this->getConnection()->getConnection()->exec($sql);
    }

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

    final protected function tearDown(): void
    {
        $sql = '';

        foreach ($this->tables() as $tableName => $columns) {
            $sql .= "DROP TABLE $tableName; ";
        }

        $this->getConnection()->getConnection()->exec($sql);
    }

    /**
     * Провайдер данных
     * @return array
     */
    abstract public function data(): array;

    /**
     * @return array Массив вида [ `tableName` => columns, ... ]
     */
    abstract protected function tables(): array;

    /**
     * @dataProvider data
     * @param array $fixture
     * @param array $expected
     */
    public function testQuery(array $fixture, array $expected): void
    {

        $this->getDatabaseTester()->setSetUpOperation($this->getSetUpOperation());
        $this->getDatabaseTester()->setDataSet(
            new ArrayDataSet($fixture)
        );
        $this->getDatabaseTester()->onSetUp();
        $solutionClassName = str_replace('Test', '', static::class);
        $actual = (new $solutionClassName())->select($this->getConnection());
        $expected = (new ArrayDataSet($expected))->getTable('result');

        $this->assertTablesEqual($expected, $actual);
    }

    final public function getDataSet()
    {
        return new ArrayDataSet([]);
    }
}