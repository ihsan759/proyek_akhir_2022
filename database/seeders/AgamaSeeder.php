<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agama')->insert([
            'nama' => 'Islam'
        ]);
        DB::table('agama')->insert([
            'nama' => 'Kristen'
        ]);
        DB::table('agama')->insert([
            'nama' => 'Katolik'
        ]);
        DB::table('agama')->insert([
            'nama' => 'Hindu'
        ]);
        DB::table('agama')->insert([
            'nama' => 'Budha'
        ]);
        DB::table('agama')->insert([
            'nama' => 'Konghucu'
        ]);
    }
}
