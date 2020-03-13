<?php

namespace ppAlgorithm\Anagrams;

use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{
    use Provider;

    /**
     * @dataProvider data
     */
    public function testAreAnagrams(string $string1, string $string2, bool $expected): void
    {
        $areAnagrams = (new Solution1())->areAnagrams($string1, $string2);
        $this->assertSame($expected, $areAnagrams);
    }


}