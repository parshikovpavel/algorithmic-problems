<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

class Solution1
{
    /**
     * Найти максимальную длину подстроки без повторения символов
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $lengthS = strlen($s);
        $maxLength = 0;
        for ($i = 0; $i < $lengthS; $i++) {
            for ($j = $i; $j < $lengthS; $j++) {
                $substring = substr($s, $i, $j - $i + 1);
                if ($this->areCharsUnique($substring)) {
                    $maxLength = max($maxLength, strlen($substring));
                }
            }
        }

        return $maxLength;
    }

    /**
     * Проверить, являются ли все символы в строке уникальными
     * @param string $s
     * @return bool
     */
    public function areCharsUnique(string $s): bool
    {
        $set = [];
        $lengthS = strlen($s);
        for ($i = 0; $i < $lengthS; $i++) {
            if (isset($set[$s[$i]])) {
                return false;
            }
            else {
                $set[$s[$i]] = 1;
            }
        }

        return true;
    }
}