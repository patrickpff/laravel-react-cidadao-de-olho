<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\TipoTag;
use App\Models\TagLocalizacao;
use App\Models\Deputado;
use App\Models\TipoDespesa;
use App\Models\VerbaIndenizatoria;

use Carbon\Carbon;

class SincronizarController extends Controller
{
    //
    function SincronizarDados (Request $request){
        $baseAddress = 'http://dadosabertos.almg.gov.br/ws/';

        $array_tag_localizacao = json_decode(Http::get($baseAddress . 'indexacao/tags/pesquisa?formato=json'));

        foreach ($array_tag_localizacao->list as $tag_localizacao_item){
            $tipo_tag = TipoTag::where('id_api', $tag_localizacao_item->tipo->id)->first();

            if(empty($tipo_tag)){
                // Salvar TipoTag se não existir
                $tipo_tag = new TipoTag();

                $tipo_tag->nome = $tag_localizacao_item->tipo->nome;
                $tipo_tag->id_api = $tag_localizacao_item->tipo->id;

                $tipo_tag->save();
            }

            $tag_localizacao = TagLocalizacao::where('id_api', $tag_localizacao_item->id)->first();
            
            if(empty($tag_localizacao)){
                // Salvar TagLocalizacao se não existir
                $tag_localizacao = new TagLocalizacao();

                $tag_localizacao->descricao = $tag_localizacao_item->descricao;
                $tag_localizacao->assinatura_boletim = $tag_localizacao_item->assinaturaBoletim;
                $tag_localizacao->assinatura_rss = $tag_localizacao_item->assinaturaRss;
                $tag_localizacao->id_api = $tag_localizacao_item->id;
                $tag_localizacao->tipo_tag_id = $tipo_tag->id;

                $tag_localizacao->save();

            }
        }

        $array_deputados = json_decode(Http::get($baseAddress . 'deputados/em_exercicio?formato=json?mostraTags=true'));

        foreach ($array_deputados->list as $deputado_item){
            $deputado = Deputado::where('id_api', $deputado_item->id)->first();

            if(empty($deputado)){
                $tag_localizacao = TagLocalizacao::where('id_api', $deputado_item->tagLocalizacao)->first();

                $deputado = new Deputado();

                $deputado->nome = $deputado_item->nome;
                $deputado->partido = $deputado_item->partido;
                $deputado->id_api = $deputado_item->id;
                $deputado->tag_localizacao_id = $tag_localizacao->id;

                $deputado->save();
            }

            $array_datas_verbas = json_decode(Http::get($baseAddress . 'prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/'. $deputado->id_api .'/datas?formato=json'));

            if($array_datas_verbas != null && !empty($array_datas_verbas)){
                foreach($array_datas_verbas->list as $data_verba_item){
                    foreach($data_verba_item->dataReferencia as $key => $value){
                        if($value != "sql-timestamp"){
                            $date = Carbon::createFromFormat('Y-m-d', $value);
                            $array_data_verba = json_decode(Http::get($baseAddress . 'prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/' . $deputado->id_api . '/' . $date->year . '/' . $date->month .'?formato=json'));
                            
                            if($array_data_verba != null && !empty($array_data_verba)){
                                foreach($array_data_verba->list as $tipo_despesa_item){
                                    $tipo_despesa = TipoDespesa::where('id_api', $tipo_despesa_item->codTipoDespesa)->first();
        
                                    if(empty($tipo_despesa)){
                                        $tipo_despesa = new TipoDespesa();
        
                                        $tipo_despesa->nome = $tipo_despesa_item->descTipoDespesa;
                                        $tipo_despesa->id_api = $tipo_despesa_item->codTipoDespesa;
        
                                        $tipo_despesa->save();
                                    }
                                    
                                    foreach($tipo_despesa_item->listaDetalheVerba as $detalhe){
                                        $verba_indenizatoria = VerbaIndenizatoria::where(['id_api' => $detalhe->id, 'deputado_id' => $deputado->id])->first();
                                        
                                        if(empty($verba_indenizatoria) && !empty($detalhe)){
                                            $verba_indenizatoria = new VerbaIndenizatoria();

                                            $verba_indenizatoria->nome_emitente = $detalhe->nomeEmitente;
                                            if (isset($detalhe->descDocumento)){
                                                $verba_indenizatoria->desc_documento = $detalhe->descDocumento;
                                            }
                                            $verba_indenizatoria->valor_despesa = $detalhe->valorDespesa;
                                            $verba_indenizatoria->cpf_cnpj = $detalhe->cpfCnpj;
                                            $verba_indenizatoria->valor_reembolsado = $detalhe->valorReembolsado;
                                            
                                            foreach($detalhe->dataReferencia as $key => $value){
                                                if($value != 'sql-timestamp'){
                                                    $verba_indenizatoria->data_referencia = date_create($value);
                                                }
                                            }
        
                                            foreach($detalhe->dataEmissao as $key => $value){
                                                if($value != 'sql-timestamp'){
                                                    $verba_indenizatoria->data_emissao = date_create($value);
                                                }
                                            }
        
                                            $verba_indenizatoria->id_api = $detalhe->id;
                                            $verba_indenizatoria->deputado_id = $deputado->id;
                                            $verba_indenizatoria->tipo_despesa_id = $tipo_despesa->id;
        
                                            $verba_indenizatoria->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        return response()->json(['success' => 'success'], 200);
    }
}
