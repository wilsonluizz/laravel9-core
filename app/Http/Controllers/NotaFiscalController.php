<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\NotaFiscal;
use Illuminate\Http\Request;

class NotaFiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas_fiscais = NotaFiscal::orderBy('id', 'desc')->get();
        return view('notas_fiscais.index', compact('notas_fiscais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notas_fiscais.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer',
            'valor' => 'required|string',
            'sc_origem' => 'required|numeric',
            'data_emissao' => 'required|date',
        ],[], [
            'numero' => 'Numero',
            'valor' => '"Valor"',
            'sc_origem' => '"SC. origem"',
            'data_emissao' => '"Data de emissão"',
        ]);

        NotaFiscal::create([
            'numero' => $request->numero,
            'valor' => $request->valor,
            'sc_origem' => $request->sc_origem,
            'data_emissao' => $request->data_emissao,
        ]);
        
        return redirect()->route('notas-fiscais.index')->with('success', 'Nota fiscal adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nota_fiscal = NotaFiscal::find($id);
        return view('notas_fiscais.show', compact('nota_fiscal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nota = NotaFiscal::find($id);
        return view('notas_fiscais.edit', compact('nota'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nota_fiscal = NotaFiscal::find($id);
        $equipamento = Equipamento::where('nota_fiscal_id', $nota_fiscal->id)->get();
        if ($equipamento->count() == 0) {
            $nota_fiscal->delete();
            return redirect()->route('notas-fiscais.index')->with('success', 'Nota fiscal excluída com sucesso!');
        }
        return redirect()->route('notas-fiscais.index')->with('error', 'A nota fiscal não pode ser excluída, pois está registrada em um equipamento');
        
    }
}
