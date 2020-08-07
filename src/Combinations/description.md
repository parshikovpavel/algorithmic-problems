# 77. Combinations

## Condition

Given two integers *n* and *k*, return all possible combinations of *k* numbers out of 1 ... *n*.

**Example:**

```
Input: n = 5, k = 3
Output : 1 2 3 
         1 2 4 
         1 2 5 
         1 3 4 
         1 3 5 
         1 4 5 
         2 3 4 
         2 3 5 
         2 4 5 
         3 4 5
```

## Условие

Даны два целых числа *n* и *k*, вернуть все возможные *combination*'s' из *k* чисел из множества 1 ... *n*.

**Пример:**

```
Input: n = 5, k = 3
Output : 1 2 3 
         1 2 4 
         1 2 5 
         1 3 4 
         1 3 5 
         1 4 5 
         2 3 4 
         2 3 5 
         2 4 5 
         3 4 5
```

[Combination](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#combination)

## Решение 1. Backtracking

Используем рекурсию:

- *base case* – текущий размер *Combination* `$current_k` достиг требуемого размера `$k`.

- *recursive case*. Перебираем в цикле числа из *set*'а, начиная с позиции `$start` – позиция после числа, взятого на предыдущем шаге рекурсии (в этом случае не возможны повторения *combination*'s). Перебор продолжаем, пока не переберем все числа до `$n`, либо не останется в *set* достаточно чисел, чтобы получить Combination размера `$k`. 

  Добавляем очередное число `$i` в текущую комбинацию `$current_combination`, вызываем функцию рекурсивно, при этом стартовая позиция для очередного перебора  `$i + 1`. 

Например для случая, `n = 5` и `k = 3`, исходный *set* – `[1, 2, 3, 4, 5]`.

- Выбираем `1`  и вызываем рекурсивно функцию для добавления чисел, начиная с `2` и т.д. В итоге получаем `{1,2,3}`, `{1,2,4}`, `{1,2,5}`, `{1,3,4}`, `{1,4,5}`.
- Выбираем `2`  и вызываем рекурсивно функцию для добавления чисел, начиная с `3` и т.д. В итоге получаем `{2,3,4}`, `{2,3,5}`, `{2,4,5}`.
- Выбираем `3` и вызываем рекурсивно функцию для добавления чисел, начиная с `4` и т.д. В итоге получаем `{3, 4, 5}`.
- Перебор останавливаем, т.к. *Combination*'s размера `3`, начинающихся с чисел `4` и `5`, – нет. 

![combination_1](https://parshikovpavel.github.io/img/algorithmicProblems/combinations_1.jpeg)

[Реализация](Solution1.php):

```php
(new Solution1())->generateCombinations($n, $k, 0, 0, [], $combinations);

class Solution1
{
    /**
     * Сгенерировать все возможные combination's длиной $k для чисел от 1..$n
     * @param int $n
     * @param int $k Требуемый размер combination
     * @param int $start С какого элемента начинать итерировать на текущей итерации
     * @param int $current_k Текущий размер combination
     * @param array $current_combination Текущая combination
     * @param array $combinations Найденные combination's
     * @return void
     */
    public function generateCombinations(int $n, int $k, int $start, int $current_k, array $current_combination, array &$combinations): void
    {
        # base case – текущий размер Combination `$current_k` достиг требуемого размера `$k`.
        if ($current_k === $k) {
            $combinations[] = $current_combination;
            return;
        }

        # recursive case.
        # Перебираем в цикле числа из set'а, начиная с позиции `$start` – позиция после числа, взятого на 
        # предыдущем шаге рекурсии (в этом случае не возможны повторения *combination*'s).
        # Перебор продолжаем, пока не переберем все числа до `$n`, либо не останется в set достаточно чисел,
        # чтобы получить Combination размера `$k`.
        for ($i = $start; $i < $n && $k - $current_k <= $n - $i; $i++) {
            # Добавляем очередное число `$i` в текущую комбинацию `$current_combination`,
            $current_combination[$current_k] = $i + 1;

            # вызываем функцию рекурсивно, при этом стартовая позиция для очередного перебора  `$i + 1`. 
            $this->generateCombinations($n, $k, $i + 1, $current_k + 1, $current_combination, $combinations);
        }
    }
}
```

Количество *k-combination*'s из *n* элементов обозначается *C<sub>n</sub><sup>k</sup>*. ([1](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#combination))

*C<sub>n</sub><sup>k</sup>=(n!) / (k!⋅(n-k)!)*

**Time complexity**: *O(k × C<sub>n</sub><sup>k</sup>)*, т.к. всего *k × C<sub>n</sub><sup>k</sup>*  шагов в дереве поиска (на рисунке видно).

**Space complexity**: *O(k × C<sub>n</sub><sup>k</sup>)*. Т.к. всего есть *C<sub>n</sub><sup>k</sup>* *combination*'s, каждая из которых имеет длину *k*. 

## Решение 2. Включение/исключение элемента

Это просто преобразование *iteration* в *recursion* (1)

Не перебираем, как в предыдущем случае, все элементы от `$start` до `$n` на текущем шаге рекурсии. На текущем шаге рекурсии только подставляем значение с индексом `$start`. Значение с индексом `$start+1` подставляется на следующем витке рекурсии. 

![combination_2](https://parshikovpavel.github.io/img/algorithmicProblems/combinations_2.jpeg)

```php
(new Solution2())->generateCombinations($n, $k, 0, 0, [], $combinations);

class Solution2
{
    /**
     * Сгенерировать все возможные combination's длиной $k для чисел от 1..$n
     * @param int $n
     * @param int $k Требуемый размер combination
     * @param int $start С какого элемента начинать итерировать на текущей итерации
     * @param int $current_k Текущий размер combination
     * @param array $current_combination Текущая combination
     * @param array $combinations Найденные combination's
     * @return void
     */
    public function generateCombinations(int $n, int $k, int $start, int $current_k, array $current_combination, array &$combinations): void
    {
        # base case's

        # 1. в set недостаточно чисел, чтобы получить Combination размера `$k`
        if ($k - $current_k > $n - $start) {
            # Возвращаемся без сохранения combination
            return;
        }

        # 2. Если найдена combination размера $k
        if ($current_k === $k) {
            # Сохраняем найденную combination
            $combinations[] = $current_combination;
            return;
        }

        # сохранить текущее значение в combination
        $current_combination[$current_k] = $start + 1;
        # продолжить подставлять числа, начиная с индекса `$start+1`, при этом длина combination 
        # увеличилась `$current_k+1`
        $this->generateCombinations($n, $k, $start + 1, $current_k + 1, $current_combination, $combinations);

        # можно `unset($current_combination[$current_k])`, но не обязательно, т.к. на следующем рекурсивном 
        # вызове это значение будет перезаписано
        # также продолжить подставлять числа, начиная с индекса `$start+1`, но при этом длина combination 
        # НЕ увеличилась `$current_k`
        $this->generateCombinations($n, $k, $start + 1, $current_k, $current_combination, $combinations);
    }
}
```

**Time complexity**: *O(2<sup>n</sup>)*, т.к. для каждого элемента есть две возможности: будет ли он выбран на текущем шаге рекурсии или нет. Получается *O(2 × 2 × ... ×2).

**Space complexity**: *O(k × C<sub>n</sub><sup>k</sup>)*. Т.к. всего есть *C<sub>n</sub><sup>k</sup>* *combination*'s, каждая из которых имеет длину *k*. 

## Решение 3. Битовые операции

[Лексикографический порядок](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#лексикографический-порядок)

Будем перебирать все двоичные последовательности *k* единицами и *n−k* нулями в обратном лексикографическом порядке.

Пусть *n=5* и *k=3*. Чтобы порядок *combination*'s начинался со стандартной `[1, 2, 3]` примем стартовую битовую последовательность `[1,1,1,0,0]`, а конечную – `[0,0,1,1,1]`. Т.е. перебираем в обратном лексикографическом порядке.

Порядок перехода от одной последовательности к предыдущей в лексикографическом порядке: если меняем `0` на `1`, то слева от замененного бита пишем лексикографически максимальное с учетом сохранения условия на `k`. 

Получается такой порядок:

```
[1,1,1,0,0]
[1,1,0,1,0]
[1,0,1,1,0]
[0,1,1,1,0]
[1,1,0,0,1]
[1,0,1,0,1]
[0,1,1,0,1]
[1,0,0,1,1]
[0,1,0,1,1]
[0,0,1,1,1]
```

Нужно проаналилизировать порядок перестановок и тогда получается такая закономерность.

```php
public function generateCombinations(int $n, int $k): array
    {
        $combinations = [];
        # Заполняем массив `$bits` стартовой битовой последовательность (`$k` единиц в начале, остальное - 0)
        $bits = array_fill(0, $k, 1) + array_fill($k, $n - $k, 0);
        while (true) {
            # Выводим текущую combination в результат
            $combination = [];
            for ($i = 0; $i < $n; $i++) {
                # Если соответствующий бит = 1, то добавляем в combination число
                if ($bits[$i] === 1) {
                    $combination[] = $i + 1;
                }
            }
            $combinations[] = $combination;

            # Число бит 1 до первого бита 0 слева
            $one_number = 0;
            # перебираем биты слева-направо
            # до тех пор, пока нам встречаются 1
            # либо еще не попадалось ни одной 1 (например, для case [0, 1, 1, 0, 1] на первом шаге)
            for ($i = 0; $i < $n && ($bits[$i] === 1 || $one_number === 0); $i++) {
                # если попался бит 1, увеличиваем счетчик `$one_number`
                if ($bits[$i] === 1) {
                    $one_number++;
                }
            }

            # если прошли до конца битовой последовательности - переставлять больше нечего
            # битовая последовательность начинает с 0 и заканчивается 1 - [0,0,0,1,1]
            if ($i === $n) break;

            # устанавливаем первый слева бит 0 в значение 1
            $bits[$i] = 1;

            # слева от замененного бита пишем лексикографически максимальное значение с условием,
            # что общее количество 1 будет не больше `$k`.
            # Для этого нам нужно слева оставить `$one_number - 1` единиц (т.к. одну 1 мы уже использовали, когда установили бит)
            # Лексикографически максимальное значение - то, у которого слева идут 1, а после них 0 
            for ($j = 0; $j < $i; $j++) {
                if ($j < $one_number - 1) {
                    $bits[$j] = 1;
                }
                else {
                    $bits[$j] = 0;
                }
            }
        }

        return $combinations;
    }
```



