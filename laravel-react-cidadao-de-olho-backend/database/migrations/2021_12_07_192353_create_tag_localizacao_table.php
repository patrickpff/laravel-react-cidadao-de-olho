<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagLocalizacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_localizacao', function (Blueprint $table) {
            $table->id();

            $table->text('descricao');
            $table->text('assinatura_boletim');
            $table->text('assinatura_rss');
            $table->integer('id_api');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_localizacao');
    }
}
