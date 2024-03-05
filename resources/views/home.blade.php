@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="centered-form">
    <div class="col-md-6">
        <h2 class="text-center mb-4">Welcome, {{ Auth::user()->name }}!</h2>
    </div>
</div>
@endsection
