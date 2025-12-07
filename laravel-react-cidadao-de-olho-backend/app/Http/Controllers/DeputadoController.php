<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Deputado;

class DeputadoController extends Controller
{
    //
    public function mais_gastaram(Request $request){
        $deputados = Deputado::withSum(
            'verbas_indenizatorias', 
            'valor_reembolsado')->orderBy(
                'verbas_indenizatorias_sum_valor_reembolsado', 
                'DESC'
                )->take(5)->get();

        return response()->json($deputados, 200);
    }
    
    public function completo(Request $request){
        $deputados = Deputado::withSum(
            'verbas_indenizatorias', 
            'valor_reembolsado')->orderBy(
                'verbas_indenizatorias_sum_valor_reembolsado', 
                'DESC'
                )->get();

        return response()->json($deputados, 200);
    }
}
