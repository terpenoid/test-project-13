<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class ProductsTest extends TestCase
{

    public function test_request_products_list()
    {
        $response = $this->getJson('/api/categories');
        $response->assertStatus(200);
    }

    public function test_request_creating_new_product()
    {
        $response = $this->postJson('/api/product', ['name' => 'test name', 'price' => 10]);

        $response
            ->assertStatus(201)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('name', 'test name')
                ->where('price', 10)
                ->etc()
            );

        // @todo maybe add the tree-structure testing also
    }

    public function test_request_update_existing_product()
    {
        $response = $this->putJson('/api/product/1', ['name' => 'new name', 'price' => 100]);

        $response
            ->assertStatus(200)
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('name', 'new name')
                ->where('price', 100)
                ->etc()
            );
    }

    public function test_request_delete_existing_product()
    {
        $response = $this->deleteJson('/api/product/1');
        $response->assertStatus(204);
    }

}
