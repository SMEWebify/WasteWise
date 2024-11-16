<?php

namespace Database\Seeders;

use App\Models\WasteCollection;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WasteCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WasteCollection::factory()->count(30)->create();  // Crée 30 collections de déchets
    
    }
}
