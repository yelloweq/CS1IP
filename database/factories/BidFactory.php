<?php

namespace Database\Factories;

use App\Models\Auction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bid_amount = fake()->randomNumber(5, false);
        
        return [
            'auction_id' => Auction::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'amount' => $bid_amount,
            'current_amount' => $bid_amount,
        ];
    }
}
