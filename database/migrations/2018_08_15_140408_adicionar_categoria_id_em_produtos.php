<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarCategoriaIdEmProdutos extends Migration
{

    //Vamos adicionar uma chave estrangeira na tabela produtos 
    //pegando uma categoria de ID
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {

            /* Perceba que mantem uma ordem. No up, primeiro criamos
            a tabela e depois a chave estrangeira */
            
            //Tabela criada para receber a chave
            $table->integer('categoria_id')->unsigned();
            //Chave estrangeira
            $table->foreign('categoria_id')->references('id')->on('categorias');

        });
    }

    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {

            /* Já no down é o inverso, para o rollback devemos primeiro eliminar
            a chave estrangeira e depois retirar o campo da tabela */
            $table->dropForeign('categoria_id');
            $table->dropColumn('categoria_id');

        });
    }
}
