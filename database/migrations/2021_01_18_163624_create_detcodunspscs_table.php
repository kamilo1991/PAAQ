<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetcodunspscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detcodunspscs', function (Blueprint $table) {
            $table->id();              
            $table->string('slug');
            $table->timestamps();
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->unsignedBigInteger('planaquis_id')->nullable();            
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('set null'); 
            $table->foreign('planaquis_id')->references('id')->on('planaquis')->onDelete('set null');         
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detcodunspscs');
    }
}
