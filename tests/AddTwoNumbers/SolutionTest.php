<?php

namespace ppAlgorithm\AddTwoNumbers;

use PHPUnit\Framework\TestCase;

class SolutionTest extends TestCase
{
    function generateList(int $n): ?ListNode
    {
        $head = $current = new ListNode();

        if ($n === 0) {
            return $head;
        }

        while ($n > 0) {
            $remainder = $n % 10;

            $current->next = new ListNode($remainder);
            $current = $current->next;
            $n = intdiv($n, 10);
        }

        return $head->next;
    }

    function data()
    {
        return [
            [10, 210, 220],
            [0, 10, 10],
            [99, 1, 100],
            [1, 1, 2],
            [342, 465, 807],
            [15, 0, 15],
            [0, 0, 0]
        ];
    }

    /**
     * @dataProvider data
     * @param int $a
     * @param int $b
     * @param int $expected
     */
    public function testAddTwoNumbers(int $a, int $b, int $expected): void
    {
        $l1 = (new Solution())->addTwoNumbers($this->generateList($a), $this->generateList($b));
        $l2 = $this->generateList($expected);

        while ($l1 !== null && $l2 !== null) {
            $this->assertSame($l2->val, $l1->val);
            $l1 = $l1->next;
            $l2 = $l2->next;
        }

        $this->assertNull($l1);
        $this->assertNull($l2);
    }
}