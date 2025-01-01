@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100" style="background: linear-gradient(135deg, #f8fafc, #e3e6e8);">
    <div class="col-md-6">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-header text-center bg-primary text-white rounded-top-4">
                <h4 class="mb-0">{{ __('Register') }}</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        
                <!-- <div class="mb-3">
                    <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
                    <input id="phone_number" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(135deg, #4c8cfa, #356bf7); border: none;">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center bg-light rounded-bottom-4">
                <small>{{ __('Already have an account?') }} <a href="{{ route('login') }}" class="text-primary">{{ __('Login') }}</a></small>
            </div>
        </div>
    </div>
</div>
@endsection