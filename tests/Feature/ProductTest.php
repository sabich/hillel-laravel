<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_products()
    {
        $product = Product::factory()->create()->first();
        $response = $this->getJson('/api/products');
        $this->assertNotEmpty($product);
        $this->assertDatabaseHas('products', [
            'id'            => $product->id,
            'partner_id'    => $product->partner_id,
            'name'          => $product->name,
            'model'         => $product->model,
            'year'          => $product->year,
        ]);
        $response->assertStatus(200);
    }
}
