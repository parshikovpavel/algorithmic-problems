<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

use PHPUnit\Framework\TestCase;

class Solution3Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     * @param string $s
     * @param int $expected
     */
    public function testLength(string $s, int $expected): void
    {
        $length = (new Solution3())->lengthOfLongestSubstring($s);
        $this->assertSame($expected, $length);
    }


}