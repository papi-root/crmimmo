<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('espaces', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('bien_id'); 
            $table->foreign('bien_id')->references('id')->on('biens')->onDelete('cascade'); 

            $table->integer('numero'); 
            $table->integer('type'); 
            $table->integer('prix'); 
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
        Schema::dropIfExists('espaces');
    }
}
