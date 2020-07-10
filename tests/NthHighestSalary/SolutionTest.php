<?php

namespace ppAlgorithm\NthHighestSalary;

use ppAlgorithm\DatabaseTestCase;

class SolutionTest extends DatabaseTestCase
{
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
                            'NthHighestSalary' => '100',
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
                        [
                            'Id' => '5',
                            'Salary' => '300',
                        ],
                    ],
                ],
                [
                    'result' => [
                        [
                            'NthHighestSalary' => '100',
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
                            'Salary' => '200',
                        ],
                    ],
                ],
                [
                    'result' => [
                        [
                            'NthHighestSalary' => null,
                        ],
                    ],
                ]
            ],
        ];
    }
}