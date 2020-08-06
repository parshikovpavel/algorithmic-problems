# 78. Generate subsets of distinct integers

## Condition

Given a set of **distinct** integers, *nums*, return all possible subsets (the power set).

**Note:** The solution set must not contain duplicate subsets.

**Example:**

```
Input: nums = [1,2,3]
Output:
[
  [3],
  [1],
  [2],
  [1,2,3],
  [1,3],
  [2,3],
  [1,2],
  []
]
```

## Условие

Дан *set* **различных** целых чисел, вернуть все возможные *subset*'s (включая пустой *subset*) – т.н. [power set]()

**Примечание.** Решение не должен содержать одинаковых *subset*'s.

**Пример:**

```
Input: nums = [1,2,3]
Output:
[
  [3],
  [1],
  [2],
  [1,2,3],
  [1,3],
  [2,3],
  [1,2],
  []
]
```

## Решение 1. Cascading (каскадирование)

Для *set* длиной *n* – размер *power set 2<sup>n</sup>*.

Изначально в списке `$subsets` один пустой массив `[]`. 

- На первом шаге выбираем первый элемент из `$set` и присоединяем его ко всем *subset*'s, которые уже сохранены в `$subsets`.
- На втором шаге выбираем второй элемент из `$set`  и также присоединяем его ко всем *subset*'s. 
- и т.д.

[Реализация](Solution1.php):

```php
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
```

![subset_1](https://parshikovpavel.github.io/img/algorithmicProblems/subsets_1.jpg)

**Time complexity**: *O(N×2<sup>N</sup>)*, т.к. всего *2<sup>n</sup>* *subset*'ов и каждый из них размером N нужно скопировать в выходной `$subsets`

**Space complexity**: *O(N×2<sup>N</sup>)*. Т.к. всего *2<sup>n</sup>* *subset*'ов, каждый из которых имеет длину N. 

## Решение 2. Backtracking

[Backtracking](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#backtracking)

*Powerset* – это все возможные *combination*'s всех возможных *длин* от 0 до n.

Поэтому необходимо организовать цикл по всем длинам от 0 до n,  и сгенеририровать все возможные *combination*'s для каждой длины. Можно использовать любую технику из задачи [77. Combinations](../Combinations/description.md)

TODO!!!

https://leetcode.com/problems/subsets/solution/

## Решение 3. Манипуляция битами

Если каждое подмножество представить в виде массива индексов, где `0` означает, что элемент не входит в множество, а `1`— что входит, тогда генерирование всех таких массивов будет являться генерированием всех подмножеств. Сопоставляем каждое подмножество с битовой маской длины *n,* где `1` на *i*-й позиции в битовой маске означает наличие `set[i]` в *subset*, а `0` – означает отсутствие. 



![subset_2](https://parshikovpavel.github.io/img/algorithmicProblems/subsets_2.png)

Если рассмотреть побитовое представление чисел от *0* до *2<sup>n</sup>−1*, то они будут задавать искомые подмножества. То есть для решения задачи необходимо реализовать прибавление единицы к двоичному числу.

Необходимо понять, как перейти от одного числа в битовом представлении, к следующему, на `1` больше:

```
[0, 0, 0]
[0, 0, 1]
[0, 1, 0]
[0, 1, 1]
[1, 0, 0]
[1, 0, 1]
[1, 1, 0]
[1, 1, 1]
```

Алгоритм каждого шага:

- самый правый `0` заменяется на `1`. 
- все биты правее, заменяются на `0`

```php
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
```

