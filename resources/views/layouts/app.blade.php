<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageName }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex max-w-screen h-screen max-h-screen bg-gray-50">
    @yield('sidebar')
    <div class="flex flex-col w-full overflow-auto">
        <header class="flex px-8 shrink-0 border-b border-gray-400 h-24 items-center">
            @yield('header')
        </header>
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>
