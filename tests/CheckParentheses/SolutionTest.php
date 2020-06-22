<?php

namespace ppAlgorithm\CheckParentheses;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function data()
    {
        return [
            ['', true],
            ['()', true],
            ['(', false],
            [')', false],
            ['(()', false],
            ['())', false],
            ['()()', true],
            ['(())', true],
            ['(()()(()))', true]
        ];
    }

    /**
     * @dataProvider data
     * @param string $sequence
     * @param bool $expected
     */
    public function testCheck(string $sequence, bool $expected): void
    {
        $valid = (new Solution())->check($sequence);
        $this->assertSame($expected, $valid);
    }
}