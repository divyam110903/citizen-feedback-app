<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Split Screen Design</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script
        src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
        type="module"
    ></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Left Side - Animation -->
        <div class="w-full md:w-2/5 flex items-center justify-center p-6">
            <div class="relative w-full max-w-sm flex items-center justify-center">
                <dotlottie-player
                    src="https://lottie.host/42f73a0a-4996-4d80-8954-664b35ed8489/cuAX1a0VZW.lottie"
                    background="transparent"
                    speed="1"
                    style="width: 300px; height: 300px"  
                    loop
                    autoplay
                ></dotlottie-player>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100">
                    @csrf
                    
                    <!-- Title with decorative element -->
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Welcome Back</h2>
                        <div class="mt-2 w-20 h-1 bg-lime-500 mx-auto rounded-full"></div>
                        <p class="mt-3 text-gray-500">Log in to your account</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative rounded-xl shadow-sm">
                            <x-text-input id="email" class="block w-full pl-3 py-3 border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-xl" type="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative rounded-xl shadow-sm">
                            <x-text-input id="password" class="block w-full py-3 border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-xl" type="password" name="password" required placeholder="Enter your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between mt-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-lime-600 shadow-sm focus:ring-lime-500">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        <a class="text-sm text-lime-600 hover:text-lime-700" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>

                    <!-- Submit -->
                    <div class="mt-8">
                        <x-primary-button class="w-full justify-center bg-lime-500 hover:bg-lime-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                    <!-- Register -->
                    <div class="mt-6 text-center text-sm">
                        <span class="text-gray-600">Don't have an account?</span>
                        <a href="{{ route('register') }}" class="ml-1 font-medium text-lime-600 hover:text-lime-700 transition-colors duration-200">
                            Register
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>