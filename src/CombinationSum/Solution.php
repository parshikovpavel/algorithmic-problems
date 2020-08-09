<?php

namespace ppAlgorithm\CombinationSum;


class Solution
{
    /**
     * Найдите все уникальные комбинации из чисел `$candidates`, которые суммируются в `$target`.
     *
     * @param int[] $candidates Числа candidates
     * @param int $n Количество чисел candidates
     * @param int $target Целевое значения для суммы
     * @param array $combination Текущая combination чисел
     * @param int $sum Текущая сумма чисел в combination
     * @param int $i Текущий индекс в combination, от которого рассматриваются элементы
     * @param array $combinations Сгенерированные combinations
     * @return void
     */
    public function generateCombinations(array $candidates, int $n, int $target, array $combination, int $sum, int $i, array &$combinations): void
    {
        # Цикл от текущего индекса `$i` до конца
        for ($j = $i; $j < $n; $j++) {
            # Берем текущего candidate
            $candidate = $candidates[$j];
            # Считаем сумму с ним
            $next_sum = $sum + $candidate;
            # Формируем combination с ним
            $next_combination = array_merge($combination, [$candidate]);
            # Если получили нужную сумму `$target`, то добавляем к `$combinations`
            if ($next_sum === $target) {
                $combinations[] = $next_combination;
            }
            # Текущая сумма меньше нужной `$target`, делаем еще рекурсивный шаг
            elseif ($next_sum < $target) {
                # Следующий рекурсивный шаг делаем, начиная с того же самого индекса `$j`, т.к. candidates могут повторяться
                $this->generateCombinations($candidates, $n, $target, $next_combination, $next_sum, $j, $combinations);
            }
            # Если `$next_sum > $target`, то пропускаем этот шаг
        }
    }
}