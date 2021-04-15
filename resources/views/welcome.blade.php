<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HAHNEMANN</title>
    <!-- Fonts -->

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            <a href="{{ url('/usuarios') }}">User</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif
        <section class="b1">
            <div class="in1">
                <div class="top-left links2">
                    <a>HAHNEMANN</h1>
                </div>
            </div>

        </section>
        
    </div>


</body>

</html>