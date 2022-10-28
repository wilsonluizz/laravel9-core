<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UnidadeFederativa;
use Illuminate\Database\Seeder;
use Database\Seeders\DeployCore;
use Database\Seeders\InventarioSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DeployCore::run();
        $this->call(UnidadeFederativaSeeder::class);
        InventarioSeeder::run();
        

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
