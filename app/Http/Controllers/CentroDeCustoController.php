<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroDeCusto;
class CentroDeCustoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centro_de_custo = CentroDeCusto::all();
        return view('centros_de_custo.index', compact('centro_de_custo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centros_de_custo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->nome);
        $r = CentroDeCusto::create([
            'nome' => $request->nome,
            'codigo' => $request->codigo,
            'responsavel' => $request->responsavel,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $centro_de_custo = CentroDeCusto::find($id);
        return view('centros_de_custo.show', compact('centro_de_custo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $centro_de_custo = CentroDeCusto::find($id);
        return view('centros_de_custo.edit', compact('centro_de_custo'));
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
    
        $centro_de_custo = CentroDeCusto::find($id);
        

        $centro_de_custo->nome = $request->nome;
        $centro_de_custo->responsavel = $request->email;
        $centro_de_custo->codigo = $request->codigo;
        $centro_de_custo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
