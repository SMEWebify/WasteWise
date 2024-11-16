<?php

namespace Database\Seeders;

use App\Models\Waste;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Waste::factory()->count(50)->create();  // Crée 50 déchets aléatoires
    }
}
