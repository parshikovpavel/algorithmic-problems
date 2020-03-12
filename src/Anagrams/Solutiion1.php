<?php

namespace ppAlgorithm\Anagrams;

class Solution1
{
    /**
     * Are the passed strings anagrams or not?
     * @param string $string1
     * @param string $string2
     * @return bool
     */
    public function areAnagrams(string $string1, string $string2): bool
    {
        return count_chars($string1) == count_chars($string2);
    }
}