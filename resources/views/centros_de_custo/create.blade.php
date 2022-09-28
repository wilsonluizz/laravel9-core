@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card position-absolute top-50 start-50 translate-middle">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Criar novo centro de custo</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('centros-de-custo.store') }}" method="POST">
                            @csrf
                            <div class="form-row my-2">
                                <div class="row my-2">
                                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                                </div>
                                <div class="row my-2">
                                    <input type="text" name="responsavel" class="form-control" placeholder="Responsavel">
                                </div>
                                <div class="row my-2">
                                    <input type="text" name="codigo" class="form-control" placeholder="Codigo">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Criar</button>
                            <a class="btn btn-sm btn-danger mt-3" href="{{ route('centros-de-custo.index') }}">Desistir</a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
