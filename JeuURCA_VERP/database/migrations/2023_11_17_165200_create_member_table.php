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
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipe_id')->constrained('equipes'); // 'equipes' est le nom de la table des équipes, ajustez-le si nécessaire
            $table->string('name');
            $table->string('prenom');
            $table->string('composante');
            $table->string('genre');
            $table->boolean('handicap')->default(false);
            // Ajoutez d'autres colonnes selon vos besoins

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
