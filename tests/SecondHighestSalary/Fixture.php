<?php

namespace ppAlgorithm\SecondHighestSalary;

trait Fixture {
    protected function tables(): array
    {
        return [
            'Employee' => 'Id int, Salary int',
        ];
    }

    public function data(): array
    {
        return [
            [
                [
                    'Employee' => [
                        [
                            'Id' => '1',
                            'Salary' => '100',
                        ],
                        [
                            'Id' => '2',
                            'Salary' => '200',
                        ],
                        [
                            'Id' => '3',
                            'Salary' => '300',
                        ],
                    ],
                ],
                [
                    'result' => [
                        [
                            'SecondHighestSalary' => '200',
                        ],
                    ],
                ]
            ],
            [
                [
                    'Employee' => [
                        [
                            'Id' => '1',
                            'Salary' => '100',
                        ],
                        [
                            'Id' => '2',
                            'Salary' => '100',
                        ],
                        [
                            'Id' => '3',
                            'Salary' => '200',
                        ],
                        [
                            'Id' => '4',
                            'Salary' => '300',
                        ],
                    ],
                ],
                [
                    'result' => [
                        [
                            'SecondHighestSalary' => '200',
                        ],
                    ],
                ]
            ],
            [
                [
                    'Employee' => [
                        [
                            'Id' => '1',
                            'Salary' => '100',
                        ],
                    ],
                ],
                [
                    'result' => [
                        [
                            'SecondHighestSalary' => null,
                        ],
                    ],
                ]
            ],
        ];
    }
 }