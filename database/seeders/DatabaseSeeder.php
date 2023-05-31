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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $spe = \App\Models\Specificity::factory(10)->create();
        \App\Models\Category::factory(10)->create()->each(function ($category) use ($spe) {
            \App\Models\Room::factory(rand(2,5))->create([
                'category_id' => $category->id
            ])->each(function ($room) use ($spe){
                $room->specificities()->attach($spe->random(3));
            });
        
        });
    }
}
