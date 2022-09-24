<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Permissões
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfis = Role::all();
        return view('admin.usuarios.create', compact('perfis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'perfis' => 'required'
        ]);

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $usuario = User::create($input);
        $usuario->assignRole($request->input('perfis'));
        return redirect()->route('usuarios.index')->with([
            'mensagem' => 'Usuário criado com sucesso!', 
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
        //  // Resgata o ID do usuário
        //  $usuario = User::find($id);
        
        //  /**
        //   * Exibe os perfis e permissões do usuário (true/false)
        //   */
         
        //  $todosOsPerfis = Role::where('kernel', '!=', 1)->get(['id', 'name']);               // Exibe todos os perfis exceto Kernel
        //  foreach($todosOsPerfis as $perfil) {
        //      $perfisDoUsuario[$perfil['id']]['nome'] = $perfil['name'];
        //      $perfisDoUsuario[$perfil['id']]['tem_perfil'] = ($usuario->hasAllRoles($perfil['name']) ? true : false);
        //  }
 
        //  $todasAsPermissoes = Permission::where('kernel', '!=', 1)->get(['id', 'name']);     // Exibe todas as permissões exceto Kernel
        //  foreach($todasAsPermissoes as $permissao) {
        //      $permissoesDoUsuario[$permissao['id']]['nome'] = $permissao['name'];
        //      $permissoesDoUsuario[$permissao['id']]['tem_permissao'] = ($usuario->hasAllPermissions($permissao['name']) ? true : false);
        //  }
 
        //  return view('admin.usuarios.show', compact('usuario', 'perfisDoUsuario', 'permissoesDoUsuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);                     // Resgata o ID do usuário
        $perfis = Role::all();
        return view('admin.usuarios.edit', compact('usuario', 'perfis'));
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
            'name' => 'required',
            'email' => 'required|email',
            'perfis' => 'required'
        ]);

        $input = $request->all();

        // Desconsiderar senhas vazias
        // if(!empty($input['password'])){
        //     $input['password'] = bcrypt($input['password']);
        // } else {
        //     unset($input['password']);
        // }

        $usuario = User::find($id);
        $usuario->update($input);

        $usuario->syncRoles($request->input('perfis'));
        
        return redirect()->route('usuarios.index')->with([
            'mensagem' => 'Dados do usuário alterados com sucesso!', 
            'estilo' => 'bg-primary',
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
        // User::find($id)->delete();
        // return redirect()->route('usuarios.index')->with(['mensagem' => 'Usuário apagado com sucesso!', 'estilo' => 'bg-danger']);
    }
}
