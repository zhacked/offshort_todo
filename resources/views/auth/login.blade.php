@extends('layouts.app')

@section('content')
    <div class="custom-layout__login container-fluid"
    style="
        background: url(image/bg.svg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    ">
        <div class="container">
            <div class="d-flex justify-content-center flex-column" style="margin-left:-165px; margin-top:-100px">
                <div class="custom-card__glass d-flex justify-content-center align-items-center p-4"
                    style="max-width: 90%; width: 600px">

                    <div class="card-body container-fluid px-5 py-3">
                        <div style="margin-left:60px; margin-bottom:100px;">
                            <img src="image/logo.svg" alt="todo logo">
                            <div class="todo-container1">
                                <div class="todo">Todo<span class="do font-border">List</span></div>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-5">
                                <label for="email"
                                    class="form-label  custom-input__label">{{ __('E-Mail Address') }}</label>
                                <div class="d-flex flex-column">
                                    <input id="email" type="email"
                                        class="form-control custom-input @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-5">
                                <label for="password" class="form-label custom-input__label">{{ __('Password') }}</label>

                                <input id="password" type="password"
                                    class="form-control custom-input @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                            </div>

                            <div class="d-grid col-14 mx-auto" style="margin-top:50px;">
                                <button class="btn btn-block btn-primary py-3 text-uppercase font-weight-bold custom-button custom-button1"
                                    type="submit">
                                    {{ __('Sign in') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <div class="col-md-8">
    <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}
