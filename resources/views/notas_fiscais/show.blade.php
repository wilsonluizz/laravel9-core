@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="text-center">N.° {{ $nota_fiscal->numero }}</h3>
                    </div>
                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Valor: <strong>R$ {{  $nota_fiscal->valor }}</strong></li>
                            <li class="list-group-item">SC. origem: <strong>{{ $nota_fiscal->sc_origem }}</strong>
                            </li>
                            <li class="list-group-item">Data de Emissão:
                                <strong>{{ date('d/m/Y', strtotime($nota_fiscal->data_emissao)) }}<strong>
                            </li>
                        </ul>

                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-reply-fill"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection