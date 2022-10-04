@extends('layouts.app')


@section('content')
    {{-- <form action="{{ route('centros-de-custo.update', $centro_de_custo->id) }}" method="POST">
    @csrf
@method('put')
    <label for="nome">Nome:</label><input type="text" name="nome" value="{{ $centro_de_custo->nome }}">
    <label for="codigo">Codigo:</label><input type="text" name="codigo" value="{{ $centro_de_custo->codigo }}">
    <label for="email">E-mail:</label><input type="text" name="email" value="{{ $centro_de_custo->responsavel}}">
    <button type="submit">Enviar</button>
   
</form> --}}

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card position-absolute top-50 start-50 translate-middle">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-pencil"></i> Editar centro de custo</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('centros-de-custo.update', $centro_de_custo->id) }}" id="editar" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-row my-2">
                                <div class="row my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control"
                                        value="{{ $centro_de_custo->nome }}"" required>
                                </div>
                                <div class="row my-2">
                                    <input type="text" maxlength="50" name="responsavel" class="form-control"
                                        value="{{ $centro_de_custo->responsavel }}" required>
                                </div>
                                <div class="row my-2">
                                    <input type="text   " name="codigo" class="form-control"
                                        value="{{ $centro_de_custo->codigo }}" required>
                                </div>
                            </div>

                        </form>

                        <form action="{{ route('centros-de-custo.destroy', $centro_de_custo->id) }} " id="apagar" method="POST">
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
