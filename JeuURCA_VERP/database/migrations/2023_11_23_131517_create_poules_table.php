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
        Schema::create('poules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('epreuve_id')->constrained('epreuve'); // 'equipes' est le nom de la table des équipes, ajustez-le si nécessaire
            $table->string('name');
            $table->string('equipe1');
            $table->string('equipe2');
            $table->string('equipe3');
            $table->string('equipe4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poules');
    }
};
