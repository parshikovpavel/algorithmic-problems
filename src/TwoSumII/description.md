# 167. Two Sum II - Input array is sorted

## Condition

Given an array of integers that is already **sorted in ascending order**, find two numbers such that they add up to a specific target number.

The function twoSum should return indices of the two numbers such that they add up to the target, where index1 must be less than index2.

**Note:**

- Your returned answers (both index1 and index2) are not zero-based.
- You may assume that each input would have *exactly* one solution and you may not use the *same* element twice.

**Example:**

```
Input: numbers = [2,7,11,15], target = 9
Output: [1,2]
Explanation: The sum of 2 and 7 is 9. Therefore index1 = 1, index2 = 2.
```

## Условие

Дан массив целых чисел, который уже **отсортирован в порядке возрастания **, найдите два числа, которые в сумме дают определенное целевое число.

Функция `twoSum` должна возвращать индексы двух чисел так, чтобы они складывались в `target`, где `index1` должен быть меньше `index2`.

**Замечание:**

- Ваши возвращенные ответы (как `index1`, так и `index2`) отсчитываются от `1`.
- Вы можете предполагать, что каждый вход будет иметь *ровно* одно решение, и вы не можете использовать *один и тот же* элемент дважды.

**Пример:**

```
Input: numbers = [2,7,11,15], target = 9
Output: [1,2]
Explanation: The sum of 2 and 7 is 9. Therefore index1 = 1, index2 = 2.
```

## Решение

Используем технику *two pointers* (два указателя) `head `и `tail`. Суммируем значения чисел по указателям `head ` и `tail` и сравниваем результат с `target`.

1. Если `sum < target`: это значит, что нужно увеличить `sum` и приблизить ее к `target`. Следовательно, мы двигаем `head` к следующей позиции.
2. Если `sum > target`: это означает, что мы нам нужно уменьшить `sum`. Поэтому двигаем `tail` к предыдущей позиции.
3. Если `sum == target`: Готово.

Здесь используется [Greedy algorithm](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#greedy-algorithm). Он работает, т.к. не существует локального оптимума. Если `$head` стоит на некоторой позиции, то `$tail` будет всегда двигаться в правильном направлении, т.к. массив упорядочен. Путь перемещения `$head` и `$tail` не может пройти мимо решения ([подробнее](https://zhuanlan.zhihu.com/p/93674056)).

```php
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
```

