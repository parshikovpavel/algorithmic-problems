<?php

namespace ppAlgorithm\SecondHighestSalary;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution
{
    public function select(Connection $connection): ITable
    {
        $sql = '
            SELECT (
                SELECT Salary
                FROM Employee
                ORDER BY Salary DESC
                LIMIT 1
                OFFSET 1 
            ) AS subquery
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}