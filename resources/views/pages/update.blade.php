@extends('layouts.app')
@extends('pages.show')

@section('content')
<h1>{{$title}}</h1>
<p>This is the update task page.</p>

<!-- Task Table -->
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <table class="table custom-table table-hover text-center table-secondary table-striped" style="background-color: #800080; color: white;">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Task ID</th>
                        <th>Task Title</th>
                        <th>Task Description</th>
                        <th>Due Date</th>
                        <th>Priority Level</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->due }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
