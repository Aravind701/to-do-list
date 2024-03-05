@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />

<div class="task-crud mt-5">
    <h2>All Tasks</h2>

    <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    @if ($tasks->isEmpty())
        <p>No tasks found.</p>
    @else
    <table id="tasks-table" class="display">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr data-task-id="{{ $task->id }}">
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td>
                    <div id="status-{{ $task->id }}">{{ ($task->status == 0) ? 'pending' : 'completed' }}</div>
                
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" {{ ($task->status == '1') ? 'checked' : '' }} role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                      </div>
                </td>
                <td>
                    <a href="{{ route('tasks.view', $task) }}" class="btn btn-secondary btn-sm">View</a>
                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection
