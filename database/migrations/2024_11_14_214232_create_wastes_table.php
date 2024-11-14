<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wastes', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // solide, liquide, dangereux, etc.
            $table->string('category')->nullable(); // Catégories personnalisées
            $table->string('origin'); // Origine des déchets (machine, processus)
            $table->decimal('volume', 10, 2); // Volume des déchets produits
            $table->string('unit')->default('kg'); // Unité de mesure (kg, litre, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wastes');
    }
};
