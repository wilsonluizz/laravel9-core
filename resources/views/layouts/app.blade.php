<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @if(request()->is(['admin*'])) ADM | @endif
            {{ config('app.name') }}
        </title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
        <script data-pace-options='{ "eventLag": false }' src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>

        {{-- JQUERY SLIM --}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script> --}}

        {{-- POPPER --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}
    </head>

    <body>

        {{-- Navegação geral, caso tenha realizado Login --}}
        <div class="pb-5">
            @auth <x-navegacao /> @endauth
        </div>

        {{-- Navegação administrativa, caso tenha permissão de administrador e esteja na rota correta --}}
        @can('admin')
            @if(request()->is(['admin*']))
                <div class="position-fixed vh-100 overflow-auto">
                    <x-navegacao_admin />
                </div>
            @endif
        @endcan
        
        {{-- Conteúdo principal --}}
        <div class="container-fluid pt-5">
            <div id="app" class="offset-md-1 col-md-10">
                @yield('content')
            </div>
        </div>

        {{-- Área de exibição das Toasts --}}
        <div class="toast-container position-fixed bottom-0 end-0 p-3">

            {{-- Mensagens de notificação --}}
            @if(session('message'))
                <x-toaster style="{{ session('style') }}" message="{{ session('message') }}" />
            @endif

            {{-- Mensagens de erros de validação --}}
            @if (count($errors) > 0)
                @foreach ($errors->all() as $e)
                    <x-toaster style="warning" message="{{ $e }}" />
                @endforeach
            @endif

        </div>

    </body>

{{-- 
    TODO: Revisar scripts Popover; Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
--}}

</html>