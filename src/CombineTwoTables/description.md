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

## Условие

Таблица: `Person`

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

Таблица: `Address`

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

Напишите SQL запрос для отчета, который предоставляет следующую информацию для каждого человека в таблице `Person`, независимо от того, есть ли адрес для каждого из этих людей:

```
FirstName, LastName, City, State
```

## Решение

Достаточно использовать `LEFT JOIN`

[Реализация](Solution.php):

```mysql
SELECT LastName, FirstName, City, State
FROM Person LEFT JOIN Address USING (PersonId)
ORDER BY PersonId
```

[Тесты](./../../tests/CombineTwoTables/SolutionTest.php)

