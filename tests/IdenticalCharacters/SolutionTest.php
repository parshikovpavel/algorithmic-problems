<?php

namespace ppAlgorithm\IdenticalCharacters;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function data()
    {
        return [
            ['', '', 0],
            ['', 'ghgkhlgfk', 0],
            ['gfgfdgfdgytnbv','', 0],
            ['bnv,zgkdetui', 'a', 0],
            ['c', 'jkgsdkjktyitu', 0],
            ['hghjfyutyufvb', 'u', 1],
            ['uyfgbngjklii', 'ijkkkii', 7],
            ['bncvbcbbnmm,,.,cvc', 'rtrhgjslshfbdfgfvtrtertermtrtret', 3],
        ];
    }

    /**
     * @dataProvider data
     * @param string $a
     * @param string $b
     * @param int $expected
     */
    public function testGetNumberOfIdenticalCharacters(string $a, string $b, int $expected): void
    {
        $number = (new Solution())->getNumberOfIdenticalCharacters($a, $b);
        $this->assertSame($expected, $number);
    }
}