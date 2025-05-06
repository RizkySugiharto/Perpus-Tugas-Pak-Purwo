<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css'])
    </head>
    <body class="bg-gradient-to-b from-black to-primary from-20% flex items-center justify-center min-h-screen font-comic-sans">
        <div class="bg-secondary p-6 rounded-md shadow-primary shadow-[0_0_20px_7px]">
            <h1 class="text-white font-funtastic text-center text-2xl">Login Form</h1>
            <form action="login" method="post" class="flex flex-col mt-6 space-y-3">
                @csrf
                <div class="space-y-1 flex flex-col">
                    <label for="email" class="text-white">Email: </label>
                    <input type="email" name="email" id="email" onkeypress="moveToNextInputFieldOnEnter" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
                </div>
                <div class="space-y-1 flex flex-col">
                    <label for="password" class="text-white">Password: </label>
                    <input type="password" name="password" id="password" class="caret-black text-black bg-white rounded-sm text-[20px] p-1 px-3">
                </div>
                <button class="bg-primary hover:opacity-90 hover:outline-white hover:outline-3 rounded-md mt-7 text-white p-3 font-funtastic text-[18px]">Login</button>
            </form>
        </div>
    </body>
</html>
