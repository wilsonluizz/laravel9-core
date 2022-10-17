@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Editar Equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_create" action="{{ route('equipamentos.update', $equip->id) }}" method="POST"
                            class="row g-3">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Nome</label>
                                <input type="text" value="{{ $equip->nome }}" minlength="4" maxlength="50"
                                    class="form-control" name="nome" required>
                            </div>
                            <div class="col-md-3">
                                <label for="select_categoria" class="form-label">Categoria</label>
                                <select name="select_categoria" class="form-select" id="select_categoria"
                                    aria-label="Floating label select example">
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}"
                                            {{ $cat->id == $equip->categoria->id ? 'selected' : '' }}>{{ $cat->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="select_tipo" class="form-label">Tipo</label>
                                <select name="select_tipo" class="form-select" id="select_tipo"
                                    aria-label="Floating label select example">
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}"
                                            {{ $tipo->id == $equip->tipo->id ? 'selected' : '' }}>{{ $tipo->tipo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="select_marca" class="form-label">Marca</label>
                                <select name="select_marca" class="form-select" id="select_marca"
                                    aria-label="Floating label select example">
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="select_cc" class="form-label">Centro de custo</label>
                                <select name="select_cc" class="form-select" id="select_cc"
                                    aria-label="Floating label select example">
                                    @foreach ($centro_de_custo as $cc)
                                        <option value="{{ $cc->id }}"
                                            {{ $cc->id == $equip->id_centro_de_custo ? 'selected' : '' }}>
                                            {{ $cc->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="numero_serie" class="form-label">Número de série</label>
                                <input type="text" value="{{ $equip->numero_serie }}" minlength="5" maxlength="20"
                                    name="numero_serie" class="form-control" placeholder="Número de série" required>
                            </div>
                            <div class="col-3">
                                <label for="modelo" class="form-label">Modelo do equipamento</label>
                                <input type="text" value="{{ $equip->modelo }}" minlength="5" maxlength="20"
                                    name="modelo" class="form-control" placeholder="Modelo do equipamento" required>
                            </div>
                            <div class="col-md-6">
                                <label for="select_local" class="form-label">Localidade</label>
                                <select name="select_local" class="form-select" id="select_local"
                                    aria-label="Floating label select example">
                                    @foreach ($localidades as $local)
                                        <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="select_resp" class="form-label">Responsável</label>
                                <select name="select_resp" class="form-select" id="select_resp"
                                    aria-label="Floating label select example">
                                    @foreach ($responsavel as $resp)
                                        <option value="{{ $resp->id }}">{{ $resp->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="select_nota_fiscal" class="form-label">Número de nota fiscal</label>
                                <select name="select_nota_fiscal" class="form-select" id="select_nota_fiscal"
                                    aria-label="Floating label select example">
                                    @foreach ($notafiscal as $nota)
                                        <option value="{{ $nota->id }}">{{ $nota->numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="descricao" class="form-label">Descreva os detalhes do equipamento</label>
                                <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $equip->descricao }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="patrimonio" class="form-label">Patrimônio</label>
                                <input type="text" class="form-control" name="patrimonio" value="{{ $equip->patrimonio }}">
                            </div>

                        </form>
                        


                        <button form="form_create" type="submit" class="btn btn-primary mt-3"><i class="bi bi-check"></i></button>

                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-back"></i></button>

                        <button type="button" class="btn btn-danger delete-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>

                        {{-- modal --}}
                        <form action="{{ route('equipamentos.destroy', $equip->id) }} " id="apagar" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Você está prestes a excluir este equipamento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Tem certeza que deseja apagar este equipamento? </h4>
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
        </div>
    </div>
@endsection
