<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccountEntry>
 */
class AccountEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product' => $this->faker->word, // Random product name
            'amount' => $this->faker->numberBetween(100, 10000), // Random amount
            'payment_method' => $this->faker->randomElement(['Cash', 'Card', 'Transfer']), // Random payment method
            'delivery_charge' => $this->faker->numberBetween(50, 500), // Random delivery charge
            'merchant_balance' => $this->faker->numberBetween(1000, 50000), // Random merchant balance
            'merchant_name' => $this->faker->name, // Random merchant name
            'merchant_phone' => $this->faker->phoneNumber, // Random phone number
            'rider' => $this->faker->name, // Random rider name
            'date' => $this->faker->date(), // Random date
        ];
    }
}
