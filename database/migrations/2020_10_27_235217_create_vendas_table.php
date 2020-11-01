<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->integer('id_colaborador');
            $table->tinyInteger('st_finalizada');
            $table->timestamps();

            $table->foreign('id_cliente')
                ->references('id')
                ->on('clientes');
            $table->foreign('id_colaborador')
                ->references('id')
                ->on('colaboradors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
