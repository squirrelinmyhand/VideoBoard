<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- css --}}
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/header.css') }}" rel="stylesheet">

{{-- js --}}
<script src='{{ asset('external/jquery.js') }}'></script>
<title>@yield('TabTitle')</title>
