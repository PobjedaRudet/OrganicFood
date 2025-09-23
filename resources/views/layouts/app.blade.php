<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.header')
</head>
<body>
   @include('partials.menu')
    @yield('content')
    @include('partials.footer')
</body>
</html>
