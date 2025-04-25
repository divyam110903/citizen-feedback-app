<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <div class="p-8 bg-white shadow-xl rounded-2xl dark:bg-gray-800">
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="flex flex-col items-center justify-center mb-8">
                    <div class="relative w-32 h-32 mb-4 overflow-hidden border-4 border-yellow-300 rounded-full shadow-lg">
                        <img src="{{ asset('/images/default-profile.png') }}" alt="User Profile" class="object-cover w-full h-full">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $user->name }}</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-300">{{ $user->email }}</p>
                </div>

                <form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block w-full mt-1" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                    </div>

                    <div class="flex items-center justify-end">
                        <x-primary-button class="px-4 py-2 font-semibold text-black bg-yellow-400 shadow-md hover:bg-yellow-500 rounded-xl">
                            {{ __('Update Profile') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>