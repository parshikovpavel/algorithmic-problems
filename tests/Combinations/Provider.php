<?php

namespace ppAlgorithm\Combinations;

trait Provider {
    function data()
    {
        return [
            [4, 2, [
                [2,4],
                [3,4],
                [2,3],
                [1,2],
                [1,3],
                [1,4],
            ]],
            [5, 3, [
                [1, 2, 3],
                [1, 2, 4],
                [1, 2, 5],
                [1, 3, 4],
                [1, 3, 5],
                [1, 4, 5],
                [2, 3, 4],
                [2, 3, 5],
                [2, 4, 5],
                [3, 4, 5],
            ]],
        ];
    }
 }