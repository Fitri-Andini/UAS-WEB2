@extends('layouts.app')

@section('title', 'Login')

@section('header-title', 'Login')

@section('content')
<form method="POST" action="{{ route('profile.register') }}">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" value="{{ old('name') }}" required autofocus>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>
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
        <label for="cpassword" class="form-label">Konfirmasi password</label>
        <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="password_confirmation" required>
        @error('cpassword')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
@endsection

