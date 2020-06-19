<?php

namespace ppAlgorithm\DeletingDuplicates;

class Solution
{
    /**
     * Delete duplicates
     * @param array $array Sorted array
     * @return array Array without duplicates
     */
    public function deleteDuplicates(array $array): array
    {
        $result = [];
        $current = null;

        foreach ($array as $element) {
            if ($element !== $current) {
                $result[] = $element;
                $current = $element;
            }
        }

        return $result;
    }
}