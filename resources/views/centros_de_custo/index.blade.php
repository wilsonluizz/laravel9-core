@extends('layouts.app')




@section('content')
<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-10">
                        <h3 class="pt-1"><i class="bi bi-currency-dollar"></i> Centros de custo</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a class="btn btn-primary" href="{{ route('centros-de-custo.create') }}" data-toggle="tooltip" title="Criar novo usuário">
                            <span class="d-lg-none">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-plus-lg me-1"></i>
                                Novo centro de custo
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="col-3">Nome</th>
                            <th class="col-3">Código</th>
                            <th class="col-3">Responsável</th>
                            <th class="col-1">Criado em</th>
                            <th class="col-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($centro_de_custo as $cc)
                        <tr>
                            <td>{{ $cc->nome }}</td>
                            <td>{{ $cc->codigo }}</td>
                            <td>{{ $cc->responsavel->nome}}</td>
                            
                            <td>{{ date('d/m/Y', strtotime($cc->created_at)) }}</td>
                            <td class="text-center">
                                
                                @can('admin')

                                     <a class="btn btn-sm btn-info" href="{{ route('centros-de-custo.show', $cc->id) }}" data-toggle="tooltip" title="Ver detalhes de {{ $cc->name }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a class="btn btn-sm btn-primary" href="{{ route('centros-de-custo.edit', $cc->id) }}" data-toggle="tooltip" title="Editar {{ $cc->name }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a> 

                                @else

                                     <a class="btn btn-sm btn-primary" href="{{ route('centros-de-custo.show', $cc->id) }}" data-toggle="tooltip" title="Ver detalhes de {{ $cc->name }}">
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