# Two sum

## Condition

Given an array of integers, return **indices** of the two numbers such that they add up to a specific target.

You may assume that each input would have **exactly** one solution, and you may not use the *same* element twice.

**Example:**

```
Given nums = [2, 7, 11, 15], target = 9,

Because nums[0] + nums[1] = 2 + 7 = 9,
return [0, 1].
```

## Условие

Дан `int[] $nums`, вернуть *key*'s таких двух *value*'s, чтобы их сумма `$nums[$i] + $nums[$j]` была равна некоторому `target`.

Можете рассчитывать, что имеется только одно решение. Также нельзя использовать один и тот же элемент дважды.

**Пример:**

```
Given nums = [2, 7, 11, 15], target = 9,

Because nums[0] + nums[1] = 2 + 7 = 9,
return [0, 1].
```

| #    | Время              | Память                   |
| ---- | ------------------ | ------------------------ |
| 1    | *O(N<sup>2</sup>)* | *O(1)*                   |
| 2    | *O(N)*             | *O(N)* (для *Hashtable*) |
| 3    | *O(N)*             | *O(N)* (для *Hashtable*) |

## Brute-force search

Самое простое решение в лоб – *Brute-force search* ([1](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#brute-force-search))

Проходимся по всем элементам `$nums[$i]` массива и пытаемся найти такой `$nums[$j]`, для которого `$nums[$i] + $nums[$j] === $target`. Достаточно перебирать только `$j > $i`.

[Реализация](Solution1.php):

```php
public function twoSum(array $nums, int $target): array
{
    $nums_length = count($nums);
    for ($i = 0; $i < $nums_length; $i++) {
        for ($j = $i + 1; $j < $nums_length; $j++) {
            if ($nums[$i] + $nums[$j] === $target) {
                return [$i, $j];
            }
        }
    }
}
```

[Тесты](./../../tests/TwoSum/Solution1Test.php)

## Два прохода с Hashtable

Алгоритм:

- Построим *Hashtable* по *value*'s из `$nums`.  Это позволит сократить время поиска с *O(n)* до *O(1)*, при этом необходимо затратить *O(n)* памяти под *Hashtable* (*space-time trade-off*). 
- Проходим по `$nums` и пытаемся найти в *Hashtable* такое *value*, которое дополняет `$nums[$i]` до `$target`, т.е. равное `$target - $nums[$i]`. Необходимо добавить проверку, что `$i !== $j`.

[Реализация](Solution2.php):

```php
public function twoSum(array $nums, int $target): array
{
    $hashtable = [];

    foreach ($nums as $key => $value) {
        $hashtable[$value] = $key;
    }

    foreach ($nums as $key => $value) {
        $complement = $target - $value;
        if (isset($hashtable[$complement]) && $hashtable[$complement] !== $key) {
            return [$key, $hashtable[$complement]];
        }
    }
}
```

[Тесты](./../../tests/TwoSum/Solution2Test.php)