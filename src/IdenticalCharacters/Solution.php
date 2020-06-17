<?php

namespace ppAlgorithm\IdenticalCharacters;

class Solution
{
    /**
     * Get number of identical characters
     * @param string $a
     * @param string $b
     * @return int
     */
    public function getNumberOfIdenticalCharacters(string $a, string $b): int
    {
        $set = [];
        $aLength = strlen($a);
        $bLength = strlen($b);
        $number = 0;

        for ($i = 0; $i < $aLength; $i++) {
            $set[$a[$i]] = true;
        }

        for ($i = 0; $i < $bLength; $i++) {
            if (isset($set[$b[$i]])) {
                $number++;
            }
        }

        return $number;
    }
}