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
                                            <h2 style="color: rgb(229, 188, 49);">My Interviews</h2>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 col-xl-4">
                                            <div class="list-group">
                                                @foreach($viewData["interviews"] as $interview)
                                                <div class="list-group-item mb-4">
                                                    <div class="card-body d-flex flex-column align-items-center">
                                                        <p>Interview Questions: {{ $interview->getQuestions() }}</p>
                                                        <form action="{{ route('interview.delete', ['id' => $interview->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <form action="{{ route('interview.edit', ['id' => $interview->id]) }}" method="GET">
                                                            <button class="btn btn-warning">Edit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @endforeach
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
