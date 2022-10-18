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
                            <div class="row my-2">
                                <div class="col-3 my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control"
                                        value="{{ $local->nome }}"" required>
                                </div>
                                <div class="col-3 my-2">
                                    <input type="text" maxlength="50" name="cidade" class="form-control"
                                        value="{{ $local->cidade }}" required>
                                </div>
                                <div class="col-3 ">
                                    <select name="select_uf" class="form-select my-2" id="select_uf"
                                        aria-label="Floating label select example">
                                        <option selected>Selecione UF</option>
                                        @foreach ($ufs as $uf)
                                            <option value="{{ $uf->id }}"  {{ $uf->id == $local->uf->id ? 'selected' : '' }} >{{ $uf->uf }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3 my-2">
                                    <input type="text" maxlength="50" name="cep" class="form-control"
                                        value="{{ $local->cep }}">
                                </div>
                            </div>

                        </form>

                        

                        <button form="editar" type="submit" class="btn btn-primary mt-3"><i class="bi bi-check"></i></button>

                        
                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-back"></i></button>
                        

                        <button type="button" class="btn btn-danger delete-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
                {{-- modal --}}
                <form action="{{ route('localidades.destroy', $local->id) }} " id="apagar" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Você está prestes a excluir esta localidade</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4>Tem certeza que deseja apagar esta localidade?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i
                                    class="bi bi-back"></i></button>
                                <button type="submit" form="apagar" type="button" class="btn btn-danger delete-btn"><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection