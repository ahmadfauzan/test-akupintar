<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Negeri',
        ]);

        DB::table('categories')->insert([
            'name' => 'Swasta',
        ]);

        DB::table('categories')->insert([
            'name' => 'Kedinasan',
        ]);

        DB::table('categories')->insert([
            'name' => 'PTN',
        ]);

        DB::table('categories')->insert([
            'name' => 'PTS',
        ]);

        DB::table('categories')->insert([
            'name' => 'PTN-BLU',
        ]);

        DB::table('categories')->insert([
            'name' => 'PTN-BLH',
        ]);

        DB::table('categories')->insert([
            'name' => 'Politeknik',
        ]);
    }
}
