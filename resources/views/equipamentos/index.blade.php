@extends('layouts.app')


@section('content')
<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-8">
                        <h3 class="pt-1"><i class="bi bi-pc-display"></i> Equipamentos</h3>
                    </div>
                    <div class="col-4 text-end">
                        <a class="btn btn-primary" href="{{ route('equipamentos.create') }}" data-toggle="tooltip" title="Criar novo equipamento">
                            <span class="d-lg-none">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-plus-lg me-1"></i>
                                Novo equipamento
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="col-2">Nome</th>
                            <th class="col-2">Modelo</th>
                            <th class="col-2">Localidade</th>
                            <th class="col-2">Centro de custo</th>
                            <th class="col-2">Responsável</th>
                            <th class="col-3 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipamentos as $equip)
                        <tr>
                            <td>{{ $equip->nome }}</td>
                            <td>{{ $equip->modelo }}</td>
                            <td>{{ $equip->localidade->nome }}</td>
                            <td>{{ $equip->centroDeCusto->nome }}</td>
                            <td>{{ $equip->responsavel->nome }}</td>
                            
                            
                            
                            <td class="text-center">
                                
                                @can('admin')

                                     <a class="btn btn-sm btn-info" href="{{ route('equipamentos.show', $equip->id) }}" data-toggle="tooltip" title="Ver detalhes de {{ $equip->name }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a class="btn btn-sm btn-primary" href="{{ route('equipamentos.edit', $equip->id) }}" data-toggle="tooltip" title="Editar {{ $equip->name }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a> 
                                    <a class="btn btn-sm btn-primary" href="{{ route('movimentacao.create', $equip->id) }}" data-toggle="tooltip" title="Editar {{ $equip->name }}">
                                        <i class="bi bi-arrows-move"></i>
                                    </a> 

                                @else

                                     <a class="btn btn-sm btn-primary" href="{{ route('equipamentos.show', $equip->id) }}" data-toggle="tooltip" title="Ver detalhes de {{ $equip->name }}">
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
                    <div class="col-10 mt-1">
                        <a class="text-muted pt-2 text-decoration-none" href="{{ route('admin') }}">
                            <i class="bi bi-arrow-return-left"></i>
                            <span class="ms-2">Voltar à página anterior</span>
                        </a>
                    </div>

                    <div class="col-2 text-end"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection