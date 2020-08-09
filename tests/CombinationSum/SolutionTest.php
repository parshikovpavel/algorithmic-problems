<?php

namespace ppAlgorithm\CombinationSum;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function data()
    {
        return [
            [
                [2, 3, 6, 7], 7, [
                    [7],
                    [2,2,3]
                ]
            ],
            [
                [2, 3, 5], 8, [
                    [2,2,2,2],
                    [2,3,3],
                    [3,5]
                ]
            ],
        ];
    }

    /**
     * @dataProvider data
     * @param int $a
     * @param int $b
     * @param int $expected
     */
    public function testGenerateCombinations(array $candidates, int $target, array $expected): void
    {
        $combinations = [];
        (new Solution())->generateCombinations($candidates, count($candidates), $target, [], 0, 0, $combinations);
        sort($combinations);
        sort($expected);

        $this->assertSame($expected, $combinations);
    }
}