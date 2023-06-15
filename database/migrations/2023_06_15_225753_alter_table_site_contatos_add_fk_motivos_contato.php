<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Adiciona a coluna motivos_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->bigInteger('motivos_contato_id')->nullable();
        });

        //Atribui motivos_contato para a nova coluna motivos_contato_id
        DB::statement('update site_contatos set motivos_contato_id = motivo_contato');

        //Criação da FK e remoção da coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivos_contato_id')->references('id')->on('motivos_contato');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Cria a coluna motivo contato e remove a coluna fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivos_contato_id_foreign');
        });

        //Atribui motivos_contato_id para a coluna motivos_contato
        DB::statement('update site_contatos set motivo_contato = motivos_contato_id');

        //Remove a coluna motivos_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivos_contato_id');
        });
    }
};
