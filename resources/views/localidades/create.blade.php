@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card position-absolute top-50 start-50 translate-middle">
                <div class="card-header pb-1">
                    <div>
                        <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Nova Localidade</h3>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <form id="form_create" action="{{ route('localidades.store') }}" method="POST">
                        @csrf
                        <div class="form-row my-2">
                            <div class="row my-2">
                                <input type="text" maxlength="50" name="nome" class="form-control" placeholder="Nome">
                            </div>
                            <div class="row my-2">
                                <input type="text" maxlength="50" name="cidade" class="form-control" placeholder="cidade">
                            </div>
                            <div class="row my-2">
                                <input type="text" maxlength="2" name="uf" class="form-control" placeholder="UF" required>
                            </div>
                        </div>

                        <button form="form_create" type="submit" class="btn btn-primary mt-3"><i class="bi bi-check"></i></button>
                        
                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-back"></i></button>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection