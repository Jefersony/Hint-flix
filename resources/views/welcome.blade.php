<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel 10</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo asset('css/welcome.css')?>" type="text/css">
        <link rel="stylesheet" href="<?php echo asset('css/home.css')?>" type="text/css">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-300 hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-300 hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Entrar</a>

                        @if (Route::has('register'))
                            <span class="font-semibold text-gray-100 hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">  |  </span>
                            <a href="{{ route('register') }}" class="font-semibold text-gray-300 hover:text-white dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastrar</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <!-- Experipmentar section aqui -->
        <section id="home-page" >
            <div class="bg-image ">
                <div class="home-content container  d-flex justify-content-center">
                    <div class="row ">
                        <div class="col mb-5 home-content--desc">
                            <div class="mb-3">
                                <h2 class=" display-1 relative bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-black"
                                > H i n t f l i x </h2>
                            </div>
                            <div class="button d-flex justify-content-center">
                                <button type="button" class="btn button-canva">Receba dicas de filmes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
