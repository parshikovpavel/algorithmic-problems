<?php

namespace ppAlgorithm\TwoSum;

use PHPUnit\Framework\TestCase;

class Solution3Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param array $nums
     * @param int $target
     * @param array $expected
     * @throws \Exception
     */
    public function testGenerate(array $nums, int $target, array $expected): void
    {
        $keys = (new Solution3())->twoSum($nums, $target);
        $this->assertSame($expected, $keys);
    }
}