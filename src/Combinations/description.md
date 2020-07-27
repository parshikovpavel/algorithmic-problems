# 77. Combinations

## Condition

Given two integers *n* and *k*, return all possible combinations of *k* numbers out of 1 ... *n*.

**Example:**

```
Input: n = 4, k = 2
Output:
[
  [2,4],
  [3,4],
  [2,3],
  [1,2],
  [1,3],
  [1,4],
]
```

## Условие

TODO

## Решение 1. Cascading (каскадирование)

- TODO

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

Поэтому необходимо организовать цикл по всем длинам от 0 до n,  и сгенеририровать все возможные *combination*'s для каждой длины. Можно использовать любую технику из задачи [77. Combinations]()