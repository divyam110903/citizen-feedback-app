<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('All Feedback') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="mb-4 text-sm font-medium text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr>
                                    <td>{{ $feedback->category }}</td>
                                    <td>{{ $feedback->description }}</td>
                                    <td>{{ $feedback->location }}</td>
                                    <td>{{ $feedback->status }}</td>
                                    <td>{{ $feedback->priority }}</td>
                                    <td>
                                        <a href="{{ route('admin.feedback.show', $feedback->id) }}">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>