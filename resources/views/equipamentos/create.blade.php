@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Novo Equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_create" action="{{ route('equipamentos.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Nome</label>
                                <input type="text" minlength="4" maxlength="50" class="form-control" name="nome"
                                    placeholder="Nome" required>
                            </div>
                            <div class="col-md-3">
                                <label for="select_categoria" class="form-label">Categoria</label>
                                <select name="select_categoria" class="form-select" id="select_categoria"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione Categoria</option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="select_tipo" class="form-label">Tipo</label>
                                <select name="select_tipo" class="form-select" id="select_tipo"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione o tipo</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->tipo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label for="select_marca" class="form-label">Marca</label>
                                <select name="select_marca" class="form-select" id="select_marca"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="select_cc" class="form-label">Centro de custo</label>
                                <select name="select_cc" class="form-select" id="select_cc"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione o centro de custo</option>
                                    @foreach ($centro_de_custo as $cc)
                                        <option value="{{ $cc->id }}">{{ $cc->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="numero_serie" class="form-label">Número de série</label>
                                <input type="text" minlength="5" maxlength="20" name="numero_serie" class="form-control"
                                    placeholder="Número de série" required>
                            </div>
                            <div class="col-3">
                                <label for="modelo" class="form-label">Modelo do equipamento</label>
                                <input type="text" minlength="5" maxlength="20" name="modelo" class="form-control"
                                    placeholder="Modelo do equipamento" required>
                            </div>
                            <div class="col-md-6">
                                <label for="select_local" class="form-label">Localidade</label>
                                <select name="select_local" class="form-select" id="select_local"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione a Localidade</option>
                                    @foreach ($localidades as $local)
                                        <option value="{{ $local->id }}">{{ $local->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="select_resp" class="form-label">Responsável</label>
                                <select name="select_resp" class="form-select" id="select_resp"
                                    aria-label="Floating label select example">
                                    <option selected>Selecione responsável pelo equipamento</option>
                                    @foreach ($responsavel as $resp)
                                        <option value="{{ $resp->id }}">{{ $resp->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="select_nota_fiscal" class="form-label">Número de nota fiscal</label>
                                <select name="select_nota_fiscal" class="form-select" id="select_nota_fiscal"
                                    aria-label="Floating label select example">
                                    <option selected>Nota fiscal do equipamento</option>
                                    @foreach ($notafiscal as $nota)
                                        <option value="{{ $nota->id }}">{{ $nota->numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="descricao" class="form-label">Descreva os detalhes do equipamento</label>
                                <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="patrimonio" class="form-label">Patrimônio</label>
                                <input type="text" class="form-control" name="patrimonio" placeholder="Se o equipamento for patrimoniado, digite o codigo aqui">
                            </div>
                            
                            <div class="col-12">
                                <button form="form_create" type="submit" class="btn btn-primary mt-3"><i
                                        class="bi bi-check"></i></button>
                                <button onclick="javascript:history.back(-1) " type="button"
                                    class="btn btn-info mt-3"><i class="bi bi-back"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
