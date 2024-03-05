@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="col-md-6">
        <h2 class="text-center mb-4">Welcome, {{ Auth::user()->name }}!</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary btn-block">Logout</button>
        </form>
    </div>
@endsection
