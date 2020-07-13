<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

class Solution
{
    /**
     * @param string $s
     * @return int
     */
    function lengthOfLongestSubstring(string $s): int
    {
        $lengthS = strlen($s);
        $chars = [];
        $maxLength = 0;
        for ($i = 0; $i < $lengthS; $i++) {
            if (!isset($chars[$s[$i]])) {
                $chars[$s[$i]] = $i;
                $maxLength++;
            }
        }
    }
}