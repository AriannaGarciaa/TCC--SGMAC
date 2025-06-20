<!DOCTYPE html>
<html lang="pt-BR">    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>PINGO- Sistema de Gerenciamento de Manutenções de Ar-Condicionado</title>

        <!-- Favicon -->
        <link rel="icon" type="imgs/png" href="{{ asset('imgs/penguin.png') }}">
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-black-100">
        <div class="min-h-screen bg-blue-900">
            @include('layouts.navigation')
    
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-black shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-blck-900 font-semibold">
                        {{ $header }}
                    </div>
                </header>
            @endisset
    
            <!-- Page Content -->
            <main class="bg-gray-100 min-h-screen">
                @if (isset($slot))
                    {{ $slot }}  <!-- Suporta componentes do Breeze -->
                @else
                    @yield('content')  <!-- Suporta views tradicionais -->
                @endif
            </main>
        </div>
    </body>
</html>
