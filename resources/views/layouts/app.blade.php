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
        <link href="{{ url('css/milligram.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript">
            // Fix for Firefox autofocus CSS bug
            // See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
        </script>
        <script type="text/javascript" src={{ url('js/app.js') }} defer>
        </script>
    </head>
    <body>
        <main>
            <header>
                <h1><a href="{{ url('/home') }}">Console Quest</a></h1>
                    @if (Auth::check())
                        <a class="button" href="{{ url('/shoppingcart') }}"> Shopping Cart </a>
                        <a class="button" href="{{ url('/wishlist') }}"> Wishlist </a>
                        <a class="button" href="{{ url('/logout') }}"> Logout </a> 
                        <a href = "{{ url('/profile') }}"> <span>{{ Auth::user()->username }}</span></a>
                    @else
                        <a class="button" href="{{ url('/login') }}"> Login </a>
                        <a class="button" href="{{ url('/register') }}"> Register </a>
                    @endif
            </header>
            <section id="content">
                @yield('content')
            </section>
        </main>
        <footer>
                <a href=""> About US</a>
                <a href=""> Terms and Conditions </a>
                <a href=""> FAQs </a> 
        </footer>
    </body>
</html>