<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Seed some data
        Product::create([
            'name' => 'Test Product',
            'price' => 10000,
            'stock' => 10,
        ]);
    }

    public function test_cannot_access_products_without_api_key(): void
    {
        $response = $this->getJson('/api/v1/products');
        $response->assertStatus(401);
    }

    public function test_cannot_access_products_with_invalid_api_key(): void
    {
        $response = $this->getJson('/api/v1/products', [
            'X-API-KEY' => 'wrong-key'
        ]);
        $response->assertStatus(401);
    }

    public function test_can_access_products_with_valid_api_key(): void
    {
        $response = $this->getJson('/api/v1/products', [
            'X-API-KEY' => 'my-secret-api-key'
        ]);
        $response->assertStatus(200);
        $response->assertJsonCount(1);
    }
}
