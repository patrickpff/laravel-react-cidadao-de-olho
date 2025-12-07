<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Partido;
use App\Models\Deputado;


class PartidoController extends Controller
{
    //
    public function mais_gastaram(Request $request){
        $partidos = DB::table('deputado')
                        ->leftJoin('verba_indenizatoria', 'verba_indenizatoria.deputado_id', '=', 'deputado.id')
                        ->select('partido')
                        ->selectRaw('SUM(valor_reembolsado) as valor_reembolsado_partido')
                        ->groupBy('partido')
                        ->orderBy('valor_reembolsado_partido', 'DESC')
                        ->take(5)
                        ->get();

        return response()->json($partidos, 200);
    }

    public function completo(Request $request){
        $partidos = DB::table('deputado')
                        ->leftJoin('verba_indenizatoria', 'verba_indenizatoria.deputado_id', '=', 'deputado.id')
                        ->select('partido')
                        ->selectRaw('SUM(valor_reembolsado) as valor_reembolsado_partido')
                        ->groupBy('partido')
                        ->orderBy('valor_reembolsado_partido', 'DESC')
                        ->get();

        return response()->json($partidos, 200);
    }
}
