@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-receipt-cutoff"></i> Adicionar nota fiscal</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('notas-fiscais.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-3 my-2">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" maxlength="50" name="numero" class="form-control" placeholder="Digite o número" required value="{{ old('numero') }}">
                                </div>
                                <div class="col-3 my-2">
                                    <label for="numero" class="form-label">Valor</label>
                                    <input type="text" maxlength="50" name="valor" class="form-control" placeholder="Digite o valor" required value="{{ old('valor') }}">
                                </div>
                                <div class="col-3 my-2">
                                    <label for="numero" class="form-label">SC. origem</label>
                                    <input type="text" name="sc_origem" class="form-control" placeholder="SC origem" required
                                    value="{{ old('sc_origem') }}">
                                </div>
                                <div class="col-3 my-2">
                                    <label for="numero" class="form-label">Data de emissão</label>
                                    <input type="date" name="data_emissao" class="form-control" placeholder="Data de emissão" required
                                    value="{{ old('data_emissao') }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-check"></i></button>
                            
                            <a class="btn btn-info mt-3" href="{{ route('notas-fiscais.index') }}">
                                <i class="bi bi-reply-fill"></i>
                            </a> 
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection