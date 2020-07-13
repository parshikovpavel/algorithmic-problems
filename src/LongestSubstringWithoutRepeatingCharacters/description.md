# 3. Longest Substring Without Repeating Characters

## Condition

Given a string, find the length of the **longest substring** without repeating characters.

**Example 1:**

```
Input: "abcabcbb"
Output: 3 
Explanation: The answer is "abc", with the length of 3. 
```

**Example 2:**

```
Input: "bbbbb"
Output: 1
Explanation: The answer is "b", with the length of 1.
```

**Example 3:**

```
Input: "pwwkew"
Output: 3
Explanation: The answer is "wke", with the length of 3. 
             Note that the answer must be a substring, "pwke" is a subsequence and not a substring.
```

## Условие

Дана строка, найти длину самой **длинной подстроки** без повторяющихся символов.

**Пример 1:**

```
Input: "abcabcbb"
Output: 3 
Explanation: Ответ "abc", с длиной 3. 
```

**Пример 2:**

```
Input: "bbbbb"
Output: 1
Explanation: Ответ "b", с длиной 1.
```

**Example 3:**

```
Input: "pwwkew"
Output: 3
Explanation: Ответ "wke", с длиной 3. 
             Заметьте, что ответ должен быть подстрокой, "pwke" - это набор символов, а не подстрока.
```

## Решение



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

