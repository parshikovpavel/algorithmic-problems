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

## Решение 1

Используются переменные MySQL.

- `@prev_score` – хранит предыдущее значение `Score` для того, и если `@prev_score = Score`, то `Rank` повышать не нужно, иначе нужно инкрементировать `Rank`
- `@rank` – хранит текущее значение `Rank`. `@rank` инкрементируется при каждом изменении `Score`.

[Реализация](Solution1.php)

```mysql
SELECT Score, `Rank`
FROM (
    SELECT 
    	Score,
    	@rank := if(@prev_score = Score, @rank, @rank + 1) AS `Rank`,
    	@prev_score := Score AS Dummy   
    FROM Scores,
    	(SELECT @rank := 0, @prev_score := -1) as t
    ORDER BY Score DESC
) x
```



## Решение 2

Используем коррелированный подзапрос в блоке `SELECT`. Будем искать количество уникальных `Score` – `COUNT(distinct Score)`, для которых значение `Score` больше и равно текущему значению.

[Реализация](Solution2.php)

```mysql
SELECT Score, 
    (
        SELECT COUNT(distinct Score) FROM Scores S2 WHERE S2.Score >= S1.Score
    ) AS Rank
FROM Scores S1
ORDER BY Score DESC
```



## Решение 3

Сделаем `INNER JOIN` на таблицу с уникальными значениями `Score` – `SELECT DISTINCT Score FROM Scores`, причем присоединим те строки из нее, для которых `S1.Score <= S2.Score`. В итоге количество присоединенных строк будет равно искомому `Rank`. Осталось сгруппировать объединенную таблицу по `Id` из основной таблицы (`S1.Id`) и сделать `COUNT(*)`

[Реализация](Solution3.php)

```mysql
SELECT S1.Score, 
    COUNT(*) AS Rank
FROM Scores S1 INNER JOIN (
    SELECT DISTINCT Score FROM Scores
    ) S2 ON S1.Score <= S2.Score     
GROUP BY S1.Id, S1.Score
ORDER BY S1.Score DESC
```

