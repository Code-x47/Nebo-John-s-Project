<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order_Item>
 */
class OrderItemFactory extends Factory
{
    protected $model = Order_Item::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'order_id' => \App\Models\Order::factory(),  // Associates with an existing order
            'product_id' => Product::factory(),  // Assumes you have a Product model and factory
            'quantity' => $this->faker->numberBetween(1, 10),
            'price' => $this->faker->randomFloat(2, 10, 100), // Random price
        ];
    
    }
}
