<?php

namespace ppAlgorithm\GenerateParentheses;

class Solution2
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
}