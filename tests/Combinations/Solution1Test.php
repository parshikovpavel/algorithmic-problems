<?php

namespace ppAlgorithm\Combinations;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param int $n
     * @param int $k
     * @param array $expected
     */
    public function testAreAnagrams(int $n, int $k, array $expected): void
    {
        $combinations = [];
        (new Solution1())->generateCombinations($n, $k, 0, 0, [], $combinations);
        sort($combinations);
        sort($expected);

        $this->assertSame($expected, $combinations);
    }


}