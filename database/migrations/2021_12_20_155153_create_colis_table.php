<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('ville')->nullable();
            $table->unsignedBigInteger('aeroport_d');
            $table->unsignedBigInteger('aeroport_a');
            $table->string('date_heur_d')->nullable();
            $table->string('date_heur_a')->nullable();
            $table->string('nb_kg')->nullable();
            $table->string('prix_kg')->nullable();
            $table->string('resistance')->nullable();
            $table->string('autre_information')->nullable();
            $table->integer('etat')->default(0);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('aeroport_d')
                ->references('id')
                ->on('aeroports');

            $table->foreign('aeroport_a')
                ->references('id')
                ->on('aeroports');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colis');
    }
}
