<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class days extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            'day' => 'Понедельник'
        ]);
        DB::table('days')->insert([
            'day' => 'Вторник'
        ]);
        DB::table('days')->insert([
            'day' => 'Среда'
        ]);
        DB::table('days')->insert([
            'day' => 'Четверг'
        ]);
        DB::table('days')->insert([
            'day' => 'Пятница'
        ]);
        DB::table('days')->insert([
            'day' => 'Суббота'
        ]);
    }
}
