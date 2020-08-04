<?php

namespace ppAlgorithm\Combinations;

class Solution2
{
    /**
     * Сгенерировать все возможные combination's длиной $k для чисел от 1..$n
     * @param int $n
     * @param int $k Требуемый размер combination
     * @param int $start С какого элемента начинать итерировать на текущей итерации
     * @param int $current_k Текущий размер combination
     * @param array $current_combination Текущая combination
     * @param array $combinations Найденные combination's
     * @return void
     */
    public function generateCombinations(int $n, int $k, int $start, int $current_k, array $current_combination, array &$combinations): void
    {
        # base case's

        # 1. в set недостаточно чисел, чтобы получить Combination размера `$k`
        if ($k - $current_k > $n - $start) {
            # Возвращаемся без сохранения combination
            return;
        }

        # 2. Если найдена combination размера $k
        if ($current_k === $k) {
            # Сохраняем найденную combination
            $combinations[] = $current_combination;
            return;
        }

        # сохранить текущее значение в combination
        $current_combination[$current_k] = $start + 1;
        # продолжить подставлять числа, начиная с индекса `$start+1`, при этом длина combination увеличилась `$current_k+1`
        $this->generateCombinations($n, $k, $start + 1, $current_k + 1, $current_combination, $combinations);

        # можно `unset($current_combination[$current_k])`, но не обязательно, т.к. на следующем рекурсивном вызове это значение будет перезаписано
        # также продолжить подставлять числа, начиная с индекса `$start+1`, но при этом длина combination НЕ увеличилась `$current_k`
        $this->generateCombinations($n, $k, $start + 1, $current_k, $current_combination, $combinations);
    }
}