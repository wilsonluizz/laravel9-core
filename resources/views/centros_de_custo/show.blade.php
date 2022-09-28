@extends('layouts.app')

@section('content')
    @if ($centro_de_custo)
        <ul>
            <li>{{ $centro_de_custo->nome }}</li>
            <li>{{ $centro_de_custo->codigo }}</li>
        </ul>
        <a class="btn btn-sm btn-danger" href="" data-toggle="tooltip"
            title="">
            <i class="bi bi-trash"></i>
        </a>
    @else
        <p>Centro de custo não encontrado</p>
    @endif
@endsection
