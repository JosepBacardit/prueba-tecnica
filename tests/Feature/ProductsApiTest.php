<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_products_minprice()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $response = $this->get('/api/products/200');
        $response->assertOk();
    }

    /** @test */
    public function test_get_questions_minprice_maxprice()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $response = $this->get('/api/products/200/400');
        $response->assertOk();
    }

    /** @test */
    public function test_get_questions_minprice_maxprice_category()
    {
        Sanctum::actingAs(
            User::factory()->create(),
            ['*']
        );

        $response = $this->get('/api/products/200/400/Moda');
        $response->assertOk();
    }
}
