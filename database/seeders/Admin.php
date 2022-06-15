<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'Кирилл',
            'middle_name' => 'Панькин',
            'last_name' => 'Юрьевич',
            'phone' => '89964692012',
            'login' => 'admin',
            'password' => Hash::make('admin'),
            'email' => 'Kir4ick@mail.ru'
        ]);
        DB::table('roles_users')->insert([
            'user_id' => 1,
            'role_id' => 5
        ]);
        DB::table('admin')->insert([
            'user_id' => $user->id
        ]);
    }
}
