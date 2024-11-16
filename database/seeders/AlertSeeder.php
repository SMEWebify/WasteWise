<?php

namespace Database\Seeders;

use App\Models\Alert;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alert::factory()->count(20)->create();  // Crée 20 alertes
    }
}
