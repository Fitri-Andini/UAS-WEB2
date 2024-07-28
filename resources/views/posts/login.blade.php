@extends('layouts.app')

@section('title', 'Login')

@section('header-title', 'Login')

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="nama" placeholder="Email Address" name="email" value="{{ old('email') }}" required>
        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
        @error('password')
        <span>{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember" id="remember">
            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Login</button>
        or
        <a href="{{ route('profile.register') }}">Daftar</a>
    </div>
</form>
@endsection

