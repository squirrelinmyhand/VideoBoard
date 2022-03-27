<!doctype html>
<html>
    <head>
        @include('include.head')
    </head>
    <body>
        <header>
            @include('include.header')
        </header>    
        <div class="container">
            <header class="row">
                
            </header>
            <div id="main" class="row">
                @yield('content')
            </div>
            <footer class="row">
                {{-- @include('include.footer') --}}
            </footer>
        </div>
    </body>
</html>