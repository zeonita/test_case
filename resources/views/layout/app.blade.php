<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap CSS -->
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        
        @stack('styles')
    </head>
    <body>
        
        <header>
            @include('layout.header')
        </header>

        <div class="container my-3">
            @yield('content')
        </div>

        <footer>
            @include('layout.footer')
        </footer>
    </body>

    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    @stack('scripts')
</html>