<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $pageName }}</title>
    @vite(['resources/css/app.css', 'resources/js/sidebar_handler.js', 'resources/js/app.js'])
</head>

<body class="flex max-w-screen h-screen max-h-screen bg-gray-50 bg-cover bg-center" style="background-image: radial-gradient(rgba(255,255,255,0.92),rgba(255,255,255,0.92)), url({{ asset('images/hospital.jpg') }})">
    @yield('sidebar')
    <div class="flex flex-col w-full overflow-auto">
        <header class="flex px-8 shrink-0 border-b border-gray-400 h-24 items-center">
            @yield('header')
            <div class="flex max-xl:flex-col ml-auto pl-4">
                <div class="flex text-nowrap items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-[18px] ml-auto">
                        <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path>
                    </svg>: {{ Auth::user()->name }}
                </div>
                <div class="font-semibold ml-1">({{ Auth::user()->email }})</div>
            </div>
            <div class="mx-2">|</div>
            <a href="{{ route('auth.logout') }}" class="hover:underline">Logout</a>
        </header>
        <main class="opacity-0 transition-opacity duration-200">
            @yield('content')
        </main>
    </div>
</body>

</html>