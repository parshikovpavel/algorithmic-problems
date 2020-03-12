<?php

namespace ppAlgorithm\Anagrams;

class Solution2
{
    /**
     * Are the passed strings anagrams or not?
     * @param string $string1
     * @param string $string2
     * @return bool
     */
    public function areAnagrams(string $string1, string $string2): bool
    {
        # если строки разной длины – они не анаграммы
        if (strlen($string1) !== strlen($string2)) {
            return false;
        }

        # выделяем память под dictionary – массив на 26 элементов (с учетом, что строка состоит только из английских символов)
        $dictionary = array_fill(0, 26, 0);

        # проходим по первому массиву, для каждой очередной буквы инкрементируем соответствующий счетчик в dictionary
        for ($i = 0, $string1Length = strlen($string1); $i < $string1Length; $i++) {
            $dictionary[ord($string1{$i}) - ord('a')]++;
        }

        # проходимся по второму массиву, для каждой очередной буквы декрементируем соответствующий счетчик в dictionary
        for ($i = 0; $i < $string1Length; $i++) {
            $dictionary[ord($string2{$i}) - ord('a')]--;

            # если какой-либо из счетчиков стал `< 0` – строки не анаграммы
            if ($dictionary[ord($string2{$i}) - ord('a')] < 0) {
                return false;
            }
        }

        # если ни один из счетчиков не стал `<0`, т.е. они все были успешно декрементрованы назад в 0 – строки анаграммы
        return true;
    }
}