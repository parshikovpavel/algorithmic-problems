<?php

namespace ppAlgorithm\RankScores;

use PHPUnit\DbUnit\Database\Connection;
use PHPUnit\DbUnit\DataSet\ITable;

class Solution2
{
    public function select(Connection $connection): ITable
    {
        $sql = '
            SELECT Score, 
                (
                    SELECT COUNT(distinct Score) FROM Scores S2 WHERE S2.Score >= S1.Score
                ) AS Rank
            FROM Scores S1
            ORDER BY Score DESC
            ';

        return $connection->createQueryTable(
            'result',
            $sql
        );
    }
}