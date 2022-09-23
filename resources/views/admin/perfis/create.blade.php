@extends('layouts.admin')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <form action="{{ route('perfis.store') }}" method="post">
                @csrf

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-lg-10">
                            <h3 class="pt-1"><i class="bi bi-person-badge me-3"></i> Novo perfil</h3>
                        </div>
                        <div class="col-lg-2 text-end"></div>
                    </div>
                </div>

                
                <div class="card-body">

                    <div class="row pb-3">

                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <h5>Perfil</h5>
                            <p class="text-secondary">
                                <i class="fas fa-lock text-primary pr-2"></i>
                                É o grupo de permissões do usuário
                            </p> 
                        </div>
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

                            {{-- Nome --}}
                            <div class="row pb-4">
                                <div class="col">

                                    <label for="nomeDoPerfil" class="d-block fw-bold">
                                        Nome do perfil
                                    </label>
                                    <input type="text" name="name" class="form-control" id="nomeDoPerfil" aria-describedby="dicaPerfil">
                                    <small id="dicaPerfil" class="form-text text-muted"> 
                                        <strong>Obrigatório</strong>. Dica: Você pode utilizar um cargo como base para desenhar o perfil de usuários.
                                    </small>

                                </div>
                            </div>

                            {{-- Descrição --}}
                            <div class="row pb-4">
                                <div class="col">

                                    <label for="descricaoDoPerfil" class="d-block">
                                        Descrição do perfil
                                    </label>
                                    <textarea rows="2" name="description" class="form-control" id="descricaoDoPerfil" aria-describedby="dicaDescricaoPerfil"></textarea>
                                    <small id="dicaDescricaoPerfil" class="form-text text-muted"> 
                                        Opcional. Você pode incluir uma descrição sobre esse perfil.
                                    </small>

                                </div>
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
                                São as ações que esse perfil pode executar
                            </p> 
                        </div>
                        
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                            
                            <div class="row mb-2">
                                <div class="col-lg-6 fw-bold">Permissão</div>
                                <div class="col-lg-6 fw-bold">Descrição</div>
                            </div>

                            @foreach($permissoes as $p)
                            <div class="row mb-1">
                                <div class="col-lg-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" name="permissoes[]" value="{{ $p->id }}" id="{{ $p->id }}">
                                        <label class="form-check-label d-block" for="{{ $p->id }}" role="button">{{ $p->name }}</label>
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

                <div class="card-footer">

                    <div class="row">
                        <div class="col-lg-10 mt-1">
                            <a class="text-muted pt-2 text-decoration-none" href="{{ route('perfis.index') }}">
                                <i class="bi bi-arrow-return-left"></i>
                                <span class="ms-2">Voltar à página anterior (sem criar perfil)</span>
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
