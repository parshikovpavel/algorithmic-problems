<?php

namespace ppAlgorithm\CorrectBracketSequences;

class Solution
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
     * @return int
     */
    public function addParenthesis(string $sequence, int $opening, int $closing): void
    {
        $this->addParenthesis($sequence . '(', $opening);
        if ($opening > $closing) {
            $this->addParenthesis($sequence . ')', $opening, $closing++);
        }

    }

    public function generate(int $n): array
    {
        $this->n = $n;
        $this->sequences = [];

        $this->addParenthesis('', 0, 0);

        return $this->sequences;
    }
}