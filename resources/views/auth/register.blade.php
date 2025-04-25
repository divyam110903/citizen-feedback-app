<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Split Screen Design</title>
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
  src="https://lottie.host/88bf7c84-966d-491d-8107-52942a71e2b4/8iApnH8luM.lottie"
  background="transparent"
  speed="1"
  style="width: 300px; height: 300px"
  loop
  autoplay
></dotlottie-player>
            </div>
        </div>

        <!-- Right Side - Registration Form -->
        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <form method="POST" action="{{ route('register') }}" class="bg-white p-8 rounded-2xl shadow-lg space-y-6 border border-gray-100">
                    @csrf
                    
                    <!-- Title with decorative element -->
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-800 tracking-tight">Create an Account</h2>
                        <div class="mt-2 w-20 h-1 bg-lime-500 mx-auto rounded-full"></div>
                        <p class="mt-3 text-gray-500">Please sign up to create a new account</p>
                    </div>
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative rounded-xl shadow-sm">
                            <x-text-input id="name" class="block w-full py-3 border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-xl" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative rounded-xl shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <x-text-input id="email" class="block w-full pl-10 py-3 border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-xl" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative rounded-xl shadow-sm">
                            <x-text-input id="password" class="block w-full py-3 border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-xl" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-700 font-medium" />
                        <div class="mt-1 relative rounded-xl shadow-sm">
                            <x-text-input id="password_confirmation" class="block w-full py-3 border-gray-300 focus:border-lime-500 focus:ring-lime-500 rounded-xl" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500" />
                    </div>
            
                    <!-- Submit Button -->
                    <div class="mt-8">
                        <x-primary-button class="w-full justify-center bg-lime-500 hover:bg-lime-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                    
                    <!-- Login Link -->
                    <div class="mt-6 text-center text-sm">
                        <span class="text-gray-600">Already have an account?</span>
                        <a href="{{ route('login') }}" class="ml-1 font-medium text-lime-600 hover:text-lime-700 transition-colors duration-200">
                            Log in
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add animation keyframes for the blob animation -->
    <style>
        @keyframes blob {
            0% {
                transform: scale(1);
            }
            33% {
                transform: scale(1.1) translateX(10%) translateY(-10%);
            }
            66% {
                transform: scale(0.9) translateX(-10%) translateY(10%);
            }
            100% {
                transform: scale(1);
            }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</body>
</html>