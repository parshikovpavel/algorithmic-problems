<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param string $s
     * @param int $expected
     */
    public function testLength(string $s, int $expected): void
    {
        $length = (new Solution1())->lengthOfLongestSubstring($s);
        $this->assertSame($expected, $length);
    }


}