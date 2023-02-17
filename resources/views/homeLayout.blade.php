<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$data['_MetaTitle']}}</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('includes.css')
    <!-- // for page specific stylesheet -->
    @yield('styles')
</head>

<body>
    @include('includes.header')
    <!-- poplogin -->

    @include('includes.popuplogin')
    <!-- poplogin end -->
    <!-- poplanguage -->
    @include('includes.popuplanguage')
    <!-- poplanguage end -->
    <!-- Page Content Start-->
    @yield('pageContent')
    <!-- Page Content End -->

    @include('includes.footer')
    @include('includes.js')
    <!-- // for page specific script -->
    @yield('scripts')
</body>

</html>