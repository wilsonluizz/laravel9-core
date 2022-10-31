<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidade;
use App\Models\UnidadeFederativa;
use App\Models\Responsavel;

class LocalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localidades = Localidade::orderBy('id', 'desc')->get();
        return view('localidades.index', compact('localidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $ufs = UnidadeFederativa::orderBy('id')->get();
        return view('localidades.create', compact('ufs'));
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
            'nome' => 'required',
            'cidade' => 'required',
            'select_uf' => 'required',
            'cep' => 'required|numeric',
            
            
        ], [], [
         'nome' => '"Nome"',   
        'cidade' => '"Cidade"',
        'select_uf' => '"UF"',
        'cep' => '"Cep',    
    ]);

        

        $localidade = Localidade::create([
            'nome' => ucwords($request->nome),
            'cidade' => ucwords($request->cidade),
            'uf_id' => $request->select_uf,
            'cep' => $request->cep
        ]);

        return redirect()->route('localidades.index')->with('success','Localidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $local = Localidade::find($id);
        return view('localidades.show', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $ufs = UnidadeFederativa::orderby('id')->get();
        $local = Localidade::find($id);
        return view('localidades.edit', compact('local', 'ufs'));
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
        $request->validate([
            'nome' => 'required',
            'cidade' => 'required',
            'select_uf' => 'required',
            'cep' => 'required|numeric',
            
            
        ], [], [
         'nome' => '"Nome"',   
        'cidade' => '"Cidade"',
        'select_uf' => '"UF"',
        'cep' => '"Cep',    
    ]);

        $local = Localidade::find($id);
        $local->nome = $request->nome;
        $local->cidade = $request->cidade;
        $local->uf_id = $request->select_uf;
        $local->cep = $request->cep;
        $local->save();
        return redirect()->route('localidades.index')->with('info', 'Localidade alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Localidade::find($id)->delete();
        return redirect()->route('localidades.index'); 
    }
}
