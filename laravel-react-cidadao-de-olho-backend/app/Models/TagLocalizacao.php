<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoTag;
use App\Models\Deputado;

class TagLocalizacao extends Model
{
    use HasFactory;

    protected $table = 'tag_localizacao';
    protected $fillable = ['descricao', 'assinatura_boletim', 'assinatura_rss', 'id_api', 'tipo_tag_id'];

    public function tipo_tag(){
        return $this->belongsTo(TipoTag::class);
    }

    public function deputados(){
        return $this->hasMany(Deputado::class);
    }
}
