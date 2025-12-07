<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkDeputadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('deputado', function (Blueprint $table) {
            $table->bigInteger('tag_localizacao_id')->unsigned();
            $table->foreign('tag_localizacao_id')->references('id')->on('tag_localizacao')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('deputado', function (Blueprint $table) {
            $table->dropForeign(['tag_localizacao_id']);
            $table->dropColumn('tag_localizacao_id');
        });
    }
}
