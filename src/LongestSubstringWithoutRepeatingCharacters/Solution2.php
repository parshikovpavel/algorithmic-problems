<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

class Solution2
{
    /**
     * Найти максимальную длину подстроки без повторения символов
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $begin = 0;
        $end = 0;
        $set = [];
        $lengthS = strlen($s);
        $maxLength = 0;

        while ($end < $lengthS) {
            if (!isset($set[$s[$end]])) {
                $set[$s[$end]] = 1;
                $end++;
                $maxLength = max($end - $begin, $maxLength);
            }
            else {
                unset($set[$s[$begin]]);
                $begin++;
            }
        }

        return $maxLength;
    }
}