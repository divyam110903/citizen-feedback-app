<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Feedback Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><strong>Category:</strong> {{ $feedback->category }}</p>
                    <p><strong>Description:</strong> {{ $feedback->description }}</p>
                    <p><strong>Location:</strong> {{ $feedback->location }}</p>
                    <p><strong>Status:</strong> {{ $feedback->status }}</p>
                    <p><strong>Priority:</strong> {{ $feedback->priority }}</p>
                    @if ($feedback->image_path)
                        <img src="{{ asset('storage/' . $feedback->image_path) }}" alt="Feedback Image" class="w-32 h-32">
                    @endif

                    <form method="POST" action="{{ route('admin.feedback.update', $feedback->id) }}">
                        @csrf
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select name="status" id="status">
                                <option value="pending" {{ $feedback->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $feedback->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="resolved" {{ $feedback->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="priority" :value="__('Priority')" />
                            <select name="priority" id="priority">
                                <option value="low" {{ $feedback->priority == 'low' ? 'selected' : '' }}>Low</option>
                                <option value="medium" {{ $feedback->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                <option value="high" {{ $feedback->priority == 'high' ? 'selected' : '' }}>High</option>
                            </select>
                        </div>
                        <x-primary-button class="mt-4">
                            {{ __('Update Feedback') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>