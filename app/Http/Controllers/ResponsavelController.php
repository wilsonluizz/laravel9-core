<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responsaveis = Responsavel::orderBy('id', 'desc')->get();
        return view('responsaveis.index', compact('responsaveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('responsaveis.create');
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
            'nome' => 'required|string',
            'matricula' => 'required|integer',
            'email' => 'required|email',
        ], [],[
            'nome' => 'Nome',
            'matricula' => 'Matricula',
            'email' => 'E-mail',
        ]);

        $responsavel = Responsavel::create([
            'nome' => ucwords($request->nome),
            'matricula' => ucwords($request->matricula),
            'email' => $request->email,
        ]);

        return redirect()->route('responsaveis.index')->with('success','Responsável criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $responsavel = Responsavel::find($id);
        return view('responsaveis.show', compact('responsavel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsavel = Responsavel::find($id);
        return view('responsaveis.edit', compact('responsavel'));
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
            'nome' => 'required|string',
            'matricula' => 'required|integer',
            'email' => 'required|email',
        ], [],[
            'nome' => 'Nome',
            'matricula' => 'Matricula',
            'email' => 'E-mail',
        ]);

        $responsavel = Responsavel::find($id);

        $responsavel->nome = $request->nome;
        $responsavel->matricula = $request->matricula;
        $responsavel->email = $request->email;
        $responsavel->save();
        return redirect()->route('responsaveis.index')->with('info', 'Responsável alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Responsavel::find($id)->delete();
        return redirect()->route('responsaveis.index')->with('info', 'Responsável excluído com sucesso!');
        
    }
}
