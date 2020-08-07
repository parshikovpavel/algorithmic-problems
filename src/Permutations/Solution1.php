<?php

namespace ppAlgorithm\Permutations;

use ppAlgorithm\GenerateSubsetsOfDistinctIntegers\Solution3;

class Solution1
{
    /**
     * Сгенерировать все возможные permutation's для чисел из $sequence
     *
     * @param array $sequence Последовательность чисел
     * @param int $n Текущий размер sequence, в которой делаются permutation's
     * @param array $permutations Найденные permutation's
     * @return void
     */
    public function generatePermutations(array $sequence, int $n, array &$permutations): void
    {
        if ($n === 1) {
            $permutations[] = $sequence;
            return;
        }

        for ($i = 0; $i < $n; $i++) {
            [$sequence[$i], $sequence[$n - 1]] = [$sequence[$n - 1], $sequence[$i]];
            $this->generatePermutations($sequence, $n - 1, $permutations);
            [$sequence[$i], $sequence[$n - 1]] = [$sequence[$n - 1], $sequence[$i]];
        }
    }
}