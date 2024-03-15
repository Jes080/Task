@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
<p>This is the create task page.</p>

<!-- Task Form -->
<form action="{{ route('task.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Task Title:</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Task Description:</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="due">Due Date:</label>
        <input type="date" name="due" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="priority">Priority Level:</label>
        <select name="priority" class="form-control" required>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
        </select>
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <select name="status" class="form-control" required>
            <option value="Not Started">Not Started</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Create Task</button>
</form>
<!-- jQuery to show notification -->
@if(isset($successMessage))
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var successMessage = '{{ $successMessage }}';
        alert(successMessage);
    });
</script>
@endif
@endsection
