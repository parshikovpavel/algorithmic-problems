<?php

namespace ppAlgorithm\SqrtX;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param int $x
     * @param int $expected
     */
    public function testGeneratePermutations(int $x, int $expected): void
    {
        $result = (new Solution1())->mySqrt($x);

        $this->assertSame($expected, $result);
    }


}