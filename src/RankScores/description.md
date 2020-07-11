# 178. Rank Scores

## Condition

Write a SQL query to rank scores. If there is a tie between two scores, both should have the same ranking. Note that after a tie, the next ranking number should be the next consecutive integer value. In other words, there should be no "holes" between ranks.

```
+----+-------+
| Id | Score |
+----+-------+
| 1  | 3.50  |
| 2  | 3.65  |
| 3  | 4.00  |
| 4  | 3.85  |
| 5  | 4.00  |
| 6  | 3.65  |
+----+-------+
```

For example, given the above `Scores` table, your query should generate the following report (order by highest score):

```
+-------+---------+
| score | Rank    |
+-------+---------+
| 4.00  | 1       |
| 4.00  | 1       |
| 3.85  | 2       |
| 3.65  | 3       |
| 3.65  | 3       |
| 3.50  | 4       |
+-------+---------+
```

**Important Note:** For MySQL solutions, to escape reserved words used as column names, you can use an apostrophe before and after the keyword. For example \`Rank\`.

## Условие

Напишите SQL-запрос для ранжирования баллов. Если несколько баллов имеют одинаковое значение, то они должны иметь одинаковый ранг. Обратите внимание, что ранги должны идти последовательно друг за другом. Другими словами, между рангами не должно быть «дыр».

```
+----+-------+
| Id | Score |
+----+-------+
| 1  | 3.50  |
| 2  | 3.65  |
| 3  | 4.00  |
| 4  | 3.85  |
| 5  | 4.00  |
| 6  | 3.65  |
+----+-------+
```

Например, для вышеприведенной таблицы `Scores` запрос должен сгенерировать следующий результат (в порядке убывания баллов):

```
+-------+---------+
| score | Rank    |
+-------+---------+
| 4.00  | 1       |
| 4.00  | 1       |
| 3.85  | 2       |
| 3.65  | 3       |
| 3.65  | 3       |
| 3.50  | 4       |
+-------+---------+
```

Важное замечание: Для MySQL, чтобы избежать использования зарезервированных слов в качестве  имен столбцов, вы можете использовать апостроф до и после ключевого слова. Например \`Rank\`.

## Решение



[Реализация](Solution.php)

```php


```

[Тесты](./../../tests/NthHighestSalary/SolutionTest.php)

