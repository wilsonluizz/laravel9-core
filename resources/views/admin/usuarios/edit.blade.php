@extends('layouts.admin')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">
            <x-admin.forms.usuario type="edit" :usuario="$usuario" :perfis="$perfis" />
        </div>
    </div>
</div>

@endsection