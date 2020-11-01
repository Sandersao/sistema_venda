<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saidas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produto');
            $table->integer('id_venda');
            $table->integer('qtde');
            $table->float('preco_momento');
            $table->float('margem_lucro_momento');
            $table->float('desconto');
            $table->timestamps();

            $table->foreign('id_produto')
                ->references('id')
                ->on('produtos');
            $table->foreign('id_venda')
                ->references('id')
                ->on('vendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saidas');
    }
}
