<form action="{{ ($type == 'edit') ? route('perfis.update', $perfil->id) : route('perfis.store') }}" method="post">

    @csrf
    @if($type == 'edit') @method('PUT') @endif

    {{-- Identificação do formulário --}}
    <div class="card-header pb-1">
        <div class="row">
            <div class="col-sm-10">
                <h3 class="pt-1">
                    <i class="bi bi-person-badge me-3"></i> 
                    <span class="text-secondary">Perfil |</span>

                    @if($type == 'edit') 
                        Editar {{ $perfil->name }} 
                    @else 
                        Criar 
                    @endif

                </h3>
            </div>

            <div class="col-sm-2 text-end">
            
                {{-- Habilita exclusão caso tenha essa permissão --}}
                @if($type == 'edit')
                @can('admin')
                <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Apagar {{ $perfil->name }}" id="confirmarExclusao">
                    {{-- 
                        FIXME: Habilitar modal para exclusão
                        FIXME: Formulário para exclusão
                    --}}

                    <span class="d-xs-block d-lg-none">
                        <i class="bi bi-trash-fill mx-1"></i>
                    </span>                    
                    <span class="d-none d-lg-block">
                        <i class="bi bi-trash-fill me-1"></i>
                        Excluir perfil
                    </span>

                </button>
                @endcan
                @endif

            </div>
        </div>
    </div>

    {{-- Área principal --}}
    <div class="card-body">

        <div class="row pb-3">

            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <h5>Perfil</h5>
                <p class="text-secondary">
                    O perfil dos usuários define suas permissões
                </p> 
            </div>
            
            
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

                {{-- Nome --}}
                <div class="row pb-4">
                    <div class="col">

                        <label for="nomeDoPerfil" class="d-block fw-bold">
                            Nome do perfil
                        </label>
                        <input type="text" name="name" class="form-control" id="nomeDoPerfil" aria-describedby="dicaPerfil" @if($type == 'edit') value="{{ $perfil->name }}" @endif />
                        <small id="dicaPerfil" class="form-text text-muted"> 
                            <strong>Obrigatório</strong>. Você pode utilizar o cargo como base para o perfil de usuários, por exemplo.
                        </small>

                    </div>
                </div>

                {{-- Descrição --}}
                <div class="row pb-4">
                    <div class="col">

                        <label for="descricaoDoPerfil" class="d-block">
                            Descrição do perfil
                        </label>
                        
                        <textarea rows="2" name="description" class="form-control" id="descricaoDoPerfil" aria-describedby="dicaDescricaoPerfil">@if($type == 'edit'){{$perfil->description}}@endif</textarea>
                        
                        <small id="dicaDescricaoPerfil" class="form-text text-muted"> 
                            <strong>Opcional</strong>. Você pode incluir uma descrição sobre esse perfil.
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
                    <span class="badge bg-danger me-1">Atenção</span>
                    São as ações que esse perfil pode executar
                </p> 
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 table-responsive">
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="col-lg-4">Permissão para</small></th>
                            <th class="col-lg-6">Descrição da permissão</small></th>
                            <th class="col-lg-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($perms as $p)
                        <tr>
                            <td>
                                <div class="form-check form-switch">
                                    @can('admin')
                                    <input class="form-check-input" type="checkbox" role="switch" name="perms[]" value="{{ $p->id }}" id="{{ $p->id }}" @if($type == 'edit') {{ ($perfil->hasAllPermissions($p) ? 'checked="checked"' : "") }} @endif>
                                    <label class="form-check-label d-block ms-2" for="{{ $p->id }}" role="button">{{ $p->name }}</label>
                                    @endcan
                                    
                                    @cannot('admin')
                                        {{ $p->name }}
                                    @endcan
                                </div>
                            </td>

                            <td>
                                @if(!is_null($p->description))
                                    {{ $p->description }}
                                @else
                                    <span class="text-secondary">Nenhuma descrição fornecida.</span>
                                @endif
                            </td>

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

    {{-- Pé do cartão --}}
    <div class="card-footer">

        <div class="row">
            <div class="col-sm-10 mt-2">
                <a class="text-muted text-decoration-none" href="{{ route('perfis.index') }}">
                    <i class="bi bi-arrow-return-left"></i>
                    <span class="ms-2">Voltar sem alterar nada</span>
                </a>
            </div>

            <div class="col-sm-2 text-end">
                <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="{{ ($type == 'edit') ? "Editar" : "Salvar" }} perfil">
                    <span class="d-xs-block d-lg-none">
                        <i class="bi {{ ($type == 'edit') ? "bi-pencil-square" : "bi-save" }} mx-1"></i>
                    </span>                    
                    <span class="d-none d-lg-block">
                        <i class="bi {{ ($type == 'edit') ? "bi-pencil-square" : "bi-save" }} mx-1"></i>
                        {{ ($type == 'edit') ? "Editar" : "Salvar" }} perfil
                    </span>                   
                </button>
            </div>
        </div>

    </div>

</form>
