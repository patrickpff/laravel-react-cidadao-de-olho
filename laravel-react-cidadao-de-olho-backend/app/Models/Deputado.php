<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VerbaIndenizatoria;
use App\Models\TagLocalizacao;

class Deputado extends Model
{
    use HasFactory;

    protected $table = 'deputado';
    protected $fillable = ['nome', 'partido', 'id_api', 'tag_localizacao_id'];

    public function tag_localizacao(){
        return $this->belongsTo(TagLocalizacao::class);
    }

    public function verbas_indenizatorias(){
        return $this->hasMany(VerbaIndenizatoria::class);
    }
}
