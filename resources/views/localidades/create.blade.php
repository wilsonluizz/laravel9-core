@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Nova Localidade</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form id="form_create" action="{{ route('localidades.store') }}" method="POST">
                            @csrf
                            <div class="row my-2">
                                <div class="col-4 my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control"
                                        placeholder="Nome" required>
                                </div>
                                <div class="col-4 my-2">
                                    <input type="text" maxlength="50" name="cidade" class="form-control"
                                        placeholder="cidade" required>
                                </div>
                                <div class="col-4 my-2">

                                    <x-selectUf />

                                    {{-- <select name="select_uf" class="form-select my-2" id="select_uf"
                                        aria-label="Floating label select example">
                                        <option selected>Selecione UF</option>
                                        @foreach ($ufs as $uf)
                                            <option value="{{ $uf->id }}">{{ $uf->uf }}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>

                            <button form="form_create" type="submit" class="btn btn-primary mt-3"><i
                                    class="bi bi-check"></i></button>

                            <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i
                                    class="bi bi-back"></i></button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
