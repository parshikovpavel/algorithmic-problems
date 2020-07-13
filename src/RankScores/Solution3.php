<?php

namespace ppAlgorithm\RankScores;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution3
{
    public function select(Connection $connection): ITable
    {
        $sql = '
            SELECT S1.Score, 
                COUNT(*) AS Rank
            FROM Scores S1 INNER JOIN (
                SELECT DISTINCT Score FROM Scores
                ) S2 ON S1.Score <= S2.Score     
            GROUP BY S1.Id, S1.Score
            ORDER BY S1.Score DESC
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}