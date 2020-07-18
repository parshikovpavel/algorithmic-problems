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



| #    | Время              | Память |
| ---- | ------------------ | ------ |
| 1    | *O(n<sup>3</sup>)* | *O(n)* |

