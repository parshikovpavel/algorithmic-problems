<?php

namespace ppAlgorithm\CombineTwoTables;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution
{
    public function combine(Connection $connection): ITable
    {
        $sql = '
            SELECT FirstName, LastName, City, State
            FROM Person LEFT JOIN Address USING (AddressId)
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}