@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <h2>Task Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ ($task->status == 0) ? 'Pending' :'Completed' }}</p>
            <a href="{{ route('tasks.index')}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
