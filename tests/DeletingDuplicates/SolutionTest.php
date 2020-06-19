<?php

namespace ppAlgorithm\DeletingDuplicates;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function data()
    {
        return [
            [[], []],
            [[0], [0]],
            [[0, 1], [0, 1]],
            [[0, 0, 1], [0, 1]],
            [[0, 1, 1], [0, 1]],
            [[0, 0], [0]],
            [[0, 0, 0, 0], [0]],
            [[0, 1, 1, 2, 2, 103, 104, 204, 204, 300], [0, 1, 2, 103, 104, 204, 300]]
        ];
    }

    /**
     * @dataProvider data
     * @param array $array
     * @param array $expected
     */
    public function testGetNumberOfIdenticalCharacters(array $array, array $expected): void
    {
        $result = (new Solution())->deleteDuplicates($array);
        $this->assertSame($expected, $result);
    }
}