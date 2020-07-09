<?php

namespace ppAlgorithm\SecondHighestSalary;

use ppAlgorithm\DatabaseTestCase;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;

class SolutionTest1 extends DatabaseTestCase
{



    protected function setUp(): void
    {

        $sql = '
            CREATE TABLE IF NOT EXISTS Person (PersonId int, FirstName varchar(255), LastName varchar(255));
            CREATE TABLE IF NOT EXISTS Address (AddressId int, PersonId int, City varchar(255), State varchar(255));
            TRUNCATE TABLE Person;
            TRUNCATE TABLE Address;
        ';
        $this->getConnection()->getConnection()->exec($sql);
    }

    function data()
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

    /**
     * @dataProvider data
     * @param array $fixture
     * @param array $expected
     */
    public function testCombine(array $fixture, array $expected): void
    {

        $this->getDatabaseTester()->setSetUpOperation($this->getSetUpOperation());
        $this->getDatabaseTester()->setDataSet(
            new ArrayDataSet($fixture)
        );
        $this->getDatabaseTester()->onSetUp();
        $actual = (new Solution())->combine($this->getConnection());
        $expected = (new ArrayDataSet($expected))->getTable('result');

        $this->assertTablesEqual($expected, $actual);
    }
}