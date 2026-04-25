@extends('layouts.auth')

@section('content')

@if (session('status'))
    <div class="lj-status">{{ session('status') }}</div>
@endif

<form method="POST" action="{{ route('login') }}">
@csrf

<div class="lj-field">
    <label>Email</label>
    <input type="email" name="email" class="lj-input">
</div>

<div class="lj-field">
    <label>Password</label>
    <input type="password" name="password" class="lj-input">
</div>

<button class="lj-btn">Sign In</button>

</form>

@endsection