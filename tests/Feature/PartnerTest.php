<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\Partner;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PartnerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_partners()
    {
        Partner::factory()->createOne();
        $response = $this->get('/api/partners');

        $response->assertStatus(200);
    }

    public function test_sum_orders()
    {
        $product = Product::factory()->has(Partner::factory())->createOne();
        $orders = Order::factory()->state(['product_id' => $product->id])->count(3)->make();
        $sum = $orders->where('product_id', $product->id)->sum('sum');
        $response = $this->getJson('/api/partners/sum-orders');
        $response->assertJsonFragment(['orders_sum_sum' => $sum]);
    }

    public function test_duplicated()
    {
        Partner::factory()->state([
            'name' => 'Test',
            'country' => 'Ukraine',
            'city' => 'Dnipro',
            'address' => 'Street',
        ])->count(3)->make()->toArray();
        $response = $this->getJson('/api/partners/duplicated');
        $response->assertJsonFragment([
            'name' => 'Test',
            'country' => 'Ukraine'
        ]);
    }
}
