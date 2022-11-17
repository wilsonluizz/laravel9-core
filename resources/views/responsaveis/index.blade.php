@extends('layouts.app')

@section('content')
<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-10">
                        <h3 class="pt-1"><i class="bi bi-person-fill"></i> Responsáveis</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a class="btn btn-primary" href="{{ route('responsaveis.create') }}" data-toggle="tooltip" title="Criar novo usuário">
                            <span class="d-lg-none">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-plus-lg me-1"></i>
                                Novo responsável
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
                            <th class="col-2">Matrícula</th>
                            <th class="col-">E-mail</th>
                            <th class="col-2">Criado em</th>
                            <th class="col-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($responsaveis as $resp)
                        <tr>
                            <td>{{  $resp->nome }}</td>
                            <td>{{  $resp->matricula }}</td>
                            <td>{{  $resp->email }}</td>
                            
                            <td>{{ date('d/m/Y', strtotime( $resp->created_at)) }}</td>
                            <td class="text-center">
                                
                                @can('admin')

                                     <a class="btn btn-sm btn-info" href="{{ route('responsaveis.show',  $resp->id) }}" data-toggle="tooltip" title="Ver detalhes de {{  $resp->name }}">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a class="btn btn-sm btn-primary" href="{{ route('responsaveis.edit',  $resp->id) }}" data-toggle="tooltip" title="Editar {{  $resp->name }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a> 

                                @else

                                     <a class="btn btn-sm btn-primary" href="{{ route('responsaveis.show',  $resp->id) }}" data-toggle="tooltip" title="Ver detalhes de {{  $resp->name }}">
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