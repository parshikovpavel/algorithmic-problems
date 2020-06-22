<?php

namespace ppAlgorithm\GenerateParentheses;

trait Provider {
    function data()
    {
        return [
            [1, [
                '()'
            ]],
            [2, [
                '(())',
                '()()',
            ]],
            [3, [
                '((()))',
                '(()())',
                '(())()',
                '()(())',
                '()()()'
            ]]
        ];
    }
 }