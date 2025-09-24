<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Edit Task</h1>
    <div>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
    </div>
    <form action="{{route('task.update', ['task' =>$task])}}" method="POST">
        @csrf
        @method('put')
        <div >
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
        </div>
        <div >
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $task->description }}</textarea>
        </div>
        <div >
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="done" {{ $task->status == 'done' ? 'selected' : '' }}>Done</option>
            </select>

        </div>
        <div >
            <input type="submit" value="Update Task">
        </div>

        
        </form>
</body>
</html>