<?php

namespace ppAlgorithm\RankScores;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution1
{
    public function select(Connection $connection): ITable
    {
        $sql = '
            SELECT Score, `Rank`
            FROM (
                SELECT 
                    Score,
                    @rank := if(@prev_score = Score, @rank, @rank + 1) AS `Rank`,
                    @prev_score := Score AS Dummy   
                FROM Scores,
                     (SELECT @rank := 0, @prev_score := -1) as t
                ORDER BY Score DESC
            ) x
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}