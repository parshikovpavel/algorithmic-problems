<?php

namespace ppAlgorithm\AddTwoNumbers;

class Solution
{
    /**
     * Add two numbers stored in linked lists
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $head = $current = new ListNode();
        $carry = 0;
        while ($l1 !== null || $l2 !== null || $carry !== 0) {
            $val1 = $l1 !== null ? $l1->val : 0;
            $val2 = $l2 !== null ? $l2->val : 0;
            $sum = $val1 + $val2 + $carry;
            $current->next = new ListNode($sum % 10);
            $current = $current->next;
            $carry = intdiv($sum, 10);
            if ($l1 !== null) {
                $l1 = $l1->next;
            }
            if ($l2 !== null) {
                $l2 = $l2->next;
            }
        }
        return $head->next;
    }
}