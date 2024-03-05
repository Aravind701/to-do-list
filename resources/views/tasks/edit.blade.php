@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
<div class="task-crud mt-5">
    <h2>Edit Task</h2>

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $task->title }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="{{ $task->due_date }}">
            @error('due_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_pending" value="0" {{ $task->status == '0' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_pending">Pending</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_completed" value="1" {{ $task->status == '1' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_completed">Completed</label>
            </div>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tasks.index')}}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
