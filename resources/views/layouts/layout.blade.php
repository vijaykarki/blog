<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    @include('partials.navigation')

    @yield('content')

    @include('partials.footer')
</body>
</html>
