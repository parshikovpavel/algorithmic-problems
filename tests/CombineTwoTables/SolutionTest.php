<?php

namespace ppAlgorithm\CombineTwoTables;

use ppAlgorithm\DatabaseTestCase;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;

class SolutionTest extends DatabaseTestCase
{
    protected function tables(): array
    {
        return [
            'Person' => 'PersonId int, FirstName varchar(255), LastName varchar(255)',
            'Address' => 'AddressId int, PersonId int, City varchar(255), State varchar(255)',
        ];
    }

    public function data(): array
    {
        return [
            [
                [
                    'Person' => [
                        [
                            'PersonId' => '1',
                            'LastName' => 'Wang',
                            'FirstName' => 'Allen',
                        ],
                    ],
                    'Address' => [
                        [
                            'AddressId' => 1,
                            'PersonId' => 2,
                            'City' => 'New York City',
                            'State' => 'New York',
                        ]
                    ]
                ],
                [
                    'result' => [
                        [
                            'LastName' => 'Wang',
                            'FirstName' => 'Allen',
                            'City' => null,
                            'State' => null,
                        ],
                    ],
                ]
            ],
            [
                [
                    'Person' => [
                        [
                            'PersonId' => '1',
                            'LastName' => 'Ivanov',
                            'FirstName' => 'Ivan',
                        ],
                        [
                            'PersonId' => '2',
                            'LastName' => 'Petrov',
                            'FirstName' => 'Petr',
                        ],
                    ],
                    'Address' => [
                        [
                            'AddressId' => 1,
                            'PersonId' => 2,
                            'City' => 'Moscow',
                            'State' => 'Moscow',
                        ],
                        [
                            'AddressId' => 10,
                            'PersonId' => 3,
                            'City' => 'Domodedovo',
                            'State' => 'Moscow region',
                        ]
                    ]
                ],
                [
                    'result' => [
                        [
                            'LastName' => 'Ivanov',
                            'FirstName' => 'Ivan',
                            'City' => null,
                            'State' => null,
                        ],
                        [
                            'LastName' => 'Petrov',
                            'FirstName' => 'Petr',
                            'City' => 'Moscow',
                            'State' => 'Moscow',
                        ],
                    ],
                ]
            ],
        ];
    }
}