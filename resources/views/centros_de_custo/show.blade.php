@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div class="card position-absolute top-50 start-50 translate-middle">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">{{ $centro_de_custo->nome }}</h3>
                        </div>
                        <div class="card-body">
                            
                                <ul class="list-group list-group-flush"> 
                                    <li class="list-group-item">Código: <strong>{{ $centro_de_custo->codigo }}</strong></li>
                                    <li class="list-group-item">Resonsável: <strong>{{ $centro_de_custo->responsavel }}</strong></li>
                                     <li class="list-group-item">Data de criação:  <strong>{{ date('d/m/Y', strtotime($centro_de_custo->created_at)) }}<strong>
                                     </li>
                                </ul>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
