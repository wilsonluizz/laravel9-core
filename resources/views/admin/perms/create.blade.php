@extends('layouts.app')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">
            <x-admin.forms.perms type="create" :perfis="$perfis" />
        </div>
    </div>
</div>

@endsection