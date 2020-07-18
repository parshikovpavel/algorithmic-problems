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
        $i = 0;
        $j = 0;
        $set = [];
        $lengthS = strlen($s);
        $maxLength = 0;

        while ($j < $lengthS) {
            if (!isset($set[$s[$j]])) {  # Если нет такого символа в $set
                $set[$s[$j]] = 1;        # Добавляем его в $set
                $j++;                    # И двигаем правую границу sliding window
                $maxLength = max($j - $i, $maxLength);  # Увеличиваем $maxLength
            }
            else {
                unset($set[$s[$i]]);     # Иначе уменьшаем размер sliding window
                $i++;                    # Удаляем из $set символ по левой границе и двигаем левую границу
            }
        }

        return $maxLength;
    }
}