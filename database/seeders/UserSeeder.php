<?php

namespace Database\Seeders;

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
        //

        DB::table('users')->insert([
            'name'  => 'Free User',
            'email'  => 'freeuser@gmail.com',
            'password'  => Hash::make('user12345'),
            'role'  => 'free_user',
            'created_at'  => date('yyyy-mm-dd'),
            'updated_at'  => date('yyyy-mm-dd'),
            'email_verified_at'  => date('yyyy-mm-dd'),
        ]);
    
        DB::table('users')->insert([
            'name'  => 'Paid User',
            'email'  => 'paiduser@gmail.com',
            'password'  => Hash::make('user12345'),
            'role'  => 'paid_user',
            'created_at'  => date('yyyy-mm-dd'),
            'updated_at'  => date('yyyy-mm-dd'),
            'email_verified_at'  => date('yyyy-mm-dd'),
        ]);
    }
}
