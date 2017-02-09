<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
    @include('layouts.header')
        <style>
            @include('layouts.styles.default')
        </style>
    </head>
    <body>
    @include('layouts.menu')
        @yield('content')
    @include('layouts.footer')
    </body>
</html>
