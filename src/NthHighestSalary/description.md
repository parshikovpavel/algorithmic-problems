# Nth Highest Salary

## Condition

Write a SQL query to get the *n*<sup>th</sup> highest salary from the `Employee` table.

```
+----+--------+
| Id | Salary |
+----+--------+
| 1  | 100    |
| 2  | 200    |
| 3  | 300    |
+----+--------+
```

For example, given the above Employee table, the *n*<sup>th</sup> highest salary where *n* = 2 is `200`. If there is no *n*<sup>th</sup>  highest salary, then the query should return `null`.

```
+------------------------+
| getNthHighestSalary(2) |
+------------------------+
| 200                    |
+------------------------+
```

## Условие

Напишите SQL-запрос, чтобы получить *n*-ю наибольшую зарплату из `Employee` таблицы.

```
+----+--------+
| Id | Salary |
+----+--------+
| 1  | 100    |
| 2  | 200    |
| 3  | 300    |
+----+--------+
```

Например, учитывая приведенную выше таблицу `Employee`, *n*-я наибольшая зарплата, где *n = 2* – `200 `. Если нет *n*-ой наибольшей зарплаты, запрос должен вернуться `null`.

```
+------------------------+
| getNthHighestSalary(2) |
+------------------------+
| 200                    |
+------------------------+
```

## Решение

Необходимо применить `OFFSET N` + `LIMIT 1`. 

Чтобы возвращать `NULL`, если в таблице только одна строка необходимо использовать коррелированный подзапрос в блоке `SELECT`

[Реализация](Solution.php)

```php
$n = 3;
$m = $n - 1;
$sql = "
            SELECT (
                SELECT DISTINCT Salary
                FROM Employee
                ORDER BY Salary DESC
                LIMIT 1
                OFFSET $m 
            ) AS NthHighestSalary
";

```

[Тесты](./../../tests/NthHighestSalary/SolutionTest.php)

