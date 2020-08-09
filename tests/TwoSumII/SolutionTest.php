<?php

namespace ppAlgorithm\TwoSumII;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function data()
    {
        return [
            [[ 2, 7, 11, 15], 9, [1, 2]],
            [[ 1, 3], 4, [1, 2]],
            [[ 1, 2, 3, 5], 6, [1, 4]],
            [[ 1, 2, 5, 7, 3], 4, [1, 5]],
        ];
    }

    /**
     * @dataProvider data
     * @param array $nums
     * @param int $target
     * @param array $expected
     * @throws \Exception
     */
    public function testGenerate(array $nums, int $target, array $expected): void
    {
        $keys = (new Solution())->twoSumII($nums, $target);
        $this->assertSame($expected, $keys);
    }
}