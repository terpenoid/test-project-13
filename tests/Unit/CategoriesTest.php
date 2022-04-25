<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CategoriesTest extends TestCase
{

    public function test_request_categories_tree()
    {
        $response = $this->getJson('/api/categories');

        // seeded tree
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

        $response
            ->assertStatus(200)
            ->assertJson($categories);
    }

    public function test_request_creating_new_category()
    {
        $response = $this->postJson('/api/category', ['title' => 'test title', 'parent_id' => 1]);

        $response
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('title', 'test title')
                ->where('parent_id', 1)
                ->etc()
            );

        // @todo maybe add the tree-structure testing also
    }

    public function test_request_update_existing_category()
    {
        $response = $this->putJson('/api/category/1', ['title' => 'new title']);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('title', 'new title')
                ->etc()
            );
    }

    public function test_request_delete_existing_category()
    {
        $response = $this->deleteJson('/api/category/1');
        $response->assertStatus(204);
    }

}
