@extends('layouts.app')


@section('content')
<form action="{{ route('centros-de-custo.update', $centro_de_custo->id) }}" method="POST">
    @csrf
@method('put')
    <label for="nome">Nome:</label><input type="text" name="nome" value="{{ $centro_de_custo->nome }}">
    <label for="codigo">Codigo:</label><input type="text" name="codigo" value="{{ $centro_de_custo->codigo }}">
    <label for="email">E-mail:</label><input type="text" name="email" value="{{ $centro_de_custo->responsavel}}">
    <button type="submit">Enviar</button>
   
</form>
@endsection