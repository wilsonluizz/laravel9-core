<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ADM | {{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        
        {{-- 
        Estilos
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('css/navegacao_admin.css') }}" rel="stylesheet"> 
        --}}
        
    </head>

    <body>
        <div class="pb-5">
            <x-navegacao />
        </div>

        <div class="position-fixed vh-100 overflow-auto">
            <x-navegacao_admin />
        </div>
        
        <div class="container-fluid pt-5">
            <div id="app" class="ps-sm-5 ms-sm-4">
                @yield('content')
            </div>
        </div>

            {{-- 
                TOASTS
                TODO Revisar TOASTS 
            --}}

            <div style="position: absolute; bottom: 10px; right: 10px">

                {{-- Mensagens genéricas de callback --}}
                @if(Session::has('mensagem'))
                <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-body {{ Session::get('estilo') }} text-white">
                        {{ Session::get('mensagem') }}
                        <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif

                {{-- Mensagens de erro --}}
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $erro)
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-body bg-danger text-white">
                            {{ $erro }}
                            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

        </div>
    </body>

{{-- 
    TODO Revisar scripts
    Scripts 
--}}
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}

{{-- Scripts customizados, se houver
@hasSection ('scripts')
    @yield('scripts')
@endif --}}

{{-- Scripts comuns --}}
{{-- <script>
    $('.navegacao_admin').hover(function(e) {
        $('.navegacao_admin').toggleClass('collapsed');
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
    // Controle dos toasts
    $('.toast').toast({ delay: 3000 }).toast('show');
</script> --}}
</html>