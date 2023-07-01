<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token">

    <title>UserLaundry | {{ $judul }}</title>
    @include('user.layout.css')
    <!--

Tooplate 2132 Clean Work

https://www.tooplate.com/view/2132-clean-work

Free Bootstrap 5 HTML Template

-->
</head>

<body>

    @include('user.layout.header')


    <main>
        @yield('content')
    </main>


    @include('user.layout.footer')

    @include('user.layout.js')
    @include('sweetalert::alert')

</body>

</html>
