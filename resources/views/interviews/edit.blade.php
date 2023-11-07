@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('/img/pc-gamer.webp') }}');">
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
                                            <h2 style="color: rgb(229, 188, 49);">Edit Interview</h2>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-xl-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form method="post" action="{{ route('interview.update', ['id' => $interview->id]) }}">
                                                        @csrf
                                                        @method('PATCH')

                                                        <div class="mb-3">
                                                            <label for="questions" class="form-label">Questions</label>
                                                            <textarea id="questions" class="form-control @error('questions') is-invalid @enderror" name="questions" required>{{ $interview->getQuestions() }}</textarea>

                                                            @error('questions')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>

                                                        <div class="row mb-0">
                                                            <div class="col-md-6 offset-md-4">
                                                                <button type="submit" class="btn btn-primary">Update Interview</button>
                                                            </div>
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
