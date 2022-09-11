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
            'name' => 'Cliente 1',
            'email' => 'cliente1@teste.com.br',
            'password' => 'senha123',
            'phone' => '51999647405'
        ]);
        \App\Models\Customer::create([
            'name' => 'Cliente 2',
            'email' => 'cliente2@teste.com.br',
            'password' => 'senha1234',
            'phone' => '51999647406'
        ]);
        \App\Models\Customer::create([
            'name' => 'Cliente 3',
            'email' => 'cliente3@teste.com.br',
            'password' => 'senha12345',
            'phone' => '51999647407'
        ]);
        \App\Models\Customer::create([
            'name' => 'Cliente 4',
            'email' => 'cliente4@teste.com.br',
            'password' => 'senha123456',
            'phone' => '51999647408'
        ]);
       
    }
}
