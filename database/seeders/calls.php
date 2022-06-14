<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class calls extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calls')->insert([
            'begin' => '8:30',
            'end' => '10:05'
        ]);
        DB::table('calls')->insert([
            'begin' => '10:15',
            'end' => '11:50'
        ]);
        DB::table('calls')->insert([
            'begin' => '12:20',
            'end' => '13:55'
        ]);
        DB::table('calls')->insert([
            'begin' => '14:15',
            'end' => '15:40'
        ]);
    }
}
