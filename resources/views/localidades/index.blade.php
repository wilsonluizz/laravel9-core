@extends('layouts.app')

@section('content')
<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-10">
                        <h3 class="pt-1"><i class="bi bi-geo-alt"></i> Localidades</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a class="btn btn-primary" href="{{ route('localidades.create') }}" data-toggle="tooltip" title="Criar nova Localidade">
                            <span class="d-lg-none">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-plus-lg me-1"></i>
                                Nova localidade
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-3">Nome</th>
                            <th class="col-3">Cidade</th>
                            <th class="col-3">UF</th>
                            <th class="col-1">Criado em</th>
                            <th class="col-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($localidades as $local)
                        <tr>
                            <td>{{ $local->nome }}</td>
                            <td>{{ $local->cidade }}</td>
                            <td>{{ $local->uf->uf }}</td>
                            
                            <td>{{ date('d/m/Y', strtotime($local->created_at)) }}</td>
                            <td class="text-center">
                                
                                @can('admin')

                                     <a class="btn btn-sm btn-info" href="{{ route('localidades.show', $local->id) }}" data-toggle="tooltip" title="Ver detalhes de {{ $local->name }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a class="btn btn-sm btn-primary" href="{{ route('localidades.edit', $local->id) }}" data-toggle="tooltip" title="Editar {{ $local->name }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a> 

                                @else

                                     <a class="btn btn-sm btn-primary" href="{{ route('localidades.show', $local->id) }}" data-toggle="tooltip" title="Ver detalhes de {{ $local->name }}">
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