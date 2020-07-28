<?php

namespace ppAlgorithm\Combinations;

class Solution1
{
    /**
     * Сгенерировать все возможные combination's длиной $k для чисел от 1..$n
     * @param int $n
     * @param int $k
     * @param int $start С какого элемента начинать итерировать на текущей итерации
     * @param int $current_k Текущий размер combination
     * @param array $current_combination Текущая combination
     * @param array $combinations Найденные combination's
     * @return void
     */
    public function generateCombinations(int $n, int $k, int $start, int $current_k, array $current_combination, array &$combinations): void
    {
        if ($current_k === $k) {
            $combinations[] = $current_combination;
            return;
        }

        for ($i = $start; $i < $n && $current_k > ; $i++) {
            $current_combination[$current_k] = $i + 1;

            $this->generateCombinations($n, $k, $i + 1, $current_k + 1, $current_combination, $combinations);
        }
    }
}