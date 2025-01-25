<!DOCTYPE html>
<html>

<head>
    <title>TW Group Coworking</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <section id="app" class="bg-gradient-primary">
        @yield('content')
    </section>
    @vite(['resources/js/app.js'])
</body>

</html>