<?php

namespace ppAlgorithm\RankScores;

trait Fixture {
    protected function tables(): array
    {
        return [
            'Scores' => 'Id int, Score DECIMAL(3,2)',
        ];
    }

    public function data(): array
    {
        return [
            [
                [
                    'Scores' => [
                        [
                            'Id' => '1',
                            'Score' => '3.5',
                        ],
                        [
                            'Id' => '2',
                            'Score' => '3.65',
                        ],
                        [
                            'Id' => '3',
                            'Score' => '4.0',
                        ],
                        [
                            'Id' => '4',
                            'Score' => '3.85',
                        ],
                        [
                            'Id' => '5',
                            'Score' => '4.0',
                        ],
                        [
                            'Id' => '6',
                            'Score' => '3.65',
                        ],
                    ],
                ],
                [
                    'result' => [
                        [
                            'Score' => '4.0',
                            'Rank' => 1,
                        ],
                        [
                            'Score' => '4.0',
                            'Rank' => 1,
                        ],
                        [
                            'Score' => '3.85',
                            'Rank' => 2,
                        ],
                        [
                            'Score' => '3.65',
                            'Rank' => 3,
                        ],
                        [
                            'Score' => '3.65',
                            'Rank' => 3,
                        ],
                        [
                            'Score' => '3.5',
                            'Rank' => 4,
                        ],
                    ],
                ]
            ],
        ];
    }
 }