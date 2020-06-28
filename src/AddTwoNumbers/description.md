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

Т.к. цифры хранятся в обратном порядке, достаточно проходить по обоим *linked list*'s с *head* (т.е. с наименее значимых цифр) и складывать соответствующие цифры. 

Необходимо использовать переменную `$carry`, чтобы хранить `1` в случае переполнения разряда.



![Add two numbers](https://parshikovpavel.github.io/img/algorithmicProblems/add_two_numbers.svg)



Для простоты кода в качестве *head* для *linked list* используется пустой `ListNode`. 

Необходимо учесть следующие *corner case*'s:

| Test case                                         | Объяснение                 |
| ------------------------------------------------- | -------------------------- |
| *l<sub>1</sub>=[0,1]*<br/>*l<sub>2</sub>=[0,1,2]* | Один *list* больше другого |
| *l<sub>1</sub>=[]<br/>l<sub>2</sub>=[0,1]*        | Один *list* пустой         |
| *l<sub>1</sub>=[9,9]<br/>l<sub>2</sub>=[1]*       | Перенос `1` в конце        |

| #    | Время         | Память        |
| ---- | ------------- | ------------- |
| 1    | `O(max(m,n))` | `O(max(m,n))` |

[Реализация](Solution.php):

```php
function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
{
    $head = $current = new ListNode();
    $carry = 0;
    while ($l1 !== null || $l2 !== null || $carry !== 0) {
        $val1 = $l1 !== null ? $l1->val : 0;
        $val2 = $l2 !== null ? $l2->val : 0;
        $sum = $val1 + $val2 + $carry;
        $current->next = new ListNode($sum % 10);
        $current = $current->next;
        $carry = intdiv($sum, 10);
        if ($l1 !== null) {
            $l1 = $l1->next;
        }
        if ($l2 !== null) {
            $l2 = $l2->next;
        }
    }
    return $head->next;
}
```

[Тесты](./../../tests/AddTwoNumbers/SolutionTest.php)

