# Удаление дубликатов

## Условие

Дан упорядоченный по неубыванию массив целых 32-разрядных чисел. Требуется удалить из него все повторения.

## Решение

Необходимо перебирать элементы массива, сравнивая текущий элемент с предшествующим. Если текущий элемент `!==` предшествующему, то записать его в массив-результат. 

[Реализация](Solution.php):

```php
public function deleteDuplicates(array $array): array
{
    $result = [];
    $current = null;

    foreach ($array as $element) {
        if ($element !== $current) {
            $result[] = $element;
            $current = $element;
        }
    }

    return $result;
}
```

[Тесты](./../../tests/DeletingDuplicates/SolutionTest.php)

