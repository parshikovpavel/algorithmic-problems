<?php

namespace ppAlgorithm\Combinations;

class Solution1
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
        # base case – текущий размер Combination `$current_k` достиг требуемого размера `$k`.
        if ($current_k === $k) {
            $combinations[] = $current_combination;
            return;
        }

        # recursive case.
        # Перебираем в цикле числа из set'а, начиная с позиции `$start` – позиция после числа, взятого на предыдущем
        # шаге рекурсии (в этом случае не возможны повторения *combination*'s).
        # Перебор продолжаем, пока не переберем все числа до `$n`, либо не останется в set достаточно чисел,
        # чтобы получить Combination размера `$k`.
        for ($i = $start; $i < $n && $k - $current_k <= $n - $i; $i++) {
            # Добавляем очередное число `$i` в текущую комбинацию `$current_combination`,
            $current_combination[$current_k] = $i + 1;

            # вызываем функцию рекурсивно, при этом стартовая позиция для очередного перебора  `$i + 1`.
            $this->generateCombinations($n, $k, $i + 1, $current_k + 1, $current_combination, $combinations);
        }
    }
}