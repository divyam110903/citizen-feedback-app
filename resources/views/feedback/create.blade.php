<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Complaint Registeration') }}
        </h2>
    </x-slot>

    <!-- Include Lottie Player Script -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col-reverse gap-8 lg:flex-row lg:items-center">
                <!-- Form on the Left -->
                <div class="w-full lg:w-1/2 lg:flex-shrink-0 lg:order-1">
                    <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                    <form method="POST" action="{{ route('feedback.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Category -->
                            <div>
                                <x-input-label 
                                    for="category" 
                                    :value="__('Category')" 
                                    class="mb-2 font-medium text-gray-700 dark:text-gray-300" 
                                />
                                <x-text-input 
                                    id="category" 
                                    class="block w-full p-3 transition-all duration-300 border-gray-300 shadow-sm rounded-2xl dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:ring-yellow-400 focus:border-yellow-400 hover:border-yellow-300" 
                                    type="text" 
                                    name="category" 
                                    required 
                                    autofocus 
                                />
                            </div>

                            <!-- Description -->
                            <div class="mt-6">
                                <x-input-label 
                                    for="description" 
                                    :value="__('Description')" 
                                    class="mb-2 font-medium text-gray-700 dark:text-gray-300" 
                                />
                                <textarea 
                                    id="description" 
                                    class="block w-full p-3 transition-all duration-300 border-gray-300 shadow-sm rounded-2xl dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:ring-yellow-400 focus:border-yellow-400 hover:border-yellow-300" 
                                    name="description" 
                                    rows="5" 
                                    required
                                ></textarea>
                            </div>

                            <!-- Location -->
                            <div class="mt-6">
                                <x-input-label 
                                    for="location" 
                                    :value="__('Location')" 
                                    class="mb-2 font-medium text-gray-700 dark:text-gray-300" 
                                />
                                <x-text-input 
                                    id="location" 
                                    class="block w-full p-3 transition-all duration-300 border-gray-300 shadow-sm rounded-2xl dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:ring-yellow-400 focus:border-yellow-400 hover:border-yellow-300" 
                                    type="text" 
                                    name="location" 
                                />
                            </div>

                            <!-- Image -->
                            <div class="mt-6">
                                <x-input-label 
                                    for="image" 
                                    :value="__('Image (optional)')" 
                                    class="mb-2 font-medium text-gray-700 dark:text-gray-300" 
                                />
                                <x-text-input 
                                    id="image" 
                                    class="block w-full p-3 transition-all duration-300 border-gray-300 shadow-sm rounded-2xl dark:border-gray-600 dark:bg-gray-900 dark:text-gray-200 focus:ring-yellow-400 focus:border-yellow-400 hover:border-yellow-300" 
                                    type="file" 
                                    name="image" 
                                />
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-8">
                                <x-primary-button 
                                    class="p-3 font-medium text-gray-900 transition-all duration-300 rounded-full shadow-md bg-white/90 hover:bg-yellow-300 hover:text-black"
                                >
                                    {{ __('Submit Feedback') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Lottie Animation on the Right -->
                <div class="flex items-center justify-center w-full lg:w-1/2 lg:flex-grow lg:order-2">
                    <div class="max-w-md">
                        <dotlottie-player
                            src="https://lottie.host/d9c79f57-d9ac-4de0-8e92-344b425290ae/3h8f0o33UF.lottie"
                            background="transparent"
                            speed="1"
                            style="width: 100%; height: auto; max-width: 400px;"
                            loop
                            autoplay
                        ></dotlottie-player>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>