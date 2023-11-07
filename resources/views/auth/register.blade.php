@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url('{{ asset("/img/pc-gamer.webp") }}');">
    <div class="container">
        <div class="intro-text" style="padding-top: 119px; padding-bottom: 31px;">
            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <section class="position-relative py-4 py-xl-5">
                        <div class="container">
                            <section class="position-relative py-4 py-xl-5">
                                <div class="container">
                                    <div class="row mb-5">
                                        <div class="col-md-8 col-xl-6 text-center mx-auto">
                                            <h2 style="color: rgb(229, 188, 49);">Register</h2>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-xl-4">
                                            <div class="card mb-5">
                                                <div class="card-body d-flex flex-column align-items-center" style="color: rgb(229, 188, 49);">
                                                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="background-color: rgb(229, 188, 49);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"></path>
                                                        </svg>
                                                    </div>
                                                    <form class="text-center" method="post" action="{{ route('register') }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <input class="form-control @error('phoneNumber') is-invalid @enderror" type="text" name="phoneNumber" placeholder="Phonenumber" value="{{ old('phoneNumber') }}" required>
                                                            @error('phoneNumber')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <input class="form-control @error('address') is-invalid @enderror" type="text" name="address" placeholder="Address" value="{{ old('address') }}" required>
                                                            @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary d-block w-100" type="submit" style="background-color: rgb(229, 188, 49); border-color: rgb(229, 188, 49);">
                                                                {{ __('Register') }}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
</header>
@endsection