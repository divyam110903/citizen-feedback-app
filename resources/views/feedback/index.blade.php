<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between space-x-4">
            <h2 class="font-bold text-2xl text-[#1b1b18]">
                {{ __('My Complaints') }}
            </h2>

            <!-- Lottie Animation -->
            <dotlottie-player
                src="https://lottie.host/6200e677-2a86-4123-8949-9ca5d1cf6cda/Ex0fF1vIlE.lottie"
                background="transparent"
                speed="1"
                style="width: 250px; height: 60px"
                loop
                autoplay
            ></dotlottie-player>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="p-8 bg-white border border-gray-200 shadow-xl rounded-2xl">
                @if (session('status'))
                    <div class="px-4 py-3 mb-6 text-sm font-medium text-green-700 bg-green-100 rounded-lg shadow-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-[#1b1b18]">
                        <thead class="bg-[#f1f4cc] text-[#1b1b18] uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-6 py-3">Category</th>
                                <th class="px-6 py-3">Description</th>
                                <th class="px-6 py-3">Location</th>
                                <th class="px-6 py-3">Image</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($feedbacks as $feedback)
                                <tr class="hover:bg-[#f3f5d0] transition-all duration-200">
                                    <td class="px-6 py-4">{{ $feedback->category }}</td>
                                    <td class="px-6 py-4">{{ $feedback->description }}</td>
                                    <td class="px-6 py-4">{{ $feedback->location }}</td>
                                    <td class="px-6 py-4">
                                        @if ($feedback->image_path)
                                            <img src="{{ asset('storage/' . $feedback->image_path) }}"
                                                 alt="Feedback Image"
                                                 class="object-cover w-20 h-20 rounded-md shadow" />
                                        @else
                                            <span class="italic text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add the Lottie script here -->
    <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
</x-app-layout>