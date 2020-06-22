<?php

namespace ppAlgorithm\TwoSum;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param array $nums
     * @param int $target
     * @param array $expected
     */
    public function testGenerate(array $nums, int $target, array $expected): void
    {
        $keys = (new Solution1())->twoSum($nums, $target);
        $this->assertSame($expected, $keys);
    }
}