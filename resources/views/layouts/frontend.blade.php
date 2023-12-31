<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/trangchu/trangchu.css') }}">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}">


    @yield('css')
    <title>Document</title></head>
<body>
@include('partials.frontend.header')

@yield('content')
@if(!isset($hideFooter) || !$hideFooter)
    @include('partials.frontend.footer')
@endif
@yield('js')
</body>
</html>
