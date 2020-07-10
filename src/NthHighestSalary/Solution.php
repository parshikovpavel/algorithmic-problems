<?php

namespace ppAlgorithm\NthHighestSalary;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution
{
    public function select(Connection $connection): ITable
    {
        $n = 3;
        $m = $n - 1;
        $sql = "
            SELECT (
                SELECT DISTINCT Salary
                FROM Employee
                ORDER BY Salary DESC
                LIMIT 1
                OFFSET $m 
            ) AS NthHighestSalary
            ";

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}