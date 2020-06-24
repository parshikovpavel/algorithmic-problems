# Add Two Numbers

## Condition

You are given two **non-empty** linked lists representing two non-negative integers. The digits are stored in **reverse order** and each of their nodes contain a single digit. Add the two numbers and return it as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.

**Example:**

```
Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
Output: 7 -> 0 -> 8
Explanation: 342 + 465 = 807.
```

## Условие

Вам даны два **непустых** *linked list*'s, представляющих два неотрицательных *int*'а. Цифры хранятся в **обратном порядке**, и каждая *node* содержит одну цифру. Сложите два числа и верните сумму как *linked list*.

Можете считать, что два числа не содержат начального нуля, кроме самого числа `0`.

**Пример:**

```
Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
Output: 7 -> 0 -> 8
Explanation: 342 + 465 = 807.
```

## Решение

Перебираем символы строки и для каждого символа считаем количество открытых на данный момент скобок `$opening` и количество закрытых скобок `$closing`. 

Строка будет валидна, если:

- если для каждого символа `$opening >= $closing`
- и в конце строки `$opening === $closing`

| #    | Время  | Память |
| ---- | ------ | ------ |
| 1    | `O(N)` | `O(1)` |

[Реализация](Solution.php):

```php
public function check(string $sequence): bool
{
    $opening = 0;
    $closing = 0;
    $length = strlen($sequence);

    for ($i = 0; $i < $length; $i++) {
        if ($sequence[$i] === '(') {
            $opening++;
        }
        else {
            $closing++;
        }
        if ($opening < $closing) {
            return false;
        }
    }

    return $opening === $closing;
}
```

[Тесты](./../../tests/CheckParentheses/SolutionTest.php)

