<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Prueba BRM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <section class="container">
            <article class="row mt-2">
                <section class="col-lg-12">
                    <h1 class="text-center">
                        Sistema de inventario
                    </h1>
                </section>
            </article>
            <article class="row d-flex justify-content-center mt-3 text-center border-bottom pb-2">
                <section class="col-lg-6">
                    <a href="{{ route('createProduct') }}"><h5>Formulario para proveedor</h5></a>
                </section>
                <section class="col-lg-6">
                    <a href="{{ route('createSale') }}"><h5>Formulario para cliente</h5></a>
                </section>
            </article>
        </section>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
