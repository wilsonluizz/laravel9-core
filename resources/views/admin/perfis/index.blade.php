@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="pt-1"><i class="bi bi-person-badge me-3"></i> Perfis de usuários</h3>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-primary" href="{{ route('perfis.create') }}" data-toggle="tooltip" title="Criar novo perfil">
                                <span class="d-xs-block d-lg-none">
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Novo perfil
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-3">Perfil</th>
                                <th class="col-6">Descrição</th>
                                <th class="col-2 text-center">Criado em</th>
                                <th class="col-1 text-center">Ações</th>
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
                                <td class="text-center">{{ date('d/m/Y', strtotime($p->created_at)) }}</td>
                                <td class="text-center">

                                    @can('admin')
                                    
                                        <a class="btn btn-sm btn-secondary" href="{{ route('perfis.edit', $p->id) }}" data-toggle="tooltip" title="Editar {{ $p->name }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        {{-- DELETE --}}
                                        {{-- <a class="btn btn-sm btn-danger" href="{{ route('perfis.show', $p->id) }}" data-toggle="tooltip" title="Detalhes do perfil {{ $p->name }}">
                                            <i class="bi bi-trash-fill"></i>
                                        </a> --}}
                                    
                                    @else
                                    
                                        <a class="btn btn-sm btn-primary" href="{{ route('perfis.show', $p->id) }}" data-toggle="tooltip" title="Detalhes de {{ $p->name }}">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                    @endcan

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-8 mt-1">
                            <a class="text-muted pt-2 text-decoration-none" href="{{ route('admin') }}">
                                <i class="bi bi-arrow-return-left"></i>
                                <span class="ms-2">Voltar à página anterior</span>
                            </a>
                        </div>
    
                        <div class="col-4 text-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection