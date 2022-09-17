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
        <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
        
        <!-- Datatable JS with Bootstrap Interface -->
        <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet" />

        <!-- Select2 CSS -->
        <link href="{{asset('css/select2.min.css')}}" rel="stylesheet" />

        @stack('styles')
    </head>
    <body>
        
        <header>
            @include('layout.header')
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 bg-secondary">
                    @include('layout.menu-dashboard')
                </div>
                <div class="col-md-9 p-5 mb-5">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer>
            @include('layout.footer')
        </footer>
    </body>

    <!-- Jquery JS -->
    <script src="{{asset('js/jquery-3.6.1.js')}}"></script>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Datatable JS with Bootstrap Interface -->
    <script src="{{asset('js/datatables.min.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{asset('js/select2.min.js')}}"></script>

    @stack('scripts')
</html>