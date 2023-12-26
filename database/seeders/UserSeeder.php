<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $matchThese = ['id'=>'1'];
		User::query()->updateOrCreate($matchThese, [
			'id' => '1',
			'role' => 'admin',
			'name' => 'Admin',
			'email' => 'admin@gmail.com',
			'email_verified_at' => \Carbon\Carbon::now(),
			'password' => Hash::make('Admin@12345678'),
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);
		$matchThese = ['id'=>'2'];
		User::query()->updateOrCreate($matchThese, [
			'id' => '2',
			'role' => 'super_admin',
			'name' => 'Super Admin',
			'email' => 'super_admin@gmail.com',
			'email_verified_at' => \Carbon\Carbon::now(),
			'password' => Hash::make('Admin@12345678'),
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now()
		]);
    }
}
