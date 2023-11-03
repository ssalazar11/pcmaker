@extends('layouts.app')

@section('content')
<div class="container">
    <div class="intro-text" style="padding-top: 119px; padding-bottom: 31px;">
        <section class="position-relative py-4 py-xl-5">
            <div class="container position-relative">
                <section class="position-relative py-4 py-xl-5">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-5">
                                    <div class="card-body d-flex flex-column align-items-center" style="color: rgb(229, 188, 49);">
                                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="background-color: rgb(229, 188, 49);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>
                                            </svg>
                                        </div>
                                        <form class="text-center" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    {{ __('These credentials do not match our records.') }}
                                                </div>
                                            @endif
                                            <div class="mb-3">
                                                <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="formCheck-1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="formCheck-1">Remember Me</label>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary d-block w-100" type="submit" style="background-color: rgb(229, 188, 49); border-color: rgb(229, 188, 49);">Login</button>
                                            </div>
                                        </form>
                                        <a href="{{ route('password.request') }}" style="color: rgb(229, 188, 49);">Forgot your password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>
</div>


@endsection