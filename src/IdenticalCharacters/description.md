# Совпадающие символы

## Условие

Даны две строки строчных латинских символов: строка `$a` и строка `$b`. Определить, какое количество символов из `$b` (не уникальных символов, а символов вообще) встречается в `$a`.

## Решение

Необходимо из символов строки `$a` построить *set*. Затем пройтись по строке `$b`  и каждый символ проверить на вхождение в этот *set*.

| #    | Время                                   | Память |
| ---- | --------------------------------------- | ------ |
| 1    | `O(N + M)`, где `N` и `M` – длины строк | `O(1)` |

[Реализация](Solution.php):

```php
public function getNumberOfIdenticalCharacters(string $a, string $b): int
{
    $set = [];
    $aLength = strlen($a);
    $bLength = strlen($b);
    $number = 0;

    for ($i = 0; $i < $aLength; $i++) {
        $set[$a[$i]] = true;
    }

    for ($i = 0; $i < $bLength; $i++) {
        if (isset($set[$b[$i]])) {
            $number++;
        }
    }

    return $number;
}
```

[Тесты](./../../tests/IdenticalCharacters/SolutionTest.php)

