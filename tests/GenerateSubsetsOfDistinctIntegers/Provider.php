<?php

namespace ppAlgorithm\GenerateSubsetsOfDistinctIntegers;

trait Provider {
    function data()
    {
        return [
            [[
                1,
                2
            ],
            [
                [],
                [1],
                [1, 2],
                [2],
           ]],
        ];
    }
 }