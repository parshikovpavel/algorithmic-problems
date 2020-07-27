<?php

namespace ppAlgorithm\GenerateSubsetsOfDistinctIntegers;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param array $set
     * @param array $expected
     */
    public function testGenerate(array $set, array $expected): void
    {
        $subsets = (new Solution1())->generateSubsets($set);
        sort($subsets);
        sort($expected);

        $this->assertSame($expected, $subsets);
    }
}