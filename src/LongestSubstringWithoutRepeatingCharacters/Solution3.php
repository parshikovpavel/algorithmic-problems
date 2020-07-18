<?php

namespace ppAlgorithm\LongestSubstringWithoutRepeatingCharacters;

class Solution3
{
    /**
     * Найти максимальную длину подстроки без повторения символов
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $i = 0;
        $hashTable = [];
        $lengthS = strlen($s);
        $maxLength = 0;

        for ($j = 0; $j < $lengthS; $j++) {
            if (isset($hashTable[$s[$j]]) && $hashTable[$s[$j]] >= $i) { # Если символ уже ранее нам встречался и находится в диапазоне [$i; $j)
                $i = $hashTable[$s[$j]] + 1;                             # Сразу сместить указатель $i на позицию за этим символом, чтобы исключить его из диапазона [$i; $j)
            }
            else {
                $maxLength = max($j - $i + 1, $maxLength);        # Иначе, обновить значение максимальной длина
            }
            $hashTable[$s[$j]] = $j;                                     # Сохранить позицию $j текущего символа в $hashTable
        }

        return $maxLength;
    }
}