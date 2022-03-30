<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Peer Evaluation - ATEC') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/fo.css') }}" rel="stylesheet">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><img class="logo_topbar" src="{{ asset('img/logo.png') }}" alt="Logo"></a>
                </div>
            </nav>
            @yield('content')
            <footer class="footer mt-auto py-2 px-5">
                <small>Copyright &copy; ATEC - Academia de Formação</small>
            </footer>
        </div>
    </div>
    <!-- feather icon js-->
    <script src="{{ asset('js/feather-icon.js') }}"></script>
</body>

</html>
