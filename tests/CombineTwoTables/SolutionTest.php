<?php

namespace ppAlgorithm\CombineTwoTables;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    protected function setUp(): void
    {
        $sql = '
            CREATE TABLE IF NOT EXISTS Person (PersonId int, FirstName varchar(255), LastName varchar(255));
            CREATE TABLE IF NOT EXISTS Address (AddressId int, PersonId int, City varchar(255), State varchar(255));
            TRUNCATE TABLE Person;
            TRUNCATE TABLE Address;
        ';
        $this->getConnection()->getConnection()->exec($sql);
    }

    function data()
    {
        return [
            [0, 0],
            [1, 1],
            [2, 1],
            [15, 4],
            [5, 1],
            [13, 2],
            [110, 3],
            [379, 4],
        ];
    }

    /**
     * @dataProvider data
     * @param int $n
     * @param int $expected
     */
    public function testGetLength(int $n, int $expected): void
    {
        $length = (new Solution())->getLength($n);
        $this->assertSame($expected, $length);
    }
}