<?php

namespace ppAlgorithm\Anagrams;

trait Provider {
    function data()
    {
        return [
            ["abcde", "bdcae", true],
            ["", "", true],
            ["a", "", false],
            ["fgrtdnf", "ndgfkt", false],
            ["ffdpdputuu", "fpfpuduudt", true]
        ];
    }
 }