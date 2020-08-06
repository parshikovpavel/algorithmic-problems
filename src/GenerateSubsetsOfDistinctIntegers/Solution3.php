<?php

namespace ppAlgorithm\GenerateSubsetsOfDistinctIntegers;

class Solution3
{
    /**
     * Вернуть все возможные subset's для множества $set
     * @param array $set Исходное множество
     * @return array Массив всех возможных subset's
     */
    public function generateSubsets(array $set): array
    {
        $subsets = [];
        $n = count($set);

        # Генерируем исходную битовую последовательность из 0
        $bits = array_fill(0, $n, 0);

        while (true) {
            # Сохраняем subset, который соответствует текущей битовой последовательности
            $subset = [];
            for ($i = 0; $i < $n; $i++) {
                # Если соответствующий бит = 1, то добавляем элемент в subset
                if ($bits[$i] === 1) {
                    $subset[] = $set[$i];
                }
            }
            $subsets[] = $subset;

            # Находим индекс `$i` самого правого бита со значением 0
            for ($i = $n - 1; $i >= 0 && $bits[$i] === 1; $i--);

            # Если все биты уже установлены в 1, то выходим
            if ($i < 0) {
                break;
            }

            # Устанавливаем бит в 1
            $bits[$i] = 1;

            # Все биты правее него - устанавливаем в 0
            for ($j = $i + 1; $j < $n; $j++) {
                $bits[$j] = 0;
            }
        }

        return $subsets;
    }
}