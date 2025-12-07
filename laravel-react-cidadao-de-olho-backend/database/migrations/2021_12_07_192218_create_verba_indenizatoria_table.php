<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerbaIndenizatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verba_indenizatoria', function (Blueprint $table) {
            $table->id();

            $table->string('nome_emitente', 255);
            $table->text('desc_documento')->nullable();
            $table->double('valor_despesa', 10, 2);
            $table->string('cpf_cnpj', 255);
            $table->double('valor_reembolsado', 10, 2);
            $table->date('data_referencia');
            $table->date('data_emissao');
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
        Schema::dropIfExists('verba_indenizatoria');
    }
}
