# 69. Sqrt(x)

## Condition

Implement `int sqrt(int x)`.

Compute and return the square root of *x*, where *x* is guaranteed to be a non-negative integer.

Since the return type is an integer, the decimal digits are truncated and only the integer part of the result is returned.

**Example 1:**

```
Input: 4
Output: 2
```

**Example 2:**

```
Input: 8
Output: 2
Explanation: The square root of 8 is 2.82842..., and since 
             the decimal part is truncated, 2 is returned.
```

## Условие

Реализовать `int sqrt(int x)`.

Вычислить и вернуть квадратный корень из *x*, где *x* гарантированно будет неотрицательным целым числом.

Поскольку тип возвращаемого значения `int`, дробная часть усекается, и возвращается только целая часть результата.

**Пример 1:**

```
Input: 4
Output: 2
```

**Пример 2:**

```
Ввод: 8
Выход: 2
Объяснение: Квадратный корень из 8 равен 2,82842 ..., и поскольку
             десятичная часть усекается, возвращается 2.
```

## Решение 1. Бинарный поиск

```php
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
```

## Решение 2. Метод Ньютона

TODO!!!
