<x-guest-layout>
    @if (session('status'))
        <div class="lj-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="lj-field">
            <label class="lj-field-label" for="email">Email Address</label>
            <div class="lj-input-wrap">
                <input
                    id="email"
                    class="lj-input"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="your@email.com"
                    required
                    autofocus
                    autocomplete="username"
                />
            </div>
            @error('email')
                <p class="lj-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="lj-field">
            <label class="lj-field-label" for="password">Password</label>
            <div class="lj-input-wrap">
                <input
                    id="password"
                    class="lj-input"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password"
                />
                <button type="button" class="lj-pw-toggle">Show</button>
            </div>
            @error('password')
                <p class="lj-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember & Forgot -->
        <div class="lj-form-row">
            <label class="lj-check-label">
                <input id="remember_me" type="checkbox" class="lj-check" name="remember">
                Remember me
            </label>
            @if (Route::has('password.request'))
                <a class="lj-forgot" href="{{ route('password.request') }}">Forgot password?</a>
            @endif
        </div>

        <!-- Submit -->
        <button type="submit" class="lj-btn">Sign In</button>

    </form>
</x-guest-layout>