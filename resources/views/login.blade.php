<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex overflow-auto items-center bg-gradient-to-br from-gray-300 to-50%">
    <aside class="flex h-screen px-16 overflow-y-auto bg-cover text-white shadow-xl shadow-black" style="background-image: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.7)),url({{ asset('images/hospital.jpg') }})">
        <div class="my-auto py-16">
            <h1 class="text-5xl font-bold">Rumah Sakit <span class="text-amber-500">Pelni</span></h1>
            <div class="text-2xl font-bold text-white/80">SIM Layanan</div>
            <div class="font-semibold text-white/70">ISO <span class="text-amber-500/70">270001</span></div>
            <p class="mt-8 text-white/80">
                Aliquip ut pariatur elit sit. Est do excepteur qui non enim deserunt. Elit pariatur sit dolor dolor incididunt laborum cupidatat. Consectetur do adipisicing culpa voluptate in. Non consequat commodo veniam culpa duis esse cillum reprehenderit exercitation consequat officia non.
                <br><br>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, tempora. Repellat dolorum dignissimos aliquam tempora pariatur aspernatur blanditiis aliquid facere quam aperiam? Amet vero ipsa, tempora ipsam commodi cupiditate consequatur.
            </p>
        </div>
    </aside>
    <form method="post" class="flex shrink-0 flex-col justify-center h-screen w-lg px-9 pb-9">
        @csrf
        @method('get')
        <h1 class="text-3xl">Login</h1>
        <label for="" class="mt-2">Username</label>
        <input name="name" type="text" placeholder="You can use your email too" required class="border-2 border-gray-500 py-2 px-3 rounded">
        <label for="" class="mt-2">Password</label>
        <input name="password" type="password" required class="border-2 border-gray-500 py-2 px-3 rounded">
        @if (session('loginFailed') === true)
            <div class="px-4 py-3 mt-3 rounded border-2 bg-red-500/50 border-red-800">
                Wrong Username or Password!
            </div>
        @endif
        <button class="py-2 mt-4 border-2 border-gray-800 bg-gray-300 hover:bg-gray-800 hover:text-white rounded cursor-pointer">Login</button>
        <span>forgot your password? <a href="" class="text-indigo-500 hover:text-purple-800">reset here</a></span>
    </form>
</body>

</html>
