<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //    // Seed some sample screens
        DB::table('screens')->insert([
            'name' => 'Screen 1',
        ]);

        DB::table('screens')->insert([
            'name' => 'Screen 2',
        ]);
    }
}
