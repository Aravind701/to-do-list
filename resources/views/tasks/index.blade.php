@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div class="task-crud mt-5">
    <h2>All Tasks</h2>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    @if ($tasks->isEmpty())
        <p>No tasks found.</p>
    @else
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item">
                    {{ $task->title }}
                    <div class="float-right">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
