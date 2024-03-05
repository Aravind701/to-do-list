@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
<div class="task-crud mt-5">
    <h2>Create Task</h2>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title')}}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" value="{{ old('description')}}" rows="3"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date')}}" class="form-control">
            @error('due_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Status</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_pending" value="0" checked>
                <label class="form-check-label" for="status_pending">Pending</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="status_completed" value="1">
                <label class="form-check-label" for="status_completed">Completed</label>
            </div>
            @error('status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
