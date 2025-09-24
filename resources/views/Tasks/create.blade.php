<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Create a Task</h1>
    <form action="{{route('task.store')}}" method="POST">
        @csrf
        @method('post')
        <div >
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div >
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <div >
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div >
            <input type="submit" value="Create Task">
        </div>

        
        </form>
        
</body>
</html>