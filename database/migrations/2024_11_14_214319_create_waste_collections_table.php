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
        Schema::create('waste_collections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_id')->constrained()->onDelete('cascade'); // Lien avec les déchets
            $table->foreignId('provider_id')->nullable()->constrained()->onDelete('set null'); // Lien avec le fournisseur
            $table->date('scheduled_date'); // Date de la collecte planifiée
            $table->decimal('collected_volume', 10, 2); // Volume collecté
            $table->decimal('cost', 10, 2); // Coût total de la collecte
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waste_collections');
    }
};
