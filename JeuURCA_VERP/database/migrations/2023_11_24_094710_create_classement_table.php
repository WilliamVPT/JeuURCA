<?php

// database/migrations/xxxx_xx_xx_create_classement_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassementTable extends Migration
{
    public function up()
    {
        Schema::create('classement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('epreuve_id')->constrained('epreuve'); // 'equipes' est le nom de la table des équipes, ajustez-le si nécessaire
            $table->integer('medaille');
            $table->string('equipe');
            $table->integer('points');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('classement');
    }
}
