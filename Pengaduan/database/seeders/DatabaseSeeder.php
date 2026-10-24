<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    // User::factory(10)->create();
    $this->call([
        KategoriSeeder::class,
    ]);
        $this->call([
        RoleSeeder::class,
    ]);
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'no_tp' => '087777777777',
            'role_id' => 2,
            'password' => Hash::make('admin123')
        ]);
        
        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'no_tp' => '0876161720',
            'role_id' => 1,
            'password' => Hash::make('customer123')
        ]);
        
    
    }
    
    
}
