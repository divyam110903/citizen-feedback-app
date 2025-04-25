<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sadak Buddy</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script
        src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
        type="module"
    ></script>
</head>

<body class="min-h-screen bg-[#f9fdd7] text-[#1b1b18] flex items-center justify-center px-6 lg:px-12">

    <div class="grid items-center w-full max-w-6xl grid-cols-1 gap-8 lg:grid-cols-2">
        <div class="flex justify-center">
            <dotlottie-player
                src="https://lottie.host/9026a205-eb91-4d0f-b029-c57b3191cd78/DQG09D2cFb.lottie"
                background="transparent"
                speed="1"
                style="width: 600px; height: 600px"
                loop
                autoplay
            ></dotlottie-player>
        </div>

        <!-- Right: Text & CTA -->
        <div class="text-center lg:text-left">
            <h1 class="mb-4 text-4xl font-bold">Sadak Buddy</h1>

            <!-- Typing effect -->
            <p x-data="{
                    text: 'Report. Resolve. Revive Our Roads.',
                    display: '',
                    index: 0,
                    startTyping() {
                        const interval = setInterval(() => {
                            this.display += this.text[this.index++];
                            if (this.index >= this.text.length) clearInterval(interval);
                        }, 70);
                    }
                }"
                x-init="startTyping()"
                x-text="display"
                class="text-lg font-medium mb-8 leading-snug min-h-[3.5rem]">
            </p>

            @if (Route::has('login'))
                <div class="flex justify-center gap-4 lg:justify-start">
                    @auth
                        <!-- Show "Let's Start" button if the user is authenticated -->
                        <a href="{{ url('/dashboard') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-black transition-all duration-200 rounded-full shadow-md bg-lime-500 hover:bg-lime-600">
                            Let’s Start
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <!-- Show "Log In" and "Sign Up" buttons if the user is not authenticated -->
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-white transition-all duration-200 bg-blue-500 rounded-full shadow-md hover:bg-blue-600">
                            Log In
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 font-semibold text-white transition-all duration-200 bg-green-500 rounded-full shadow-md hover:bg-green-600">
                                Sign Up
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>

</body>
</html>