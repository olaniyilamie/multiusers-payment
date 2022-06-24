<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'  => 'Admin',
            'email'  => 'admin@gmail.com',
            'password'  => Hash::make('admin12345'),
            'role'  => 'is_admin',
            'created_at'  => date('yyyy-mm-dd'),
            'updated_at'  => date('yyyy-mm-dd'),
            'email_verified_at'  => date('yyyy-mm-dd'),
        ]);
    }
}
