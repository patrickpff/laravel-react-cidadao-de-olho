<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagLocalizacao;

class TipoTag extends Model
{
    use HasFactory;

    protected $table = 'tipo_tag';
    protected $fillable = ['nome', 'id_api'];

    public function tag_localizacao(){
        return $this->hasMany(TagLocalizacao::class);
    }
}
