<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanaquisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */                  //creacion de las tablas
    public function up()
    {
        Schema::create('planaquis', function (Blueprint $table) {
            $table->id();            
            $table->string('descripcioncont');
            $table->string('valorestimadocont');            
            $table->string('valorestimadovig');
            $table->string('duracont'); 
            $table->string('codbpim'); 
            $table->string('requiproyecto');
            $table->string('requipoai');  
            $table->unsignedBigInteger('area_id')->nullable(); 
            $table->unsignedBigInteger('mes_id')->nullable();
            $table->unsignedBigInteger('modalidad_id')->nullable();
            $table->unsignedBigInteger('fuente_id')->nullable();
            $table->unsignedBigInteger('requivigfut_id')->nullable();
            $table->unsignedBigInteger('estsolivigen_id')->nullable();
            $table->unsignedBigInteger('tipozona_id')->nullable();
            $table->unsignedBigInteger('tipoprioridad_id')->nullable();
            $table->unsignedBigInteger('tipoaquicont_id')->nullable();
            $table->unsignedBigInteger('tipoprocesocont_id')->nullable();            
            $table->string('slug');
            $table->timestamps();
            //creacion de las relaciones con los ids de las tablas

            $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
            $table->foreign('mes_id')->references('id')->on('mes')->onDelete('set null');
            $table->foreign('modalidad_id')->references('id')->on('modalidads')->onDelete('set null'); //->onDelete('set null')
            $table->foreign('fuente_id')->references('id')->on('fuentes')->onDelete('set null');
            $table->foreign('requivigfut_id')->references('id')->on('requivigfuts')->onDelete('set null');
            $table->foreign('estsolivigen_id')->references('id')->on('estsolivigens')->onDelete('set null');
            $table->foreign('tipozona_id')->references('id')->on('tipozonas')->onDelete('set null');
            $table->foreign('tipoprioridad_id')->references('id')->on('tipoprioridads')->onDelete('set null');
            $table->foreign('tipoaquicont_id')->references('id')->on('tipoaquiconts')->onDelete('set null');
            $table->foreign('tipoprocesocont_id')->references('id')->on('tipoprocesoconts')->onDelete('set null');
           
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planaquis');
    }
}
