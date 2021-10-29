<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoitureAgrementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agrement_voiture', function (Blueprint $table) {
            $table->foreignId('voiture_id')->constrained('voiture');
            $table->foreignId('agrement_id')->constrained('agrement');
            $table->string('valeur')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voiture_agrement');
    }
}
