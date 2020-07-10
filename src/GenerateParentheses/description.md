# Правильные скобочные последовательности

## Condition

Given `n` pairs of parentheses, write a function to generate all combinations of well-formed parentheses.

For example, given `n = 3`, a solution set is:

```
[
  "((()))",
  "(()())",
  "(())()",
  "()(())",
  "()()()"
]
```

## Условие

Дано целое число `n`. Требуется вывести все правильные скобочные последовательности длины `2⋅n`, упорядоченные лексикографически. Необходимо использовать только круглые скобки `()`.

## Решение

### Лексикографический порядок

Лексикографический порядок — отношение порядка на множестве слов над некоторым упорядоченным алфавитом `A`. 

Слово `a` предшествует слову `b`, т.е. `a < b`, если

- либо первые `m` символов этих слов совпадают, а `m+1`-й символ слова `a` меньше `m+1`-го символа слова `b`
- либо слово `a` является началом слова `b`

Пример:

- Порядок слов в словаре:

  ```
  А < АА < ААА < ААБ < ААВ 
  ```

### Правильная скобочная последовательность

Правильная скобочная последовательность — последовательность парных скобок одного или разных видов (`()`, `[]`,...), которые используют правильную вложенность друг в друга. 

Формирование правильной скобочной последовательности:

- пустая строка — правильная скобочная последовательность ` `;
- правильная скобочная последовательность, взятая в скобки одного типа — правильная скобочная последовательность `( )`;
- правильная скобочная последовательность, к которой приписана слева или справа правильная скобочная последовательность — тоже правильная скобочная последовательность `( )( )`



| #    | Время              | Память             |
| ---- | ------------------ | ------------------ |
| 1    | *O(2<sup>n</sup>)* | *O(2<sup>n</sup>)* |
| 2    |                    |                    |



### Решение 1

Самое простое решение в лоб – [Brute-force search](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#brute-force-search)

Используем [рекурсию](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#рекурсия).

<u>Алгоритм:</u>

- для *base case* – если получили правильную скобочную последовательность (алгоритм здесь [1](./../../src/CheckParentheses/description.md)), то сохраняем строку, иначе – пропускаем.
- для *recursive case* – значение определяется как:
  - открывающая скобка `(` + все правильные скобочные последовательности длины `$n -$current - 1`
  - закрывающая скобка `)` + все правильные скобочные последовательности длины `$n -$current - 1`

[Реализация](Solution1.php):

```php
class Solution1
{
    /**
     * @var int Количество открывающих (или закрывающих) скобок в последовательности
     */
    private int $n;

    /**
     * @var array Сгенерированные скобочные последовательности
     */
    private array $sequences;


    /**
     * Рекурсивная функция
     * Добавить очередную круглую скобку
     * @param string $sequence Текущая скобочная последовательность
     * @param int $current Количество поставленных скобок в текущий момент
     * @param int $opening Количество открывающих скобок
     * @param int $closing Количество закрывающих скобок
     * @return void
     */
    public function addParenthesis(string $sequence, int $current, int $opening, int $closing): void
    {
        if ($current === 2 * $this->n) {
            if ($this->check($sequence)) {
                $this->sequences[] = $sequence;
            }
            return;
        }
        $this->addParenthesis($sequence . '(', $current + 1, $opening + 1, $closing);
        $this->addParenthesis($sequence . ')', $current + 1, $opening, $closing + 1);
    }

    /**
     * Провалидировать скобочную последовательность
     * @param $sequence string Скобочная последовательность
     * @return bool
     */
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


    /**
     * Сгенерировать правильные скобочные последовательности длины `n`
     * @param int $n Длина скобочных последовательностей
     * @return array
     */
    public function generate(int $n): array
    {
        $this->n = $n;
        $this->sequences = [];

        $this->addParenthesis('', 0, 0, 0);

        return $this->sequences;
    }
}
```

[Тесты](./../../tests/GenerateParentheses/Solution1Test.php)

### Решение 2

Используем *backtracking* ([1](https://github.com/parshikovpavel/cheat-sheets/blob/master/Algorithm.md#backtracking)) – вместо добавления скобок `(` и `)` на каждом шаге, будем добавлять каждую из них только если это не противоречит *constraint*'s.

Имеем такие *constraint*'s:

- можем добавить в строку открывающую скобку `(`, если количество открывающих скобок `$opening < n`. Т.к. количество открывающих (и закрывающих скобок) всегда будет `n`.
- можем добавить в строку закрывающую скобку `)`, если открывающих скобок больше чем закрывающих `$opening > $closing`.

После получения скобочной последовательности ее валидация не требуется, т.к. она уже проверена на *constraint*'s в момент генерации.

[Реализация](Solution2.php):

```php
    /**
     * @var int Количество открывающих (или закрывающих) скобок в последовательности
     */
    private int $n;

    /**
     * @var array Сгенерированные скобочные последовательности
     */
    private array $sequences;


    /**
     * Рекурсивная функция
     * Добавить очередную круглую скобку
     * @param string $sequence Текущая скобочная последовательность
     * @param int $current Количество поставленных скобок в текущий момент
     * @param int $opening Количество открывающих скобок
     * @param int $closing Количество закрывающих скобок
     * @return void
     */
    public function addParenthesis(string $sequence, int $current, int $opening, int $closing): void
    {
        if ($current === 2 * $this->n) {
            $this->sequences[] = $sequence;
            return;
        }

        if ($opening < $this->n) {
            $this->addParenthesis($sequence . '(', $current + 1, $opening + 1, $closing);
        }
        if ($opening > $closing) {
            $this->addParenthesis($sequence . ')', $current + 1, $opening, $closing + 1);
        }
    }

   /**
     * Сгенерировать правильные скобочные последовательности длины `n`
     * @param int $n Длина скобочных последовательностей
     * @return array
     */
    public function generate(int $n): array
    {
        $this->n = $n;
        $this->sequences = [];

        $this->addParenthesis('', 0, 0, 0);

        return $this->sequences;
    }
```

[Тесты](./../../tests/GenerateParentheses/Solution2Test.php)

