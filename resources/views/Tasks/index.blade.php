<x-app-layout>
    <div class="p-6">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">

                        <div id="logged-in-message" class="text-gray-900 dark:text-gray-100 mb-4">
                            {{ __("You're logged in!") }}
                        </div>

                        <a href="{{ route('task.create') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-4 py-2 rounded shadow transition inline-flex items-center">
                            Create Task 
                            <span class="ms-2">
                            <img src="{{ asset('images/add.png') }}" alt="Create Task" class="h-5 w-5 inline-block ml-2">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-500 text-center font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center mt-6">
            @foreach ($tasks as $task)
                <div class="bg-white dark:bg-gray-500 shadow-lg rounded-lg w-3/4 h-64 flex hover:shadow-xl transition-shadow duration-300">
                    
                    <div class="flex flex-col justify-center p-6 flex-1 text-black">
                        <h2 class="text-xl font-semibold mb-2">{{ $task->title }}</h2>
                        <p class="mb-2">{{ $task->description }}</p>
                        <p class="text-sm mb-1">Status: {{ $task->status }}</p>
                       <p class="text-sm">
                            Created: {{ $task->created_at->format('d M Y') }} 
                            <br/>
                             {{ $task->created_at->format('h:i A') }}
                        </p>

                    </div>

                    <div class="flex flex-col justify-center items-center p-4 rounded-r-lg space-y-4">
                        <a href="{{ route('task.edit', ['task' => $task->id]) }}" 
                           class="bg-white p-3 rounded-full shadow hover:bg-gray-200 transition">
                            <img src="{{ asset('images/edit.png') }}" alt="Edit" class="h-6 w-6">
                        </a>

                        <br/>

                        <form method="POST" action="{{ route('task.delete', ['task' => $task->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 p-3 rounded-full shadow hover:bg-red-600 transition">
                                <img src="{{ asset('images/bin.png') }}" alt="Delete" class="h-6 w-6">
                            </button>
                        </form>
                    </div>
                </div>
                <br/>
            @endforeach
        </div>
    </div>

    <script>
        setTimeout(() => {
            const msg = document.getElementById('logged-in-message');
            if (msg) msg.style.display = 'none';
        }, 30000); // 30 seconds
    </script>
</x-app-layout>
