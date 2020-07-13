<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

class Solution1
{
    /**
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $lengthS = strlen($s);
        for ($i = 0; $i < $lengthS; $i++) {
            for ($j = $i + 1; $j < $lengthS; $j++) {
                $substring = substr($s, $i, $j - $i);
            }

        }
    }

    public function areCharsUnique(string $s): bool
    {

    }
}