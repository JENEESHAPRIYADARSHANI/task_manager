<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Task</h1>
    <div> 
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div> 
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>
                        <a href="{{ route('task.edit', ['task'=>$task]) }}">Edit</a>
                    </td>
                    <td>
                      <form method="POST" action="{{ route('task.delete', ['task' => $task->id]) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete"/>
                    </form>
                       
                    </td>
                </tr>

                @endforeach

</table>
 </div>
</body>
</html>