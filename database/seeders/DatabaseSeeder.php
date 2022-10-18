<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Campus::factory(50)->create();
        \App\Models\Address::factory(50)->create();
        $this->call([
            CategorySeeder::class,
            TypeSeeder::class,
            StatusSeeder::class,
            MajorSeeder::class,
            CampusMajorSeeder::class,
        ]);
    }
}
