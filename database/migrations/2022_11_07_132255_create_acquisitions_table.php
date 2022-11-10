<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcquisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acquisitions', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('tiers_id'); 
            $table->foreign('tiers_id')->references('id')->on('tiers')->onDelete('cascade'); 

            $table->unsignedInteger('espace_id'); 
            $table->foreign('espace_id')->references('id')->on('espaces')->onDelete('cascade'); 

            $table->date('date'); 
            $table->integer('type'); 
            
            $table->integer('etat'); 

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
        Schema::dropIfExists('acquisitions');
    }
}
