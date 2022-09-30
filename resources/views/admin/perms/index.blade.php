@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="pt-1"><i class="bi bi-toggles me-3"></i> Permissões</h3>
                        </div>
                        <div class="col-2 text-end">
                            <a class="btn btn-primary" href="{{ route('permissoes.create') }}" data-toggle="tooltip" title="Criar uma permissão">
                                <span class="d-lg-none">
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Nova permissão
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="col-3">Permissão</th>
                                <th class="col-6">Descrição</th>
                                <th class="col-2 text-center">Criado em</th>
                                <th class="col-1 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perms as $p)
                            <tr>
                                <td>{{ $p->name }}</td>
                                <td>{{ $p->description }}</td>
                                <td class="text-center">{{ date('d/m/Y', strtotime($p->created_at)) }}</td>

                                <td class="text-center">

                                    @can('admin')
                                    
                                        <a class="btn btn-sm btn-secondary" href="{{ route('permissoes.edit', $p->id) }}" data-toggle="tooltip" title="Detalhes da permissão {{ $p->name }}">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Excluir permissão {{ $p->name }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    
                                    @else
                                    
                                        <a class="btn btn-sm btn-primary" href="{{ route('permissoes.show', $p->id) }}" data-toggle="tooltip" title="Detalhes da permissão {{ $p->name }}">
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

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection