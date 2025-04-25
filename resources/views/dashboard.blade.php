<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Welcome Back!👋') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-8">
        <div class="max-w-xl mx-auto">
            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                <!-- Carousel Container -->
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
                                link: '{{ route('dashboard') }}',
                                title: 'Dashboard'
                            },
                            { 
                                image: '/images/d.png', 
                                link: '{{ route('profile.edit') }}',
                                title: 'Your Profile'
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
                    <!-- Image Slide -->
                    <div class="relative w-full h-64 overflow-hidden rounded-lg">
                        <a 
                            :href="slides[currentSlide].link" 
                            class="flex flex-col items-center justify-center w-full h-full gap-2 group"
                        >
                            <img 
                                :src="slides[currentSlide].image" 
                                :alt="slides[currentSlide].title"
                                class="object-cover w-48 h-48 mx-auto transition-all duration-300 border-4 border-white shadow-lg rounded-xl group-hover:scale-105"
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

                  

                    <!-- Navigation Arrows -->
<div class="absolute z-10 transform -translate-y-1/2 top-1/2 left-2">
    <button 
        @click="prevSlide()" 
        class="p-2 transition rounded-full shadow-md bg-white/90 hover:bg-yellow-300 focus:outline-none"
        aria-label="Previous slide"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
</div>
<div class="absolute z-10 transform -translate-y-1/2 top-1/2 right-2">
    <button 
        @click="nextSlide()" 
        class="p-2 transition rounded-full shadow-md bg-white/90 hover:bg-yellow-300 focus:outline-none"
        aria-label="Next slide"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>
</div>

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
    </div>
</x-app-layout>