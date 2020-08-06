<?php

namespace ppAlgorithm\Combinations;

use PHPUnit\Framework\TestCase;

class Solution3Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param int $n
     * @param int $k
     * @param array $expected
     */
    public function testGenerateCombinations(int $n, int $k, array $expected): void
    {
        $combinations = (new Solution3())->generateCombinations($n, $k);
        sort($combinations);
        sort($expected);

        $this->assertSame($expected, $combinations);
    }
}