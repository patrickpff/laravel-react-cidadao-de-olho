<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deputado;
use App\Models\TipoDespesa;

class VerbaIndenizatoria extends Model
{
    use HasFactory;

    protected $table = 'verba_indenizatoria';
    protected $fillable = ['nome_emitente', 'desc_documento', 'valor_despesa', 'cpf_cnpj', 'valor_reembolsado', 'data_referencia', 'data_emissao', 'id_api', 'deputado_id', 'tipo_despesa_id'];

    public function deputado(){
        return $this->belongsTo(Deputado::class);
    }

    public function tipo_despesa(){
        return $this->belongsTo(TipoDespesa::class);
    }
}
