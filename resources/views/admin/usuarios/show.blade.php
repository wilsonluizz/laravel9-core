@extends('layouts.admin')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">
            
            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-sm-10">
                        <h3 class="pt-1">
                            <i class="bi bi-person-fill me-3"></i> 
                            <span class="text-secondary">Usuário |</span>
                            {{ $usuario->name }} 
                        </h3>
                    </div>
        
                    <div class="col-sm-2 text-end">
                        @can('admin')

                        <div class="d-xs-block d-lg-none">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary">
                                <i class="bi bi-pencil-square mx-1"></i>
                            </a>
                        </div>

                        <div class="d-none d-lg-block">
                            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary">
                                <i class="bi bi-pencil-square mx-1"></i>
                                Editar usuário
                            </a>
                        </div>

                    @endcan
                    </div>
                </div>
            </div>

            

            {{-- Informações pessoais --}}
            <div class="card-body">
                <div class="row pb-3">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Informações pessoais</h5>
                        <p class="text-secondary">
                            <i class="fas fa-lock text-primary pr-2"></i>
                            <span class="badge bg-primary me-1">LGPD</span>
                            Informações criptografadas
                        </p> 
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

                        {{-- Nome --}}
                        <div class="row pb-4">
                            <div class="col">
                                <label for="nome" class="d-block fw-bold">
                                    Nome do usuário
                                </label>
                                {{ $usuario->name }}
                            </div>
                        </div>

                        {{-- E-mail --}}
                        <div class="row pb-4">
                            <div class="col-lg-6">
                                <label for="email" class="d-block fw-bold">
                                    E-mail
                                </label>
                                {{ $usuario->email }}
                            </div>

                            {{-- Senha --}}
                            <div class="col-lg-6">
                                <label for="password" class="d-block fw-bold">
                                    Senha
                                </label>
                                <small id="dicaPassword" class="form-text text-muted">***********</small>
                            </div>
                        </div>

                    </div>
                </div>

                <hr />

                {{-- Perfis --}}
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Perfis</h5>
                        <p class="text-secondary">
                            <i class="fas fa-lock text-primary pr-2"></i>
                            <span class="badge bg-danger me-1">Atenção</span>
                            Os <strong>perfis</strong> contém um grupo de permissões que
                            definem o que o usuário poderá executar na plataforma
                        </p> 
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="row table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-lg-4">Nome do perfil</small></th>
                                        <th class="col-lg-8">Descrição</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($perfisDoUsuario as $p)
                                    <tr>
                                        <td>{{ $p['name'] }}</td>
                                        <td>{{ $p['description'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                <hr />

                {{-- Permissões --}}
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Permissões</h5>
                        <p class="text-secondary">
                            <i class="fas fa-lock text-primary pr-2"></i>
                            <span class="badge bg-danger me-1">Atenção</span>
                            {{ $usuario->name }} possui as seguintes permissões com base em 
                            @if(count($perfisDoUsuario) == 1) seu perfil @else seus perfis @endif
                        </p> 
                    </div>
                    
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        <div class="row table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-lg-4">Permissão para</small></th>
                                        <th class="col-lg-8">Descrição</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissoesDoUsuario as $p)
                                    <tr>
                                        <td>{{ $p['name'] }}</td>
                                        <td>{{ $p['description'] }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">

                <div class="row">
                    <div class="col-lg-10 mt-1">
                        <a class="text-muted pt-2 text-decoration-none" href="{{ route('usuarios.index') }}">
                            <i class="bi bi-arrow-return-left"></i>
                            <span class="ms-2">Voltar à página anterior</span>
                        </a>
                    </div>

                    <div class="col-lg-2 text-end">
                        {{--  --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection