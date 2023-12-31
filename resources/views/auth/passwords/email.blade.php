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
                                            <h2><span style="color: rgb(229, 188, 49);">Forgot your Password?</span></h2>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-xl-4">
                                            <div class="card mb-5">
                                                <div class="card-body d-flex flex-column align-items-center">
                                                    <form class="text-center" method="post" action="{{ route('password.email') }}">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3"></div>
                                                        <div class="mb-3">
                                                            <button class="btn btn-primary d-block w-100" type="submit" style="background-color: rgb(229, 188, 49); border-color: rgb(229, 188, 49);">Send Password Reset Link</button>
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