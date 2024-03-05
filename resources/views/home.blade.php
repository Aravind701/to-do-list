@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="centered-form">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Welcome, {{ Auth::user()->name }}!</h2>
        <p>I'm Aravindan, Associate Software Developer. If you to create your TO-DO click <a href="{{ route('tasks.index')}}"> here</a>.</p>
        <p class="text-center">Otherwise you can click nav-bar menu.</p>
    </div>
</div>
@endsection
