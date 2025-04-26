<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Feedback Details') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 bg-[#f9fdd7] min-h-screen px-4 lg:px-12">
        <div class="flex items-center justify-center gap-8 mx-auto max-w-7xl">
            
            <div class="flex-1 p-6 space-y-6 bg-white shadow-lg dark:bg-gray-800 rounded-2xl">
                <div class="space-y-4 text-base text-gray-800 dark:text-gray-200">
                    <p><strong>Category:</strong> {{ $feedback->category }}</p>
                    <p><strong>Description:</strong> {{ $feedback->description }}</p>
                    <p><strong>Location:</strong> {{ $feedback->location }}</p>
                    <p><strong>Status:</strong> {{ ucfirst(str_replace('_', ' ', $feedback->status)) }}</p>
                    <p><strong>Priority:</strong> {{ ucfirst($feedback->priority) }}</p>

                    @if ($feedback->image_path)
                        <div class="pt-4">
                            <img src="{{ asset('storage/' . $feedback->image_path) }}" alt="Feedback Image" class="object-cover w-40 h-40 border border-gray-300 rounded-lg dark:border-gray-600">
                        </div>
                    @endif
                </div>

                <form method="POST" action="{{ route('admin.feedback.update', $feedback->id) }}" class="space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="status" :value="__('Status')" class="text-gray-700 dark:text-gray-300" />
                        <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="pending" {{ $feedback->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ $feedback->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="resolved" {{ $feedback->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </div>

                    <div>
                        <x-input-label for="priority" :value="__('Priority')" class="text-gray-700 dark:text-gray-300" />
                        <select name="priority" id="priority" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">
                            <option value="low" {{ $feedback->priority == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ $feedback->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ $feedback->priority == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>

                    <x-primary-button class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600">
                        {{ __('Update Feedback') }}
                    </x-primary-button>
                </form>
            </div>

            
            <div class="flex-1 mr-19">
            <dotlottie-player
  src="https://lottie.host/e74b552a-518e-45ec-8a1a-f7fc21efb0cc/CJhB1VhdSG.lottie"
  background="transparent"
  speed="1"
  style="width: 300px; height: 300px"
  loop
  autoplay
></dotlottie-player>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</x-app-layout>