<?php

namespace Tests\Feature;

use App\Models\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_add_product()
    {
        $faker = \Faker\Factory::create();

        $category = 'Moda';
        $name = 'Test';
        $price = 55;

        $this->assertCount(0, Product::all());

        $this->post('/store',[
            'category' => $category,
            'name' => $name,
            'price' => $price
        ]);

        $this->assertCount(1, Product::all());

        $product = Product::first();
        $this->assertEquals($category, $product->category);
        $this->assertEquals($name, $product->name);
        $this->assertEquals($price, $product->price);
    }
}
