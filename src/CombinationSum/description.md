# 39. Combination Sum

## Condition

Given a **set** of candidate numbers (`candidates`) **(without duplicates)** and a target number (`target`), find all unique combinations in `candidates` where the candidate numbers sums to `target`.

The **same** repeated number may be chosen from `candidates` unlimited number of times.

**Note:**

- All numbers (including `target`) will be positive integers.
- The solution set must not contain duplicate combinations.

**Example 1:**

```
Input: candidates = [2,3,6,7], target = 7,
A solution set is:
[
  [7],
  [2,2,3]
]
```

**Example 2:**

```
Input: candidates = [2,3,5], target = 8,
A solution set is:
[
  [2,2,2,2],
  [2,3,3],
  [3,5]
]
```

 

**Constraints:**

- `1 <= candidates.length <= 30`
- `1 <= candidates[i] <= 200`
- Each element of `candidate` is unique.
- `1 <= target <= 500`

## Условие

Дан **set** чисел-кандидатов ( `candidates`) **(без дубликатов)** и целевое число ( `target`). Найдите все уникальные комбинации из чисел `candidates`, которые суммируются в `target`.

Одно и тоже число может повторяться в комбинации неограниченное количество раз.

**Примечание:**

- Все числа (включая `target`) будут положительными целыми числами.
- Набор решений не должен содержать повторяющихся комбинаций.

**Пример 1:**

```
Input: candidates = [2,3,6,7], target = 7,
A solution set is:
[
  [7],
  [2,2,3]
]
```

**Пример 2:**

```
Input: candidates = [2,3,5], target = 8,
A solution set is:
[
  [2,2,2,2],
  [2,3,3],
  [3,5]
]
```

 **Ограничения:**

- `1 <= candidates.length <= 30`
- `1 <= candidates[i] <= 200`
- Каждый элемент `candidate `уникален.
- `1 <= target <= 500`

## Решение. Используем DFS

[DFS](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#depth-first-search)

Используем рекурсию.

На каждом шаге рекурсии:

- добавляем очередной элемент в `$combinations` и считаем общую сумму
- сравниваем значение суммы `$next_sum` и `$target`
  - если они равны, то добавляем текущую комбинацию `$next_combination` к сгенерированным *combination*'s
  - если `$next_sum < $target`, значит делаем еще один шаг рекурсии. ПРИЧЕМ!!! начинаем с того же самого индекса `$j`, т.к. *candidate*'s в *combination* могут повторяться.
  - иначе (если `$next_sum > $target`) не делаем рекурсивного вызова (*base case*)

![combination_sum](https://parshikovpavel.github.io/img/algorithmicProblems/combination_sum.jpg?1)

```php
    /**
     * Найдите все уникальные комбинации из чисел `$candidates`, которые суммируются в `$target`.
     *
     * @param int[] $candidates Числа candidates
     * @param int $n Количество чисел candidates
     * @param int $target Целевое значения для суммы
     * @param array $combination Текущая combination чисел
     * @param int $sum Текущая сумма чисел в combination
     * @param int $i Текущий индекс в combination, от которого рассматриваются элементы
     * @param array $combinations Сгенерированные combinations
     * @return void
     */
    public function generateCombinations(array $candidates, int $n, int $target, array $combination, int $sum, int $i, array &$combinations): void
    {
        # Цикл от текущего индекса `$i` до конца
        for ($j = $i; $j < $n; $j++) {
            # Берем текущего candidate
            $candidate = $candidates[$j];
            # Считаем сумму с ним
            $next_sum = $sum + $candidate;
            # Формируем combination с ним
            $next_combination = array_merge($combination, [$candidate]);
            # Если получили нужную сумму `$target`, то добавляем к `$combinations`
            if ($next_sum === $target) {
                $combinations[] = $next_combination;
            }
            # Текущая сумма меньше нужной `$target`, делаем еще рекурсивный шаг
            elseif ($next_sum < $target) {
                # Следующий рекурсивный шаг делаем, начиная с того же самого индекса `$j`, т.к. candidates могут повторяться
                $this->generateCombinations($candidates, $n, $target, $next_combination, $next_sum, $j, $combinations);
            }
            # Если `$next_sum > $target`, то пропускаем этот шаг
        }
    }
```

