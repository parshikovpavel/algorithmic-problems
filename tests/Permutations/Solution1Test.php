<?php

namespace ppAlgorithm\Permutations;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param array $sequence
     * @param array $expected
     */
    public function testGeneratePermutations(array $sequence, array $expected): void
    {
        $permutations = [];
        (new Solution1())->generatePermutations($sequence, count($sequence), $permutations);
        sort($permutations);
        sort($expected);

        $this->assertSame($expected, $permutations);
    }


}