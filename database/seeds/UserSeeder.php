<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => '1',
        ]);

        DB::table('users')->insert([
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'role' => '0',
        ]);
    }
}
