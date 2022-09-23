@extends('layouts.admin')

@section('content')
    <div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-lg-10">
                            <h3 class="pt-1"><i class="bi bi-person-badge me-3"></i> Perfis de usuários</h3>
                        </div>
                        <div class="col-lg-2 text-end">
                            <a class="btn btn-primary" href="{{ route('perfis.create') }}" data-toggle="tooltip" title="Criar novo perfil">
                                <i class="bi bi-plus-lg mx-1"></i>
                                Novo perfil
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-lg-3">Nome do perfil</small></th>
                                <th class="col-lg-6">Descrição</small></th>
                                <th class="col-lg-1">Criado em</th>
                                <th class="col-lg-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perfis as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>
                                    @if(!is_null($p->description))
                                        {{ $p->description }}
                                     @else
                                        <span class="text-muted">Nenhuma descrição informada.</span>
                                     @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($p->created_at)) }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-primary" href="{{ route('perfis.show', $p->id) }}" data-toggle="tooltip" title="Detalhes do perfil {{ $p->name }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a class="btn btn-sm btn-secondary" href="{{ route('perfis.edit', $p->id) }}" data-toggle="tooltip" title="Detalhes do perfil {{ $p->name }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    {{-- @can('Gerenciar perfis') --}}
                                    <a class="btn btn-sm btn-warning" href="{{ route('perfis.edit', $p->id) }}" data-toggle="tooltip" title="Modificar permissões de {{ $p->name }}">
                                        <i class="bi bi-toggles"></i>
                                    </a>
                                    {{-- @endcan --}}
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a class="text-muted pt-2 text-decoration-none" href="{{ route('admin') }}">
                        <i class="bi bi-arrow-return-left"></i>
                        <span class="ms-2">Voltar à página anterior</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection