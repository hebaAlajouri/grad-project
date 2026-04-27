@extends('layouts.auth')

@section('content')

@if (session('status'))
    <div class="sess-ok a a4">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
@csrf

<div class="field a a4">
    <label class="field-label">Email</label>
    <input type="email" name="email" class="field-input" value="{{ old('email') }}" required>
    @error('email')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="field a a5">
    <label class="field-label">Password</label>
    <input type="password" name="password" class="field-input" required>
    @error('password')
        <div class="field-error">{{ $message }}</div>
    @enderror
</div>

<div class="form-row a a6">
    <label class="remember">
        <input type="checkbox" name="remember">
        Remember me
    </label>

    @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="forgot">
            Forgot password?
        </a>
    @endif
</div>

<button type="submit" class="btn a a7">
    Sign In
</button>

</form>

@endsection