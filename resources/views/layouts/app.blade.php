<!DOCTYPE html>
<html lang="en">
    <head>
    @include('layouts.header')
        <style>
            @include('layouts.style')
        </style>
    </head>
    <body>
        @yield('content')
    @include('layouts.footer')
    </body>
</html>
