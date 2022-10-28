<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;
use App\Models\Localidade;
use App\Models\CentroDeCusto;
use App\Models\Responsavel;
use App\Models\NotaFiscal;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\HistoricoEquipamento;
use App\Models\Movimentacao;
use App\Models\Tipo;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $equipamentos = Equipamento::orderBy('id', 'desc')->get();
        return view('equipamentos.index', compact('equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        
    {   
        $tipos = Tipo::orderBy('id', 'desc')->get();
        $categorias = Categoria::orderBy('id', 'desc')->get();
        $historicos = Movimentacao::orderBy('id', 'desc')->get();
        $marcas = Marca::orderBy('id', 'desc')->get();
        $localidades = Localidade::orderBy('id', 'desc')->get();
        $centro_de_custo = CentroDeCusto::orderBy('id', 'desc')->get();
        $responsavel = Responsavel::orderBy('id', 'desc')->get();
        $notafiscal = NotaFiscal::orderBy('id', 'desc')->get();
        return view('equipamentos.create', compact('marcas', 'localidades', 'centro_de_custo', 'responsavel', 'notafiscal', 'categorias', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
            // dd($request);

            // $request->validate([
            //     'nome' => 'required',
            //     'categoria_id' => 'required',
            //     'tipo_id' => 'required',
            //     'marca_id' => 'required',
            //     'descricao' => 'required',
            //     'modelo' => 'required',
            //     'numero_serie' => 'required',
            //     'centro_de_custo_id' => 'required',
            //     'localidade_id' => 'required',
            //     'responsavel_id' => 'required',
            //     'nota_fiscal_id' => 'required',
                
            // ]);

            $equipamento = Equipamento::create([
            'nome' => ucwords($request->nome),
            'categoria_id' => $request->select_categoria,
            'tipo_id' => $request->select_tipo,
            'marca_id' => $request->select_marca,
            'descricao' => ucfirst($request->descricao),
            'modelo' => $request->modelo,
            'numero_serie' => $request->numero_serie,
            'centro_de_custo_id' => $request->select_cc,
            'localidade_id' => $request->select_local,
            'responsavel_id' => $request->select_resp,
            'nota_fiscal_id' => $request->select_nota_fiscal,
            'patrimonio' => $request->patrimonio
        ]);

        $historico = HistoricoEquipamento::create([
            'atividade_id' => 1,
            'equipamento_id' => $equipamento->id,
            'responsavel_id' => \Auth::user()->id


        ]);

        return redirect()->route('equipamentos.index',)->with('success','Equipamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $equip = Equipamento::with('movimentacao')->find($id);
        return view('equipamentos.show', compact('equip'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $equip = Equipamento::find($id);
        $tipos = Tipo::orderBy('id', 'desc')->get();
        $categorias = Categoria::orderBy('id', 'desc')->get();
        $historicos = Movimentacao::orderBy('id', 'desc')->get();
        $marcas = Marca::orderBy('id', 'desc')->get();
        $localidades = Localidade::orderBy('id', 'desc')->get();
        $centro_de_custo = CentroDeCusto::orderBy('id', 'desc')->get();
        $responsavel = Responsavel::orderBy('id', 'desc')->get();
        $notafiscal = NotaFiscal::orderBy('id', 'desc')->get();
        return view('equipamentos.edit', compact('equip', 'marcas', 'localidades', 'centro_de_custo', 'responsavel', 'notafiscal', 'categorias', 'tipos'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $equipamento = Equipamento::find($id);
        $equipamento ->nome = ucwords($request->nome);
        $equipamento ->categoria_id = $request->select_categoria;
        $equipamento ->tipo_id = $request->select_tipo;
        $equipamento ->marca_id = $request->select_marca;
        $equipamento ->descricao = ucfirst($request->descricao);
        $equipamento ->modelo = $request->modelo;
        $equipamento ->numero_serie = $request->numero_serie;
        $equipamento ->centro_de_custo_id = $request->select_cc;
        $equipamento ->localidade_id = $request->select_local;
        $equipamento ->responsavel_id = $request->select_resp;
        $equipamento ->nota_fiscal_id = $request->select_nota_fiscal;
        $equipamento ->patrimonio = $request->patrimonio;
        $equipamento->save();

        $historico = HistoricoEquipamento::create([
            'atividade_id' => 2,
            'equipamento_id' => $equipamento->id,
            'responsavel_id' => \Auth::user()->id


        ]);

        return redirect()->route('equipamentos.index')->with('info', 'Equipamento Editado com sucesso!');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipamento::find($id)->delete();
        return redirect()->route('equipamentos.index')->with('info', 'Equipamento excluído com sucesso!');

        $historico = HistoricoEquipamento::create([
            'atividade_id' => 3,
            'equipamento_id' => $equipamento->id,
            'responsavel_id' => \Auth::user()->id


        ]);
    }
}

