<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 4; $i <= 7; $i++) {
            DB::table('statuses')->insert([
                'category_id' => $i,
            ]);
        }
    }
}
