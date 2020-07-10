<?php

namespace ppAlgorithm\SecondHighestSalary;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution1
{
    public function select(Connection $connection): ITable
    {
        $sql = '
            SELECT (
                SELECT DISTINCT Salary
                FROM Employee
                ORDER BY Salary DESC
                LIMIT 1
                OFFSET 1 
            ) AS SecondHighestSalary
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}