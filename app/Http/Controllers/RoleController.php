<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Permissões
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfis = Role::all();
        return view('admin.perfis.index', compact('perfis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perms = Permission::all();
        return view('admin.perfis.create', compact('perms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         // Apenas o nome do perfil é requerido. As permissões podem ser inclusas depois (através de Edit)
         $this->validate($request, [
            'name' => 'required',
        ]);

        // Cria o perfil com nome e descrição
        $perfil = Role::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        // Se já foram selecionadas as permissões desse perfil, sincronizar
        $perfil->syncPermissions($request->input('perms'));

        // Retorna para a tela inicial com mensagem de sucesso na criação do perfil
        return redirect()->route('perfis.index')->with([
            'mensagem' => 'Perfil criado com sucesso!',
            'estilo' => 'bg-success',
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
        // Busca o perfil no Banco de dados
        $perfil = Role::find($id);

        // Buscar usuários que contém esse perfil;
        $usuarios = User::role($perfil)->get(['id', 'name', 'email']);

        // Exibir permissões desse perfil
        // TODO: Corrigir código
        $todasAsPermissoes = Permission::get(['id', 'name', 'description']);
        foreach($todasAsPermissoes as $permissao) {
            $permissoesDoPerfil[$permissao['id']]['id'] = $permissao['id'];
            $permissoesDoPerfil[$permissao['id']]['name'] = $permissao['name'];
            $permissoesDoPerfil[$permissao['id']]['description'] = $permissao['description'];
            $permissoesDoPerfil[$permissao['id']]['hasPermission'] = ($perfil->hasAllPermissions($permissao['name']) ? true : false);
        }

        return view('admin.perfis.show', compact('perfil', 'usuarios', 'permissoesDoPerfil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Role::find($id);      // Resgata o ID do Perfil
        $perms = Permission::all();
        return view('admin.perfis.edit', compact('perfil','perms'));
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

        $this->validate($request, [
            'name' => 'required'
        ]);

        $perfil = Role::find($id);
        $perfil->update($request->all());
        $perfil->syncPermissions($request->input('perms'));
        return redirect()->route('perfis.index')->with([
            'mensagem' => 'Perfil e permissões alterados com sucesso!', 
            'estilo' => 'bg-primary'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('perfis.index')->with([
            'mensagem' => 'Perfil apagado com sucesso!',
            'estilo' => 'bg-danger',
        ]);
    }
}
