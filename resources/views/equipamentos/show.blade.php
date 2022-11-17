@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                      <h1 class="text-center">{{ $equip->nome }}</h1>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><strong>Categoria: </strong> {{ $equip->categoria->categoria }}</li>
                          <li class="list-group-item"><strong>Tipo</strong> {{ $equip->tipo->tipo }}</li>
                          <li class="list-group-item"><strong>Marca:</strong> {{ $equip->marca->marca }}</li>
                          <li class="list-group-item"><strong>Modelo: </strong> {{ $equip->modelo }}</li>
                          <li class="list-group-item"><strong>Centro de custo: </strong> {{ $equip->centroDeCusto->nome }}</li>
                          <li class="list-group-item"><strong>Número de série: </strong> {{ $equip->numero_serie }}</li><li class="list-group-item"><strong>Localidade: </strong>
                           {{ $equip->localidade->nome }} </li>
                          <li class="list-group-item"><strong>Responsável: </strong>
                          {{ $equip->responsavel->nome }} </li>
                          <li class="list-group-item"><strong>Número de nota fiscal: </strong> {{ $equip->notaFiscal->numero }}</li>
                          <li class="list-group-item"><strong>Descrição do equipamento: </strong> {{ $equip->descricao }} </li>
                          <li class="list-group-item"><Strong>Patrimônio: </Strong> @empty($equip->patrimonio)
                              Equipamento não possui patrimônio
                          @endempty {{ $equip->patrimonio }}</li>
                        </ul>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header">
                        <h2 class="text-center">Movimentações</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover align-middle">
                            <thead>
                                
                                <th>Tipo de movimentação</th>
                                <th>Motivo</th>
                                <th>Responsável</th>
                                <th>Data</th>
                            </thead>
                            <tbody>
                                @foreach ($equip->movimentacao as $movimentacao)
                                    <tr>
                                        <td>{{ $movimentacao->tipoMovimentacao->tipo }}</td>
                                        <td>{{ $movimentacao->motivo_movimentacao }}</td>
                                        <td>{{ $movimentacao->responsavel->name }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($movimentacao->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info my-3"><i class="bi bi-reply-fill"></i></button>
                <a class="btn  btn-primary my-3" href="{{ route('historicos.index', $equip->id) }}" data-toggle="tooltip" title="Editar {{ $equip->name }}">
                    <i class="bi bi-clock-history"></i>
                </a> 
            </div>
        </div>
    </div>
@endsection 