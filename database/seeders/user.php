<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::create([
        'name' => 'Admin',
       'email' => 'admin@email.com',
       'password' => bcrypt('123456')
      ]);
    }
}
