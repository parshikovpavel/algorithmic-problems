# Consecutive 1's in Binary Numbers

## Condition

Given a base-10 integer, `n`, convert it to binary (base-2). Then find and print the base-10 integer denoting the maximum number of consecutive 1's in `n`'s binary representation.

**Input Format**

A single integer, `n`.

**Constraints**

- 1 ≤ `n` ≤ 10<sup>6</sup>

**Output Format**

Print a single base-10 integer denoting the maximum number of consecutive 1's in the binary representation of `n`.

**Sample Input 1**

```
5
```

**Sample Output 1**

```
1
```

**Sample Input 2**

```
13
```

**Sample Output 2**

```
2
```

**Explanation**

*Sample Case 1:*
The binary representation of `5` is `101`, so the maximum number of consecutive 1's is `1`.

*Sample Case 2:*
The binary representation of `13` is `1101`, so the maximum number of consecutive 1's is `2`.

## Решение

Необходимо последовательно извлекать цифры из бинарного представления `n`. Для этого необходимо выполнять последовательное деление `n` на `2` и очередная цифра в бинарном представлении – остаток от деления `n % 2`. 

- Встретив `1`, нужно увеличить счётчик длины текущей последовательности. Если длина текущей последовательности – больше максимальной, то сохранить ее как максимальную.
- Встретив `0`, нужно обнулить этот счётчик. 

В конце нужно вывести значение длины наибольшей последовательности.

| #    | Время      | Память |
| ---- | ---------- | ------ |
| 1    | `O(log N)` | `O(1)` |

[Реализация](Solution.php):

```php
public function getLength(int $n): int
{
    $maxLength = 0;
    $currentLength = 0;

    while ($n !== 0) {
        if ($n % 2 === 1) {
            $currentLength++;
            $maxLength = max($maxLength, $currentLength);
        }
        else {
            $currentLength = 0;
        }
        $n = intdiv($n, 2);
    }

    return $maxLength;
}
```

[Тесты](./../../tests/ConsecutiveOnesInBinaryNumbers/SolutionTest.php)

