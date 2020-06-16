<?php

namespace ppAlgorithm\LongestOneSeries;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function data()
    {
        return [
            [[], 0],
            [[0, 0, 0], 0],
            [[1, 1, 1, 1], 4],
            [[1], 1],
            [[0], 0],
            [[0, 1, 0], 1],
            [[1, 0, 1], 1],
            [[0, 1, 1, 0, 1, 1, 1, 0], 3],
            [[1, 0, 1, 1, 1, 1, 0, 1, 1], 4]
        ];
    }

    /**
     * @dataProvider data
     * @param array $series
     * @param int $expected
     */
    public function testGetLength(array $series, int $expected): void
    {
        $length = (new Solution())->getLength($series);
        $this->assertSame($expected, $length);
    }
}