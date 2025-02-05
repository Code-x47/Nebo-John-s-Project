<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Testing\TestResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class ProductApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_product()
    {
        // Create a test user and authenticate using Sanctum
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        // Define the product data to send in the request
        $productData = [
            'name' => 'Test Product',
            'price' => 29.99,
            'stock' => 10,
        ];

        // Make the POST request to create the product
        $response = $this->postJson('/api/create', $productData);

        // Assert the response status and the product data
        $response->assertStatus(201);
        $response->assertJsonFragment(['name' => 'Test Product']);
        $response->assertJsonFragment(['price' => 29.99]);
        $response->assertJsonFragment(['stock' => 10]);
    }
  
}
