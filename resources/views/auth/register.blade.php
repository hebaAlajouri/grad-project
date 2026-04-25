@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('register') }}">
@csrf

<!-- Name -->
<div class="field">
    <label class="field-label">Name</label>
    <input name="name" class="field-input" placeholder="Name">
</div>

<!-- Email -->
<div class="field">
    <label class="field-label">Email</label>
    <input name="email" type="email" class="field-input" placeholder="Email">
</div>

<!-- Password -->
<div class="field">
    <label class="field-label">Password</label>
    <input name="password" type="password" class="field-input" placeholder="Password">
</div>

<!-- Confirm Password -->
<div class="field">
    <label class="field-label">Confirm Password</label>
    <input name="password_confirmation" type="password" class="field-input" placeholder="Confirm Password">
</div>

<button class="btn">Register</button>

</form>

@endsection