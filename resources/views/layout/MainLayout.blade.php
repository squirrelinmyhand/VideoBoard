<!doctype html>
<html>
    <head>
        @include('include.head')
    </head>
    <body>
        @include('include.header')
        <div class="container">
            <header class="row">
                
            </header>
            <div id="mainBox">
                <div id="accountBox" class="row">
                    @yield('')
                </div>
                <div id="contentBox" class="row">
                    @yield('content')
                </div>
            </div>
            <footer class="row">
                {{-- @include('include.footer') --}}
            </footer>
        </div>
    </body>
</html>