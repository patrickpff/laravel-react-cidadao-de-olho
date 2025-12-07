<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkVerbasIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('verba_indenizatoria', function (Blueprint $table) {
            $table->bigInteger('deputado_id')->unsigned();
            $table->foreign('deputado_id')->references('id')->on('deputado')->onDelete('cascade');

            $table->bigInteger('tipo_despesa_id')->unsigned();
            $table->foreign('tipo_despesa_id')->references('id')->on('tipo_despesa')->onDelete('cascade');
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
        Schema::table('verba_indenizatoria', function(Blueprint $table){
            $table->dropForeign(['deputado_id']);
            $table->dropColumn('deputado_id');

            $table->dropForeign(['tipo_despesa_id']);
            $table->dropColumn('tipo_despesa_id');
        });
    }
}
