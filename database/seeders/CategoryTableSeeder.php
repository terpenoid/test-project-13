<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $categories = [
            [
                'title' => 'Books',
                'children' => [
                    [
                        'title' => 'Comic Book',
                        'children' => [
                            ['title' => 'Marvel Comic Book'],
                            ['title' => 'DC Comic Book'],
                            ['title' => 'Action comics'],
                        ],
                    ],
                    [
                        'title' => 'Textbooks',
                        'children' => [
                            ['title' => 'Business'],
                            ['title' => 'Finance'],
                            ['title' => 'Computer Science'],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Electronics',
                'children' => [
                    [
                        'title' => 'TV',
                        'children' => [
                            ['title' => 'LED'],
                            ['title' => 'Blu-ray'],
                        ],
                    ],
                    [
                        'title' => 'Mobile',
                        'children' => [
                            ['title' => 'Samsung'],
                            ['title' => 'iPhone'],
                            ['title' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
