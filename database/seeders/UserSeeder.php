<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'nama' => 'Fulan',
            'no_hp' => '0821475920381',
            'role' => 1,
            'email' => 'fulan@gmail.com',
            'password' => 'admin'
        ]);
        User::query()->create([
            'nama' => 'Fulanah',
            'no_hp' => '0821475930385',
            'role' => 2,
            'email' => 'fulanah@gmail.com',
            'password' => 'admin',
            'rt' => '1',
            'rw' => '1'
        ]);
    }
}
