@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100" style="background: linear-gradient(135deg, #f8fafc, #e3e6e8);">
    <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header text-center bg-primary text-white rounded-top-4">
                <h4 class="mb-0">{{ __('Login') }}</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <!-- Login Button and Forgot Password Link -->
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(135deg, #4c8cfa, #356bf7); border: none;">
                            {{ __('Login') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-center mt-3">
                            <a class="text-primary text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <div class="card-footer text-center bg-light rounded-bottom-4">
                <small>{{ __('Don\'t have an account?') }} <a href="{{ route('register') }}" class="text-primary">{{ __('Register') }}</a></small>
            </div>
        </div>
    </div>
</div>
@endsection

