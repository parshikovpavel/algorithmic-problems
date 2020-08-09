<?php

namespace ppAlgorithm\TwoSumII;

class Solution
{
    /**
     * Найти номера по порядку (начиная с 1) элементов из `$nums`, для которых сумма values равна `$target`
     * @param array $nums Массив
     * @param int $target Сумма
     * @return array Массив keys
     * @throws \Exception
     */
    public function twoSumII(array $nums, int $target): array
    {
        $head = 0;
        $tail = count($nums) - 1;

        while ($head < $tail) {
            $sum = $nums[$head] + $nums[$tail];
            if ($sum < $target) {
                $head++;
            }
            elseif ($sum > $target) {
                $tail--;
            }
            else {
                return [$head + 1, $tail + 1];
            }
        }

        throw new \Exception();
    }
}