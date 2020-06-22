<?php

namespace ppAlgorithm\GenerateParentheses;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param int $n
     * @param array $expected
     */
    public function testGenerate(int $n, array $expected): void
    {
        $sequences = (new Solution1())->generate($n);
        $this->assertSame($expected, $sequences);
    }
}