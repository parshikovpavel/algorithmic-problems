<?php

namespace ppAlgorithm\SqrtX;

class Solution1
{
    /**
     * Вычисляет квадратный корень из `$x`,
     *
     * @param int $x
     * @return int
     */
    public function mySqrt(int $x): int
    {
        # ищем значение корня в диапазоне 0..$x (до самого числа)
        $left = 0;
        $right = $x;

        # Два частных случая, при которых цикл не срабатывает
        if (in_array($x, [0, 1])) {
            return $x;
        }

        # пока расстояние между `$left` и `$right` не станет равно 1, дальше сжимать окно некуда
        while ($right - $left > 1) {
            # берем середину окна
            $middle = $left + intdiv($right - $left, 2);
            $power = $middle * $middle;

            # если квадрат середины больше искомого значения, то двигаем правую границу на середину
            if ($power > $x) {
                $right = $middle;
            }
            # если меньше, то двигаем левую границу
            elseif ($power < $x) {
                $left = $middle;
            }
            # если середина точно попала в ответ, то его сразу возвращаем
            else {
                return $middle;
            }
        }

        # возвращаем левую границу, т.к. нужно значение с отсеченной дробной частью
        return $left;
    }
}
