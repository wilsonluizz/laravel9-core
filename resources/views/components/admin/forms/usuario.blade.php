{{-- Habilita o formulário apenas para $type CREATE e EDIT --}}
@if(!is_null($type))
    <form action="{{ ($type == 'edit') ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" method="post">

    @csrf
    @if($type == 'edit') @method('PUT') @endif

@endif

    <div class="card-header pb-1">
        <div class="row">
            <div class="col-10">
                <h3 class="pt-1">
                    <i class="bi bi-person-fill me-3"></i> 
                    <span class="text-secondary">Usuário |</span>

                    @if(!is_null($type))
                        @if($type == 'edit') 
                            Editar {{ $usuario->name }} 
                        @else 
                            Criar 
                        @endif
                    @else
                        {{ $usuario->name }}
                    @endif

                </h3>
            </div>

            <div class="col-2 text-end">
                
                @if(!is_null($type))
                
                    {{-- EDIT || Habilita exclusão caso tenha essa permissão --}}
                    @if($type == "edit")
                        @can('admin')
                            <button class="btn btn-danger" type="submit" data-toggle="tooltip" title="Apagar {{ $usuario->name }}" id="confirmarExclusao">
                                {{-- 
                                    FIXME: Habilitar modal para exclusão
                                    FIXME: Formulário para exclusão
                                --}}
                                
                                {{-- Botão para telas pequenas --}}
                                <span class="d-xs-block d-lg-none">
                                    <i class="bi bi-trash-fill"></i>
                                </span>    
                                
                                {{-- Botão para telas grandes --}}
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-trash-fill me-1"></i>
                                    Excluir usuário
                                </span>        

                            </button>
                        @endcan
                    @endif

                    
                {{-- SHOW || Habilita edição caso tenha essa permissão --}}
                @else
                    @can('admin')

                    <div class="d-xs-block d-lg-none">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>

                    <div class="d-none d-lg-block">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"></i>
                            Editar usuário
                        </a>
                    </div>

                    @endcan
                @endif

            </div>
        </div>
    </div>
    
    {{-- Informações pessoais --}}
    <div class="card-body">
        <div class="row pb-3">

            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <h5>Informações pessoais</h5>
                <p class="text-secondary">
                    <i class="fas fa-lock text-primary pr-2"></i>
                    <span class="badge bg-primary me-1">LGPD</span>
                    Informações criptografadas
                    {{-- 
                        FIXME: Incluir criptografia de dados
                    --}}
                </p> 
            </div>
            
            
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">

                {{-- Nome --}}
                <div class="row pb-4">
                    <div class="col">
                        <label for="nome" class="d-block fw-bold">
                            Nome do usuário
                        </label>

                        {{-- EDIT / CREATE || Campo de formulário Nome --}}
                        @if(!is_null($type))

                            <input type="text" name="name" class="form-control" id="nome" aria-describedby="dicaNome" @if($type == 'edit') value="{{ $usuario->name }}" @endif />
                            <small id="dicaNome" class="form-text text-muted"><strong>Obrigatório</strong>. Utilize o nome completo, sem abreviaturas</small>


                        {{-- SHOW || Exibe Nome --}}
                        @else
                            {{ $usuario->name }}
                        @endif
                    </div>
                </div>

                <div class="row pb-4">

                    {{-- E-mail --}}
                    <div class="col-lg-6">
                        <label for="email" class="d-block fw-bold">
                            E-mail
                        </label>

                        {{-- EDIT / CREATE || Campo de formulário E-mail --}}
                        @if(!is_null($type))
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="dicaEmail" @if($type == 'edit') value="{{ $usuario->email }}" @endif />
                            <small id="dicaEmail" class="form-text text-muted"><strong>Obrigatório</strong>. O e-mail será utilizado para realizar login e para recuperação da senha</small>

                        {{-- SHOW || Exibe o E-mail --}}
                        @else
                            {{ $usuario->email }}
                        @endif
                    </div>

                    {{-- Senha --}}
                    <div class="col-lg-6">
                        <label for="password" class="d-block fw-bold">
                            Senha
                        </label>

                        @if(!is_null($type))
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="dicaPassword" @if($type == 'edit') disabled="disabled" @endif />
                            @if($type == 'edit') 
                                <small id="dicaPassword" class="form-text text-muted"><strong>Desabilitado</strong>. Você não pode trocar a senha de outro usuário</small>
                            @else
                                <small id="dicaPassword" class="form-text text-muted"><strong>Obrigatório</strong>. Utilize uma senha forte - use letras maiúsculas, minúsculas e caracteres especiais (#, @, $, ...)</small>
                            @endif
                        @else
                            <small class="text-muted">***********</small>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <hr />

        {{-- Perfis --}}
        <div class="row">

            <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                <h5>Perfis</h5>
                <p class="text-secondary">
                    <i class="fas fa-lock text-primary pr-2"></i>
                    <span class="badge bg-danger me-1">Atenção</span>
                    Os <strong>perfis</strong> contém um grupo de permissões que
                    definem o que o usuário poderá executar na plataforma
                </p> 
            </div>
            
            
            <div class="col-12 col-sm-12 col-md-9 col-lg-9">

                <div class="row table-responsive">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-4">Perfil</small></th>
                                <th class="col-8">Descrição do perfil</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!is_null($type))

                                @foreach($perfis as $p)
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="perfis[]" value="{{ $p->id }}" id="{{ $p->id }}" @if($type == 'edit') {{ ($usuario->hasRole($p) ? 'checked="checked"' : "") }} @endif>
                                            <label class="form-check-label d-block pe-auto ms-3" for="{{ $p->id }}" role="button">{{ $p->name }}</label>
                                        </div>
                                    </td>
                                    <td>
                                        @if(!is_null($p->description))
                                            {{ $p->description }}
                                        @else
                                            <span class="text-secondary">Nenhuma descrição fornecida.</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            @else

                                @foreach($perfis as $p)
                                    @if($usuario->hasAllRoles($p->name))
                                        <tr>
                                            <td>
                                                {{ $p->name }}
                                            </td>
                                            <td>
                                                @if(!is_null($p->description))
                                                    {{ $p->description }}
                                                @else
                                                    <span class="text-secondary">Nenhuma descrição fornecida.</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            
                            @endif

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    {{-- Pé do cartão --}}
    <div class="card-footer">

        <div class="row">

            <div class="col-10 mt-2">
                <a class="text-muted text-decoration-none" href="{{ route('usuarios.index') }}">
                    <i class="bi bi-arrow-return-left"></i>
                    <span class="ms-2">Voltar @if(!is_null($type)) sem {{ ($type == 'create' ? 'criar usuário' : 'editar informações')  }} @else à página anterior @endif</span>
                </a>
            </div>

            <div class="col-2 text-end">
                @if(!is_null($type))
                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="{{ ($type == 'edit') ? "Editar" : "Salvar" }} usuário">
                        <span class="d-xs-block d-lg-none">
                            <i class="bi {{ ($type == 'edit') ? "bi-pencil-square" : "bi-save" }}"></i>
                        </span>                    
                        <span class="d-none d-lg-block">
                            <i class="bi {{ ($type == 'edit') ? "bi-pencil-square" : "bi-save" }}"></i>
                            {{ ($type == 'edit') ? "Editar" : "Salvar" }} usuário
                        </span>                   
                    </button>
                @endif
            </div>
        </div>
    </div>

@if(!is_null($type))
    </form>
@endif