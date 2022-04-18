<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Models\Orcamento;

 /**
  * Variável global com os filtros de pesquisa dos orçamentos.
 */
 $filtros = NULL;

class OrcamentoController extends Controller{

   

    /**
     * Redirecionamento para a página inicial
     *
     * @return Response
     */
    public function home(){
        return view('/home');
    }

    /**
     * Redirecionamento para o formulário de cadastro.
     *
     * @return Response
     */
    public function form(){
        return view('/cadastro');
    }

    /**
     * Redirecionamento para o formulário de pesquisa.
     *
     * @return Response
     */
    public function search(){
        return view('/pesquisa');
    }

    /**
     * Redirecionamento para o formulário de edição.
     *
     * @param  var
     * @return Response
     */
    public function edit($chave){
        $orcamentos = DB::table('orcamentos')
                        ->where('chave', '=', $chave)
                        ->get();

        return view('\editar',['orcamentos'=>$orcamentos]);
    }

    /**
     * Redirecionamento para a ação de exclusão.
     *
     * @param  var
     * @return Response
     */
    public function exclude($chave){
        return view('/excluir');
    }

    /**
     * Criação de um novo orçamento no banco de dados.
     * (CREATE)
     *
     * @param  Request
     * @return Response
     */
    public function insert(Request $request){
        $validator = Validator::make($request->all(), [
            'ID' => 'required',
            'cliente' => 'required',
            'data' => 'required',
            'hora' => 'required',
            'vendedor' => 'required',
            'valorOrcado' => 'required',
            'descricao' => 'required'
        ]);
        
        if ($validator->fails()) {
            return view('\cadastro', ['success'=>'false']);
        }
      
        try{
            $dados = $request->input();
            $novo = new Orcamento;
            $novo->id = $dados['ID'];
            $novo->cliente = $dados['cliente'];
            $novo->data = $dados['data'];
            $novo->hora = $dados['hora'];
            $novo->vendedor = $dados['vendedor'];
            $novo->valor_orcado = $dados['valorOrcado'];
            $novo->descricao = $dados['descricao'];
            $novo->save();
            return view('\cadastro', ['success'=>'true']);
        }catch(Throwable $e){
            report($e);
            return view('\cadastro', ['success'=>'false']);
        }
        return view('\cadastro');
    }

    /**
     * Busca pelos orçamentos cadastrados no banco de dados.
     * (READ)
     *
     * @param Request
     * @return Response
    */
    public function index(Request $request){
        $filtros = $request->input();

        /**
         * Trecho que inverte a ordem das datas caso a data final seja menor
         * que a data inicial.
         * */
        if($filtros['data-inicial']!=NULL&&$filtros['data-final']!=NULL){
            if($filtros['data-final'] < $filtros['data-inicial']){
                $aux = $filtros['data-final'];
                $filtros['data-final'] = $filtros['data-inicial'];
                $filtros['data-inicial'] = $aux;
            }
        }

        /**
         * Testes para saber a quantidade de filtros preenchidos pelo usuário.
         */
        if ($filtros['cliente'] == NULL){
            if ($filtros['vendedor'] == NULL){
                if ($filtros['data-inicial'] == NULL){
                    if ($filtros['data-final'] == NULL){ //** 0 filtros **//
                        $orcamentos = DB::select('select * from orcamentos
                                                  order by data desc');
                            return view('\resultados',['orcamentos'=>$orcamentos]);
                    }else{ //** 1 filtro -> uma data (no campo data-final) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where data = ?
                                        order by data desc',
                                        [$filtros['data-final']]);
                    }
                }else{
                    if ($filtros['data-final'] == NULL){ //** 1 filtro -> uma data (no campo data-inicial) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where data = ?
                                        order by data desc',
                                        [$filtros['data-inicial']]);
                    }else{ //** 2 filtros -> intervalo de datas **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where data >= ? && data <= ?
                                        order by data desc',
                                        [$filtros['data-inicial'], $filtros['data-final']]);
                    }
                }
            }else{
                if ($filtros['data-inicial'] == NULL){
                    if ($filtros['data-final'] == NULL){ //** 1 filtro -> vendedor **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where vendedor = ?
                                        order by data desc',
                                        [$filtros['vendedor']]);
                    }else{ //** 2 filtros -> vendedor e uma data (no campo data-final) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where vendedor = ? && data = ?
                                        order by data desc',
                                        [$filtros['vendedor'], $filtros['data-final']]);
                    }
                }else{
                    if ($filtros['data-final'] == NULL){ //** 2 filtros -> vendedor e uma data (no campo data-inicial) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where vendedor = ? && data = ?
                                        order by data desc',
                                        [$filtros['vendedor'], $filtros['data-inicial']]);
                    }else{ //** 3 filtros -> vendedor e intervalo de datas **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where vendedor = ? && data >= ? && data <= ?
                                        order by data desc',
                                        [$filtros['vendedor'], $filtros['data-inicial'], $filtros['data-final']]);
                    }
                }
            }
        }else{
            if ($filtros['vendedor'] == NULL){
                if ($filtros['data-inicial'] == NULL){
                    if ($filtros['data-final'] == NULL){ //** 1 filtros -> cliente **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ?
                                        order by data desc',
                                        [$filtros['cliente']]);
                    }else{ //** 2 filtros -> cliente e uma data (no campo data-final) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && data = ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['data-final']]);
                    }
                }else{
                    if ($filtros['data-final'] == NULL){ //** 2 filtros -> cliente e uma data (no campo data-inicial) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && data = ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['data-inicial']]);
                    }else{ //** 3 filtros -> cliente e intervalo de datas **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && data >= ? && data <= ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['data-inicial'], $filtros['data-final']]);
                    }
                }
            }else{
                if ($filtros['data-inicial'] == NULL){
                    if ($filtros['data-final'] == NULL){ //** 2 filtros -> cliente e vendedor **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && vendedor = ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['vendedor']]);
                    }else{ //** 3 filtros -> cliente, vendedor e uma data (no campo data-final) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && vendedor = ? && data = ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['vendedor'],
                                        $filtros['data-final']]);
                    }
                }else{
                    if ($filtros['data-final'] == NULL){ //** 3 filtros -> cliente, vendedor e uma data (no campo data-inicial) **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && vendedor = ? && data = ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['vendedor'],
                                        $filtros['data-inicial']]);
                    }else{ //** 4 filtros -> cliente, vendedor e intervalo de datas **//
                        $orcamentos = DB::select('select * from orcamentos
                                        where cliente = ? && vendedor = ? && data >= ? && data <= ?
                                        order by data desc',
                                        [$filtros['cliente'], $filtros['vendedor'],
                                        $filtros['data-inicial'], $filtros['data-final']]);
                        
                    }
                }
            }
        }
        return view('\resultados',['orcamentos'=>$orcamentos]);
    }
    
    /**
     * Faz a edição dos dados cadastrados no bando de dados.
     * (UPDATE)
     * @param  Request
     * @return Response
    */
    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'chave' => 'required',
            'ID' => 'required',
            'cliente' => 'required',
            'data' => 'required',
            'hora' => 'required',
            'vendedor' => 'required',
            'valorOrcado' => 'required',
            'descricao' => 'required'
        ]);
        
        if ($validator->fails()) {
            return view('/home', ['success'=>'false']);
        }
      
        try{
            $dados = $request->input();
            DB::update('update orcamentos
                        set ID = ?,
                            cliente = ?,
                            data = ?,
                            hora = ?,
                            vendedor = ?,
                            valor_orcado = ?, 
                            descricao = ?
                        where chave = ?',
                        [$dados['ID'], $dados['cliente'], $dados['data'],
                        $dados['hora'], $dados['vendedor'], $dados['valorOrcado'],
                        $dados['descricao'], $dados['chave']]);
            return view('/home', ['success'=>'true']);
        }catch(Throwable $e){
            report($e);
        }
        return view('/home', ['success'=>'false']);
    }

    /**
     * Deleta um orçamento cadastrado no bando de dados.
     * (DELETE)
     * @param  var
     * @return Response
    */
    public function delete($chave){
        try{
            DB::delete('delete from orcamentos
                        where chave = ?',
                        [$chave]);
            return view('/home', ['successdel'=>'true']);
        }catch(Throwable $e){
            return view('/resultados', ['successdel'=>'false']);
        }
        return view('/resultados', ['successdel'=>'false']);
    }
}
