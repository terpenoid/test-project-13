<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $products = [];
        for ($i = 0; $i < 20; $i++) {
            $products[] = Product::create(['name' => $faker->company, 'price' => $faker->randomFloat(2, 10, 100)]);
        }

        Category::all()->each(function ($category) use ($products, $faker) {
            $productsInCategoryIds = [];
            $productsInCategory = [];
            for ($i = 0; $i < rand(0, 3); $i++) {
                if (!in_array($randProductId = rand(0, 19), $productsInCategoryIds)) {
                    $productsInCategoryIds[] = $randProductId;
                    $productsInCategory[] = $products[$randProductId];
                }
            }
            $category->products()->saveMany($productsInCategory);
        });

        // @todo: clean or don't create products without categories
    }
}
