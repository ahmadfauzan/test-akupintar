<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            'name' => 'Teknik Informatika',
            'faculty' => 'Fakultas Teknik',
        ]);

        DB::table('majors')->insert([
            'name' => 'Teknik Elektro',
            'faculty' => 'Fakultas Teknik',
        ]);

        DB::table('majors')->insert([
            'name' => 'Teknik Mesin',
            'faculty' => 'Fakultas Teknik',
        ]);

        DB::table('majors')->insert([
            'name' => 'Teknik Sipil',
            'faculty' => 'Fakultas Teknik',
        ]);

        DB::table('majors')->insert([
            'name' => 'Agronomi',
            'faculty' => 'Fakultas Pertanian',
        ]);

        DB::table('majors')->insert([
            'name' => 'Akuakultur',
            'faculty' => 'Fakultas Pertanian',
        ]);

        DB::table('majors')->insert([
            'name' => 'Ilmu Ekonomi',
            'faculty' => 'Fakultas Ekonomi dan Bisnis',
        ]);

        DB::table('majors')->insert([
            'name' => 'Kewirausahaan',
            'faculty' => 'Fakultas Ekonomi dan Bisnis',
        ]);

        DB::table('majors')->insert([
            'name' => 'Manajemen',
            'faculty' => 'Fakultas Ekonomi dan Bisnis',
        ]);
    }
}
