<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'name',
            'email' => 'admin@mail.com',
            'password'=>Hash::make('password'),
            'type'=>'admin'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'root',
            'email' => 'root@mail.com',
            'password'=>Hash::make('password'),
            'type'=>'admin'
            
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Dr. Atem',
            'email' => 'atem@mail.com',
            'password'=>Hash::make('password'),
            'type'=>'staff'
            
        ]);
        \App\Models\Visitor::create([
            'name'=>'Ako Samuel',
            'username' => 'samuel',
            'phone_number'=>'67789999',
            'password'=>Hash::make('password'),
            
            
        ]);
        \App\Models\Visitor::create([
            'name' => 'Agbor Paul',
            'username'=>'paul',
            'phone_number'=>'69876500',
            'password'=>Hash::make('password'),
        
            
        ]);
    }
}
