@extends('layouts.app')


@section('content')
    <div class="container">

        <div class="row">
            <div class="col-8">
                <div class="card position-absolute top-50 start-50 translate-middle">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-pencil"></i> Editar Localidade</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('localidades.update', $local->id) }}" id="editar" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-row my-2">
                                <div class="row my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control"
                                        value="{{ $local->nome }}"" required>
                                </div>
                                <div class="row my-2">
                                    <input type="text" maxlength="50" name="cidade" class="form-control"
                                        value="{{ $local->cidade }}" required>
                                </div>
                                <div class="row my-2">
                                    <input type="text" maxlength="2" name="uf" class="form-control"
                                        value="{{ $local->uf }}" required>
                                </div>
                            </div>

                        </form>

                        <form action="{{ route('localidades.destroy', $local->id) }} " id="apagar" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>

                        <button form="editar" type="submit" class="btn btn-primary mt-3"><i class="bi bi-check"></i></button>

                        
                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-back"></i></button>
                        

                        <button form="apagar" type="submit" class="btn btn-danger delete-btn mt-3"><i class="bi bi-trash"></i></button>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection