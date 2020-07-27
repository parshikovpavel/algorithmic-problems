<?php

namespace ppAlgorithm\GenerateSubsetsOfDistinctIntegers;

class Solution1
{
    /**
     * Вернуть все возможные subset's для множества $set
     * @param array $set Исходное множество
     * @return array Массив всех возможных subset's
     */
    public function generateSubsets(array $set): array
    {
        $subsets = [
            [],
        ];

        foreach ($set as $element) {
            $newSubsets = [];

            foreach ($subsets as $subset) {
                $subset[] = $element;
                $newSubsets[] = $subset;
            }

            $subsets = array_merge($subsets, $newSubsets);
        }

        return $subsets;
    }
}