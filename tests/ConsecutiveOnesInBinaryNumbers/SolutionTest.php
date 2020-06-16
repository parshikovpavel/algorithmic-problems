<?php

namespace ppAlgorithm\ConsecutiveOnesInBinaryNumbers;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
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