# 46. Permutations

## Condition

Given a collection of **distinct** integers, return all possible permutations.

**Example:**

```
Input: [1,2,3]
Output:
[
  [1,2,3],
  [1,3,2],
  [2,1,3],
  [2,3,1],
  [3,1,2],
  [3,2,1]
]
```

## Условие

Дана коллекция отличающихся целых чисел. Вернуть все возможные *permutation*'s (перестановки).

**Пример:**

```
Input: [1,2,3]
Output:
[
  [1,2,3],
  [1,3,2],
  [2,1,3],
  [2,3,1],
  [3,1,2],
  [3,2,1]
]
```

https://www.topcoder.com/generating-permutations/

## Решение 1. Сведение задачи к более простой путем удаления элемента

[Combination](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#combination)

Связано с 1 объяснением количества *permutation*'s *n* различных объектов:

- (1 объяснение, 1 решение) – мы выбираем 1-ый элемент из *(n)* элементов (т.е. всего возможно *(n)* вариантов выбора 1-го элемента). После этого убираем этот элемент из *sequence*, делаем *permutation*'s оставшихся *(n-1)* элемента. 2-ой элемент мы можем выбрать из оставшихся *(n-1)* элементов, третий из оставшихся (n-2) элементов и так далее. 

Это дает нам общее количество *n × (n-1) × (n-2)... × 2 × 1 = n!* *permutation*'s.

Необходимо брать по очереди каждый элемент из *sequence* из *(n)* элементов и ставить его в конец *sequence*. Затем уменьшаем *sequence* до *n-1* элементов, и делаем все возможные *permutation*'s с ними. В итоге 1-й элемент, который стоит в конце *sequence*, будет присоединен ко всем *permutation*'s из *(n-1)* элемента.

Пример для sequence `[1, 2, 3]`:

```
[2, 3, 1], # [1, 2, 3] -> [3, 2, 1] -> [2, 3, 1]
[3, 2, 1], # [1, 2, 3] -> [3, 2, 1] -> [3, 2, 1]
[3, 1, 2], # [1, 2, 3] -> [1, 3, 2] -> [3, 2, 1]
[1, 3, 2], # [1, 2, 3] -> [1, 3, 2] -> [1, 3, 2]
[2, 1, 3], # [1, 2, 3] -> [1, 2, 3] -> [2, 1, 3]
[1, 2, 3], # [1, 2, 3] -> [1, 2, 3] -> [1, 2, 3]
```

```php
/**
 * @param array $sequence Последовательность чисел
 * @param int $n Текущий размер sequence, в которой делаются permutation's
 * @param array $permutations Найденные permutation's
 * @return void
 */
public function generatePermutations(array $sequence, int $n, array &$permutations): void
{
    if ($n === 1) {
        $permutations[] = $sequence;
        return;
    }

    for ($i = 0; $i < $n; $i++) {
        [$sequence[$i], $sequence[$n - 1]] = [$sequence[$n - 1], $sequence[$i]];
        $this->generatePermutations($sequence, $n - 1, $permutations);
        [$sequence[$i], $sequence[$n - 1]] = [$sequence[$n - 1], $sequence[$i]];
    }
}
```

## Решение 2. Вставить элемент во все места 

Связано со 2 объяснением количества *permutation*'s *n* различных объектов:

- (2 объяснение, 2 решение) 1-ый элемент мы можем разместить в одну позицию, 2-ой элемент – в две позиции (слева и справа от первого), 3-й элемент – в 3 позиции (слева, в центре, справа) для 2 вариантов на прошлом шаге, и т.д.

Алгоритм реализуется через рекурсию по следующему правилу:

- Вставьте *n-й* элемент во все возможные места всех перестановок *(n-1)* элементов.

```
                 1
        21                 12
    321 231 213        312 132 123
```

Реализация TODO!

## Решение 3. Генерация в лексикографическом порядке

Генерируем перестановку, просто взяв существующую перестановку и немного изменив ее.

Начнем с лексикографически минимальной перестановки и закончим лексикографически максимальной. Т.е. с наименьшего числа, составленного из цифр, до наибольшего числа. 

Пример:

```
    1234
    1243
    1324
    1342
    1423
    1432
    2134
    ...
```

В приведенном выше примере мы видим, что `1` остается первой цифрой в течение долгого времени, поскольку есть много перестановок последних 3 цифр, которые увеличивают перестановку на меньшую величину.
Итак, когда мы наконец «используем» `1`? Когда больше нет перестановок последних 3 цифр. Когда последние 3 цифры расположены в порядке убывания.
Следовательно, мы изменяем положение «цифры» только тогда, когда все цифры справа находится в порядке убывания. 

Алгоритм:

- Проходимся справа-налево и находим первую цифру, которая идет не в порядке убывания (1).
- Идем назад вправо и находим следующую по величине цифру (2)
- меняем местами цифры (1) и (2)
- ставим цифры после ((2), которая теперь стоит на месте (1)) в порядке возрастания. 

Связано с задачей [31. Next Permutation](../NextPermutation/description.md)