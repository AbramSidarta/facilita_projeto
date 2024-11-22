<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'cpf' => '1',
            'password' => bcrypt('12345678'),
            'usertype' => 'Admin',
        ]);
        User::create([
            'name' => 'clara',
            'cpf' => '2',
            'password' => bcrypt('12345678'),
            'usertype' => 'caixa',
        ]);
    }
}
