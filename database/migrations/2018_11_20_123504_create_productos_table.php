<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id'); // sku interno
            $table->string('seccion'); // necesario
            $table->string('sku'); // gral
            $table->string('sku_interno'); // gral
            $table->string('negocio'); // gral
            $table->integer('provedor_id')->unsigned();
            $table->foreign('provedor_id')->references('id')->on('proveedores');
            $table->string('descripcion'); // gral.
            $table->string('producto')->nullable(); // ortopedia
            $table->string('familia')->nullable(); // micas
            $table->string('materiales')->nullable(); // micas
            $table->string('rangos')->nullable(); // micas
            $table->string('marca')->nullable(); // no micas
            $table->string('modelo')->nullable(); // no micas
            $table->decimal('talla')->nullable(); // ortopedia
            $table->string('color')->nullable(); // gral.
            $table->string('tratamiento')->nullable(); // micas
            $table->decimal('medidas')->nullable(); // armazon
            $table->string('unidad')->nullable(); // ambiguo
            $table->string('foto1'); // gral.
            $table->string('foto2'); // gral.
            $table->string('foto3'); // gral.
            $table->timestamps(); // fechas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
