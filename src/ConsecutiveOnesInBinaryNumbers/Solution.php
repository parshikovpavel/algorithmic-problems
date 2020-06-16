<?php

namespace ppAlgorithm\ConsecutiveOnesInBinaryNumbers;

class Solution
{
    /**
     * Get a length of the consecutive 1's in number
     * @param int $n
     * @return int
     */
    public function getLength(int $n): int
    {
        $maxLength = 0;
        $currentLength = 0;

        while ($n !== 0) {
            if ($n % 2 === 1) {
                $currentLength++;
                $maxLength = max($maxLength, $currentLength);
            }
            else {
                $currentLength = 0;
            }
            $n = intdiv($n, 2);
        }

        return $maxLength;
    }
}