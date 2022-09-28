@extends('layouts.admin')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">
            <x-admin.forms.usuario :usuario="$usuario" :perfis="$perfis" :perms="$perms" />
        </div>
    </div>
</div>

@endsection