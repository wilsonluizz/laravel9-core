@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Adicionar responsável</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('responsaveis.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-4 my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control" placeholder="Nome" required>
                                </div>
                                <div class="col-4 my-2">
                                    <input type="text" maxlength="50" name="matricula" class="form-control" placeholder="matricula" required>
                                </div>
                                <div class="col-4 my-2">
                                    <input type="email" name="email" class="form-control" placeholder="email" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-check"></i></button>
                            
                            <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-back"></i></button>
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection