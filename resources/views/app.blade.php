<!DOCTYPE html>
<html>

<head>
    <title>TW Group Coworking</title>
    @vite('resources/sass/app.scss')
</head>

<body>
    <div id="app">
        @yield('content')
    </div>
    @vite('resources/js/app.js')
</body>

</html>