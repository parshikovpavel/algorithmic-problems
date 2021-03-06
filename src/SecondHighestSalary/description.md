# Second Highest Salary

## Condition

Write a SQL query to get the second highest salary from the `Employee` table.

```
+----+--------+
| Id | Salary |
+----+--------+
| 1  | 100    |
| 2  | 200    |
| 3  | 300    |
+----+--------+
```

For example, given the above Employee table, the query should return `200` as the second highest salary. If there is no second highest salary, then the query should return `null`.

```
+---------------------+
| SecondHighestSalary |
+---------------------+
| 200                 |
+---------------------+
```

## Условие

Напишите SQL-запрос, чтобы получить вторую наибольшую зарплату из `Employee` таблицы.

```
+----+--------+
| Id | Salary |
+----+--------+
| 1  | 100    |
| 2  | 200    |
| 3  | 300    |
+----+--------+
```

Например, учитывая приведенную выше таблицу `Employee`, запрос должен возвращаться `200 ` как вторую наибольшую зарплату. Если нет второй наибольшей зарплаты, запрос должен вернуться `null`.

```
+---------------------+
| SecondHighestSalary |
+---------------------+
| 200                 |
+---------------------+
```

## Решение

Необходимо применить `OFFSET 1` + `LIMIT 1`. 

Чтобы возвращать `NULL`, если в таблице только одна строка, можно:

1. Использовать коррелированный подзапрос в блоке `SELECT` ([Реализация](Solution.php) + [Тесты](./../../tests/SecondHighestSalary/SolutionTest.php))

   ```mysql
   SELECT (
       SELECT DISTINCT Salary
       FROM Employee
       ORDER BY Salary DESC
       LIMIT 1
       OFFSET 1 
   ) AS SecondHighestSalary
   ```

2. Поместить коррелированный подзапрос в `IFNULL()`

   ```mysql
   SELECT IFNULL((
       SELECT DISTINCT Salary
       FROM Employee
       ORDER BY Salary DESC
       LIMIT 1
       OFFSET 1 
   ), NULL) AS SecondHighestSalary
   ```

:

```mysql

```



