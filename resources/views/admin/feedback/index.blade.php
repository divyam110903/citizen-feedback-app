<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <img src="{{ asset('images/feedback-icon.png') }}" alt="All Requests" class="w-20 h-20">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('All Requests') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="p-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                @if (session('status'))
                    <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-300">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-800 dark:text-gray-200">
                        <thead class="text-s font-extrabold uppercase bg-[#eef2c2] dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-4">Category</th>
                                <th class="px-6 py-4">Description</th>
                                <th class="px-6 py-4">Location</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Priority</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($feedbacks as $feedback)
                                <tr class="border-b dark:border-gray-700 hover:bg-yellow-50 dark:hover:bg-gray-700/40">
                                    <td class="px-6 py-4">{{ $feedback->category }}</td>
                                    <td class="max-w-sm px-6 py-4 truncate">{{ $feedback->description }}</td>
                                    <td class="px-6 py-4">{{ $feedback->location }}</td>
                                    <td class="px-6 py-4">{{ ucfirst(str_replace('_', ' ', $feedback->status)) }}</td>
                                    <td class="px-6 py-4">{{ ucfirst($feedback->priority) }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.feedback.show', $feedback->id) }}" 
                                           class="font-semibold text-blue-500 transition-all duration-200 hover:text-red-800">
                                           View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        No feedback found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>