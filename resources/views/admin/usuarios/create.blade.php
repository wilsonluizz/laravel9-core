@extends('layouts.admin')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <form action="{{ route('usuarios.store') }}" method="post">
                @csrf

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-lg-10">
                            <h3 class="pt-1"><i class="bi bi-person-fill me-3"></i> Novo usuário</h3>
                        </div>
                        <div class="col-lg-2 text-end"></div>
                    </div>
                </div>

                
                <div class="card-body">

                    {{-- Informações pessoais --}}
                    <div class="row pb-3">

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <h5>Informações pessoais</h5>
                            {{-- 
                                TODO Incluir criptografia de nome    
                            --}}
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
                                    <input type="text" name="nome" class="form-control" id="nome" aria-describedby="dicaNome">
                                    <small id="dicaNome" class="form-text text-muted"><strong>Campo obrigatório</strong>. Utilize o nome completo, sem abreviaturas</small>
                                </div>
                            </div>

                            <div class="row pb-4">

                                {{-- E-mail --}}
                                <div class="col-lg-6">
                                    <label for="email" class="d-block fw-bold">
                                        E-mail
                                    </label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="dicaEmail">
                                    <small id="dicaEmail" class="form-text text-muted"><strong>Campo obrigatório</strong>. O e-mail será utilizado para realizar login e para recuperação da senha</small>
                                </div>

                                {{-- Senha --}}
                                <div class="col-lg-6">
                                    <label for="password" class="d-block fw-bold">
                                        Senha
                                    </label>
                                    <input type="password" name="password" class="form-control" id="password" aria-describedby="dicaPassword">
                                    <small id="dicaPassword" class="form-text text-muted"><strong>Campo obrigatório</strong>. Utilize uma senha forte - use letras maiúsculas, minúsculas e caracteres especiais (#, @, $, ...)</small>
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
                            <div class="row">

                                @foreach($perfis as $p)
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="perfis[]" value="{{ $p->id }}" id="{{ $p->id }}">
                                            <label class="form-check-label d-block pe-auto ms-3" for="{{ $p->id }}" role="button">{{ $p->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        {{ $p->description }}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="card-footer">

                    <div class="row">
                        <div class="col-lg-10 mt-1">
                            <a class="text-muted pt-2 text-decoration-none" href="{{ route('usuarios.index') }}">
                                <i class="bi bi-arrow-return-left"></i>
                                <span class="ms-2">Voltar à página anterior (sem criar usuário)</span>
                            </a>
                        </div>
    
                        <div class="col-lg-2 text-end">
                            <button type="submit" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Salvar informações">
                                <i class="bi bi-save mx-1"></i>
                                Salvar
                            </button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection