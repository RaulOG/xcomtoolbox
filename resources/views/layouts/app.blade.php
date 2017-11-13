<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/dropdown.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/transition.css" rel="stylesheet">

    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">


    <style>
        .item {
            font-size: 14px !important;
        }

        .ui.selection.dropdown .menu {
            max-height: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
</head>
<body>
<div id="app">
    <nav class="navbar">
        <div class="container">
            <!-- Branding Image -->
            <a class="link link--logo" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <!-- User actions -->
            @if(\Illuminate\Support\Facades\Auth::check())

            <!-- Pods -->
            <a class="link link--button" href="{{ url('/pods') }}">
                Pods
            </a>
            @endif
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://use.fontawesome.com/fa2b67b41a.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/dropdown.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/transition.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
@section('javascript')
@show
</body>
</html>
