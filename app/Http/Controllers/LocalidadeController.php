<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localidade;
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
    {
        return view('localidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $r = Localidade::create([
            'nome' => ucwords($request->nome),
            'cidade' => ucwords($request->cidade),
            'uf' => strtoupper($request->uf)
        ]);

        return redirect()->route('localidades.index');
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
        $local = Localidade::find($id);
        return view('localidades.edit', compact('local'));
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
        
        $local = Localidade::find($id);
        
        $local->nome = $request->nome;
        $local->cidade = $request->cidade;
        $local->uf = $request->uf;
        $local->save();
        return redirect()->route('localidades.index');
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
