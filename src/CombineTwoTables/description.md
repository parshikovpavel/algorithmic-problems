# Combine Two Tables

## Condition

Table: `Person`

```
+-------------+---------+
| Column Name | Type    |
+-------------+---------+
| PersonId    | int     |
| FirstName   | varchar |
| LastName    | varchar |
+-------------+---------+
PersonId is the primary key column for this table.
```

Table: `Address`

```
+-------------+---------+
| Column Name | Type    |
+-------------+---------+
| AddressId   | int     |
| PersonId    | int     |
| City        | varchar |
| State       | varchar |
+-------------+---------+
AddressId is the primary key column for this table.
```

Write a SQL query for a report that provides the following information for each person in the Person table, regardless if there is an address for each of those people:

```
FirstName, LastName, City, State
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

