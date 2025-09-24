<x-app-layout>
    <div class="w-3/4 h-1/4 mx-auto py-12">
        <h1 class="text-2xl font-bold text-center text-black mb-6">Edit Task</h1>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('task.update', ['task' => $task]) }}" method="POST"
              class="bg-white shadow-md rounded-lg p-4 flex flex-col justify-between h-full">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-black">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-black text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-black">Description</label>
                <textarea name="description" id="description" rows="2"
                          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-black text-sm">{{ $task->description }}</textarea>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-black">Status</label>
                <select name="status" id="status"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white text-black text-sm">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('task.index') }}"
                   class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-2 rounded shadow-sm transition text-sm">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-5 py-2 rounded shadow-sm transition text-sm">
                    Update Task
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
