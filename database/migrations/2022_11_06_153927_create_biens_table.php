<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('tiers_id'); 
            $table->foreign('tiers_id')->references('id')->on('tiers')->onDelete('cascade'); 

            $table->text('image')->nullable(); 
            $table->string('adresse'); 
            $table->string('localisation')->nullable(); 
            $table->string('quartier')->nullable(); 
            $table->string('commune')->nullable(); 
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
        Schema::dropIfExists('biens');
    }
}
