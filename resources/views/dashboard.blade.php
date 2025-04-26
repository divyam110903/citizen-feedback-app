<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Welcome Back!👋') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-8">
        <div class="max-w-xl mx-auto mb-12">
            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                <!-- Carousel Component -->
                <div 
                    x-data="{
                        currentSlide: 0,
                        slides: [
                            { 
                                image: '/images/a.png', 
                                link: '{{ route('feedback.create') }}',
                                title: 'Create Feedback'
                            },
                            { 
                                image: '/images/b.png', 
                                link: '{{ route('feedback.index') }}',
                                title: 'View Feedback'
                            },
                            { 
                                image: '/images/c.png', 
                                link: 'https://www.vimpo.com.tr/en/blog/the-importance-of-regular-road-maintenance',
                                title: 'Blog'
                            },
                            { 
                                image: '/images/d.png', 
                                link: '{{ route('dashboard') }}',
                                title: 'Dashboard'
                            }
                        ],
                        nextSlide() {
                            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                        },
                        prevSlide() {
                            this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                        },
                        goToSlide(index) {
                            this.currentSlide = index;
                        }
                    }"
                    class="relative w-full p-4 bg-gray-900 shadow-2xl rounded-xl"
                >
                    <!-- Slide Image & Title -->
                    <div class="relative flex items-center justify-center w-full h-64 overflow-hidden rounded-lg">
                        <a 
                            :href="slides[currentSlide].link" 
                            class="flex flex-col items-center justify-center w-full h-full gap-2 group"
                        >
                            <img 
                                :src="slides[currentSlide].image" 
                                :alt="slides[currentSlide].title"
                                class="object-cover w-48 transition-all duration-300 border-4 border-white shadow-lg h-80 rounded-xl group-hover:scale-105"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                            />
                            <span class="text-lg font-medium text-white" x-text="slides[currentSlide].title"></span>
                        </a>
                    </div>

                    <!-- Left Arrow -->
                    <button 
                        @click="prevSlide()" 
                        class="z-10 p-4 transition -translate-y-1/2 rounded-full shadow-md top-1/2 left-2 bg-white/90 hover:bg-yellow-300 focus:outline-none"
                        aria-label="Previous slide"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <!-- Right Arrow -->
                    <button 
                        @click="nextSlide()" 
                        class="z-10 p-4 transition -translate-y-1/2 rounded-full shadow-md  top-1/2 right-2 bg-white/90 hover:bg-yellow-300 focus:outline-none"
                        aria-label="Next slide"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Slide Indicators -->
                    <div class="flex justify-center mt-4 space-x-2">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button 
                                @click="goToSlide(index)"
                                :class="{
                                    'bg-yellow-400 w-4 h-4': currentSlide === index,
                                    'bg-white w-3 h-3': currentSlide !== index
                                }"
                                class="transition-all duration-300 rounded-full shadow focus:outline-none"
                                :aria-label="'Go to ' + slide.title"
                            ></button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
<br>
<br>
        <!-- Feedback Table Section -->
        <div class="max-w-5xl mx-auto">
            <h2 class="mb-6 text-lg font-bold text-gray-800 dark:text-gray-200">My Feedback ⭐</h2>
            <div class="overflow-x-auto bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                <table class="min-w-full text-sm text-left text-gray-800 dark:text-gray-200">
                <thead class="bg-yellow-400 dark:bg-yellow-600">
    <tr class="text-base font-bold text-gray-900 uppercase dark:text-white">
        <th scope="col" class="px-6 py-4 border-r border-yellow-500">Category</th>
        <th scope="col" class="px-6 py-4 border-r border-yellow-500">Description</th>
        <th scope="col" class="px-6 py-4 border-r border-yellow-500">Status</th>
        <th scope="col" class="px-6 py-4">Priority</th>
    </tr>
</thead>
                    <tbody>
                        @forelse($feedbacks as $feedback)
                            <tr class="border-b dark:border-gray-700 hover:bg-yellow-50 dark:hover:bg-gray-700/40">
                                <td class="px-6 py-4">{{ $feedback->category }}</td>
                                <td class="max-w-sm px-6 py-4 truncate">{{ $feedback->description }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-block px-2 py-1 rounded-full text-xs font-medium
                                        {{ $feedback->status == 'resolved' ? 'bg-green-200 text-green-800' : 
                                           ($feedback->status == 'in_progress' ? 'bg-yellow-200 text-yellow-800' : 'bg-red-200 text-red-800') }}">
                                        {{ ucfirst(str_replace('_', ' ', $feedback->status)) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ ucfirst($feedback->priority) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    No feedback submitted yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</x-app-layout>