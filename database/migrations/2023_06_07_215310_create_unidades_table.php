<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->text('descricao');
            $table->timestamps();
        });

        //Adicionando relacinamento com a tabela produtos
        Schema::table('produtos', function(Blueprint $table) {
            $table->bigInteger('unidade_id');

            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //Adicionando relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            $table->bigInteger('unidade_id');

            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Removendo relacionamento com a tabela produto_detalhes
        Schema::table('produto_detalhes', function(Blueprint $table) {
            //Removendo a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign');
            //Removendo a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        //Removendo relacionamento com a tablea produtos
        Schema::table('produtos', function(Blueprint $table) {
            //Removendo a FK
            $table->dropForeign('produtos_unidade_id_foreign');
            //Removendo a coluna unidade_id
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
};
