<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(AuctionSeeder::class);
        $this->call(BidSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ThreadSeeder::class);
        $this->call(ThreadTagSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
