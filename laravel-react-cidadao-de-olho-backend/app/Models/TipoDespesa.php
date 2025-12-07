<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VerbaIndenizatoria;

class TipoDespesa extends Model
{
    use HasFactory;

    protected $table = 'tipo_despesa';
    protected $fillable = ['nome', 'id_api'];

    public function verbas_indenizatorias(){
        return $this->hasMany(VerbaIndenizatoria::class);
    }
}
