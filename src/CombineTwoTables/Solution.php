<?php

namespace ppAlgorithm\CombineTwoTables;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution
{
    public function combine(Connection $connection): ITable
    {
        $sql = '
            SELECT LastName, FirstName, City, State
            FROM Person LEFT JOIN Address USING (PersonId)
            ORDER BY PersonId
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}