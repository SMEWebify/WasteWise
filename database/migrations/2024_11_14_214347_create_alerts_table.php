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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('alert_type'); // Type d'alerte (seuil de stockage, erreur de tri)
            $table->foreignId('waste_id')->nullable()->constrained()->onDelete('set null'); // Alerte liée à un type de déchet
            $table->text('message'); // Message de l'alerte
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alerts');
    }
};
