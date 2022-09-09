<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Customer::create([
            'name' => 'Cliente 4',
            'email' => 'cliente4@teste.com.br',
            'password' => bcrypt( 'senha123456' ),
            'phone' => '51999647408'
        ]);
    }
}
