@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="col-md-6">
        <h2 class="text-center mb-4">Register</h2>

        <form method="POST" action="{{ route('post.register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
@endsection
