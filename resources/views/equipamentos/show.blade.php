@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                      <h1 class="text-center">{{ $equip->nome }}</h1>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Categoria</strong> {{ $equip->categoria->nome }}</li>
                      <li class="list-group-item"><strong>Tipo</strong> {{ $equip->tipo->tipo }}</li>
                      <li class="list-group-item"><strong>Marca:</strong> {{ $equip->marca->nome }}</li>
                      <li class="list-group-item"><strong>Modelo</strong> {{ $equip->modelo }}</li>
                      <li class="list-group-item"><strong>Centro de custo</strong> {{ $equip->centroDeCusto->nome }}</li>
                      <li class="list-group-item"><strong>Número de série</strong> {{ $equip->numero_serie }}</li><li class="list-group-item"><strong>Localidade</strong>
                       {{ $equip->localidade->nome }} </li>
                      <li class="list-group-item"><strong>Responsável</strong>
                      {{ $equip->responsavel->nome }} </li>
                      <li class="list-group-item"><strong>Número de nota fiscal</strong> {{ $equip->notaFiscal->numero }}</li>
                      <li class="list-group-item"><strong>Descrição do equipamento</strong> {{ $equip->descricao }} </li> 
                      <li class="list-group-item"><Strong>Patrimônio</Strong> {{ $equip->patrimonio }}</li>
                    </ul>
                  </div>
                <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-back"></i></button>
            </div>
        </div>
    </div>
@endsection 