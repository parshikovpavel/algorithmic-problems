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

## Решение 1. Brute force

Организуем полный перебор всех подстрок в строке. Для этого делаем два вложенных цикла: `i = 0 ÷ length-1`, `j = i ÷ length -1`.

Для каждой подстроки проверяем, что все символы в подстроке - уникальны. Используем функцию `areCharsUnique()`.

[Реализация](Solution1.php):

```php
/**
     * Найти максимальную длину подстроки без повторения символов
     * @param string $s
     * @return int
     */
    public function lengthOfLongestSubstring(string $s): int
    {
        $lengthS = strlen($s);
        $maxLength = 0;
        for ($i = 0; $i < $lengthS; $i++) {
            for ($j = $i; $j < $lengthS; $j++) {
                $substring = substr($s, $i, $j - $i + 1);
                if ($this->areCharsUnique($substring)) {
                    $maxLength = max($maxLength, strlen($substring));
                }
            }
        }

        return $maxLength;
    }

    /**
     * Проверить, являются ли все символы в строке уникальными
     * @param string $s
     * @return bool
     */
    public function areCharsUnique(string $s): bool
    {
        $set = [];
        $lengthS = strlen($s);
        for ($i = 0; $i < $lengthS; $i++) {
            if (isset($set[$s[$i]])) {
                return false;
            }
            else {
                $set[$s[$i]] = 1;
            }
        }

        return true;
    }
```

[Тесты](./../../tests/LongestSubstringWithoutRepeatingCharacters/Solution1Test.php)

## Решение 2. Sliding window

[Sliding window](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#sliding-window)

Инициализируем два указателя `$i` (левая граница *sliding window*) и `$j` (правая граница *sliding window*). Инициализируем *Set* `$set`, где будем хранить символы из диапазона `[$i; $j]`. 

Двигаем указатель `$j` вправо на одну позицию и проверяем:

- если символа `$s[$j+1]` нет в `$set`, то добавляем его в `$set` и увеличиваем максимальную длину `$maxLength`
- если символ `s[$j+1]` есть в `$set`, то значит где-то раньше в диапазоне  `[$i; $j]`  этот символ встречался. Начинаем уменьшать размер окна, для этого сдвигаем левую границу `$i` вправо на один символ и удаляем этот символ из `$set`. Правую границу `$j` на этом шаге не изменяем.

[Реализация](Solution2.php):

```php
public function lengthOfLongestSubstring(string $s): int
{
    $i = 0;
    $j = 0;
    $set = [];
    $lengthS = strlen($s);
    $maxLength = 0;

    while ($j < $lengthS) {
        if (!isset($set[$s[$j]])) {  # Если нет такого символа в $set
            $set[$s[$j]] = 1;        # Добавляем его в $set
            $j++;                    # И двигаем правую границу sliding window
            $maxLength = max($j - $i, $maxLength);  # Увеличиваем $maxLength
        }
        else {
            unset($set[$s[$i]]);     # Иначе уменьшаем размер sliding window
            $i++;                    # Удаляем из $set символ по левой границе и двигаем левую границу
        }
    }

    return $maxLength;
}
```

## Решение 3. Sliding window

[Sliding window](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#sliding-window)

Улучшенный вариант [Решения 2](). 

Аналогично инициализируем два указателя `$i` (левая граница *sliding window*) и `$j` (правая граница *sliding window*). 

Однако используем *HashTable* `$hashTable`, где будем хранить отображения `['символ_из_строки' => позиция_символа_в_строке]`. Причем в `$hashTable` хранятся как символы, который входят в диапазон `[$i; $j)`, так и возможно те, которые вышли за пределы этого диапазона.

Теперь, если мы вдруг определяем, что символ `$s[$j]` ранее нам уже встречался и он входит в диапазон `[$i; $j)` с индексом `j′`, мы сразу сдвигаем указатель `$i` на позицию `j′+1` за этим символом (чтобы исключить символ из диапазона `[$i; $j]`, при этом пропускаем сразу все символы из диапазона `[$i; j′]`) и заносим в `$hashTable` новую позицию этого символа `$j`. 

Нам не нужно исключать из `$hashTable` все остальные символы из диапазона `[$i; j′]` после сдвига указателя, т.к. достаточно проверить условие `позиция_символа_в_строке >= $i`, чтобы гарантировать, что символ из `$hashTable` находится диапазоне `[$i; $j]`.

```php
public function lengthOfLongestSubstring(string $s): int
{
    $i = 0;
    $hashTable = [];
    $lengthS = strlen($s);
    $maxLength = 0;

    for ($j = 0; $j < $lengthS; $j++) {
        if (isset($hashTable[$s[$j]]) && $hashTable[$s[$j]] >= $i) { # Если символ уже ранее нам встречался и находится в диапазоне [$i; $j)
            $i = $hashTable[$s[$j]] + 1;                             # Сразу сместить указатель $i на позицию за этим символом, чтобы исключить его из диапазона [$i; $j)
        }
        else {
            $maxLength = max($j - $i + 1, $maxLength);               # Иначе, обновить значение максимальной длина
        }
        $hashTable[$s[$j]] = $j;                                     # Сохранить позицию $j текущего символа в $hashTable
    }

    return $maxLength;
}
```



| #    | Время              | Память                        |
| ---- | ------------------ | ----------------------------- |
| 1    | *O(n<sup>3</sup>)* | *O(n)*                        |
| 2    | *O(n+n) = O(n)*    | *O(n)* ( для хранения `$set`) |
| 3    | *O(n)*             | *O(n)*                        |

