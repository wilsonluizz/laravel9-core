<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rotas gerais

    // ROTA DE AUTENTICAÇÃO
    Auth::routes(
        [
            'register'  => false,        // Desabilita o autocadastro
            'verify'    => false,        // Desabilita a verificação de e-mail
        ]
    );

    // ROTA DA RAIZ DO APLICATIVO E CONTROLE DE LOGIN
    Route::get('/', function () {
        if(Auth::guest()) 
            return redirect('login');   // Se não está logado, envia para tela de login
        else 
            return redirect('home');    // Se está logado, envia para home
    });

    // CONTROLE DA PÁGINA INICIAL (HOME)
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('centros-de-custo', 'App\Http\Controllers\CentroDeCustoController');
    Route::resource('localidades', 'App\Http\Controllers\LocalidadeController');
    Route::resource('inventario', 'App\Http\Controllers\InventarioController');



// Rotas de administração
// Todas precisam ser autenticadas (Middleware: auth)

    // Todas as rotas abaixo possuem o 'prefixo' /admin/
    Route::prefix('admin')->group(function() {

        // As rotas dentro desse grupo precisam ter passado por autenticação
        Route::group(['middleware' => ['auth']], function() {
            
            // Rota de gerenciamento dos próprios dados
            // TODO: Criar controlador de administração dos próprios dados /admin/eu
            Route::resource('eu', 'App\Http\Controllers\EuController');

            // As rotas dentro desse grupo precisam ter passado por autenticação 
            // e ter regra (role) de administração (can: admin)
            Route::group(['middleware' => ['can:admin']], function() {
            
                // Página inicial de administração. Conteúdo depende do nível de permissão
                Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin'); 

                // Administração de usuários
                Route::resource('usuarios', 'App\Http\Controllers\UserController');

                // Administração de perfis (roles)
                Route::resource('perfis', 'App\Http\Controllers\RoleController');
            });


            // As rotas dentro desse grupo precisam ter passado por autenticação 
            // e ter permissão de desenvolvedor (can: dev)
            Route::group(['middleware' => ['can:dev']], function() {
                
                // Administração de kernel
                Route::resource('permissoes', 'App\Http\Controllers\PermsController');
            });

        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







