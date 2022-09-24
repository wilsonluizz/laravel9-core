@extends('layouts.admin')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-lg-10">
                        <h3 class="pt-1">
                            <i class="bi bi-person-badge me-3"></i> 
                            <span class="text-secondary">Perfil |</span>
                            {{ $perfil->name }}
                        </h3>
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
                                <p class="lead">{{ $perfil->name }}</p>

                                <small id="dicaPerfil" class="form-text text-muted d-none"> 
                                    <strong>Obrigatório</strong>. Dica: Você pode utilizar um cargo como base para desenhar o perfil de usuários.
                                </small>

                            </div>
                        </div>

                        {{-- Descrição --}}
                        <div class="row">
                            <div class="col">

                                <label for="descricaoDoPerfil" class="d-block">
                                    Descrição do perfil
                                </label>
                                <textarea rows="2" name="description" class="form-control d-none" id="descricaoDoPerfil" aria-describedby="dicaDescricaoPerfil"></textarea>
                                <p class="lead">@if(!is_null($perfil->description)) {{ $perfil->description }} @else <span class="text-secondary">Nenhuma descrição fornecida.</span> @endif</p>
                                <small id="dicaDescricaoPerfil" class="form-text text-muted d-none"> 
                                    Opcional. Você pode incluir uma descrição sobre esse perfil.
                                </small>

                            </div>
                        </div>
                        
                    </div>
                </div>

                <hr />

                {{-- Permissões --}}
                <div class="row pb-4">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Permissões</h5>
                        <p class="text-secondary">
                            <span class="badge bg-danger me-1">Atenção</span>
                            São as ações que esse perfil pode executar
                        </p> 
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        
                        <div class="row mb-2">
                            <div class="col-lg-6 fw-bold">Permissão</div>
                            <div class="col-lg-6 fw-bold">Descrição</div>
                        </div>

                        @foreach($permissoesDoPerfil as $p)
                        <div class="row mb-1">
                            <div class="col-lg-6">
                                
                                <label class="form-check-label" for="{{ $p['id'] }}" role="button">
                                    @if($p['hasPermission']) <i class="bi bi-check text-success fs-4"></i> @else <i class="bi bi-x text-danger fs-4"></i> @endif
                                    {{ $p['name'] }}
                                </label>

                            </div>
                            <div class="col-lg-6">
                                {{ $p['description'] }}
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <hr />

                {{-- Usuários --}}
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Usuários</h5>
                        <p class="text-secondary">
                            <span class="badge bg-danger me-1">Atenção</span>
                            Usuários que possuem esse perfil e essas permissões
                        </p> 
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        
                        <div class="row table-responsive">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-lg-5">Nome</small></th>
                                        <th class="col-lg-5">E-mail</small></th>
                                        <th class="col-lg-2 text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td class="text-center">
                                            Ações
                                        </td>
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
                        <a class="text-muted pt-2 text-decoration-none" href="{{ route('perfis.index') }}">
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


@section('')
<!--
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-8 mb-1">
                            <h2><i class="fas fa-id-card-alt mr-1"></i></h2>
                        </div>
                        <div class="col-lg-4 mb-1 text-right">
                            <a class="btn btn-secondary" href="{{ route('perfis.edit', $perfil->id) }}" data-toggle="tooltip" title="Alterar permissões do perfil" id="alterarPerfil">
                                <i class="fas fa-toggle-on mx-1"></i>
                            </a>

                            
                            {{-- Mostra o botão de exclusão apenas para perfis comuns, exceto o administrador do sistema e DEV --}}
                            @if($perfil->id > 2)
                            <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Apagar {{ $perfil->name }}" id="confirmarExclusao">
                                <i class="fas fa-user-slash mx-1"></i>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h4>Usuários com esse perfil</h4>

                                @foreach($usuarios as $u)

                                {{ $u->name }}
                                {{-- <label class="badge badge-success p-2 mr-2">
                                    <h6 class="m-0">
                                        <i class="fa fa-user mr-2"></i>
                                    </h6>
                                </label> --}}
                                @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <hr>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h4>Permissões</h4>

                            <p>
                                <i class="fa fa-info-circle text-primary" data-toggle="tooltip" title="Informação"></i>
                                Todos os usuários com o perfil <strong>{{ $perfil->name }}</strong> possuem as permissões abaixo:
                            </p>

                            {{-- Tem permissões para --}}
                            @foreach($permissoesDoPerfil as $permissao)
                            {{-- @if($permissao['tem_permissao'] == 1)
                                <label class="badge badge-success p-2 mr-2">
                                    <h6 class="m-0">
                                        <i class="fa fa-check mr-2"></i>
                                        {{ $permissao['nome'] }}
                                    </h6>
                                </label>
                                @endif --}}
                                
                                {{ $permissao['name'] }}

                            @endforeach

                            {{-- Não tem permissões para --}}
                            {{-- @foreach($permissoesDoPerfil as $permissao)
                            @if($permissao['tem_permissao'] == 0)
                                <label class="badge badge-danger p-2 mr-2">
                                    <h6 class="m-0">
                                        <i class="fa fa-times mr-2"></i>
                                        {{ $permissao['nome'] }}
                                    </h6>
                                </label>
                            @endif
                            @endforeach --}}

                        </div>
                    </div>
                    
                    <div class="pt-2">
                        <hr>
                        <a class="text-muted pt-2" href="{{ route('perfis.index') }}">
                        Voltar à página anterior
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalConfirmarExclusao">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Excluir {{ $perfil->name }}</h5>
            </div>
            <div class="modal-body">
                <p class="lead">
                    Você está prestes a <span class="text-danger">excluir</span> o perfil {{ $perfil->name }}. Para confirmar, clique em "Excluir perfil". 
                    <a href="#" class="text-primary" data-dismiss="modal">Você pode sair sem fazer nada clicando aqui</a>, ou no botão azul abaixo.
                </p>
            </div>
            <div class="modal-footer">
                <button type="cancel" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check mr-1"></i> Não desejo excluir</button>

                <form method="POST" action="{{ route('perfis.destroy', $perfil->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-light text-danger"><i class="fas fa-times mr-1"></i> Excluir perfil</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

    {{-- Abre modal para confirmar exclusão --}}
    <script>
        $('#confirmarExclusao').click(function() {
            $('#modalConfirmarExclusao').modal('show');
        });
    </script>

@endsection

{{-- TODO: Criar uma página para edição dos perfis através do clique no usuário --}}
{{-- <a class="btn btn-secondary" href="{{ route('perfis.edit_permissoes', $perfil->id) }}" data-toggle="tooltip" title="Alterar as permissões do perfil">
    <i class="fas fa-toggle-on mx-1"></i>
</a> --}}
{{-- <p class="lead">
    <i class="fa fa-info-circle text-primary" data-toggle="tooltip" title="Informação"></i>
    Você pode clicar nos nomes de usuário para alterar seus perfis.
</p> --}}

{{-- <a class="badge badge-success p-2" href="{{ route('usuarios.edit_perfil', $u->id) }}">
        <i class="fa fa-user mr-2"></i>
        {{ $u->name }}
    </a> --}}
