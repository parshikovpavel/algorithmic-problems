<?php

namespace ppAlgorithm\CheckParentheses;

class Solution
{
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
}