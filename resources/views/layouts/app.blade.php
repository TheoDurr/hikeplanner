<html>
<head>
    <title>Hike planner</title>
    @vite('resources/css/app.css')

    @livewireStyles
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>
