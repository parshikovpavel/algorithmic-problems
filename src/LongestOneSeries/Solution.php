<?php

namespace ppAlgorithm\LongestOneSeries;

class Solution
{
    /**
     * Get a length of the longest series of ones in the array
     * @param array $series
     * @return int
     */
    public function getLength(array $series): int
    {
        $maxLength = 0;
        $currentLength = 0;

        foreach ($series as $digit) {
            if ($digit === 1) {
                $currentLength++;
            }
            else {
                if ($currentLength > $maxLength) {
                    $maxLength = $currentLength;
                }
                $currentLength = 0;
            }
        }

        return $maxLength;
    }
}