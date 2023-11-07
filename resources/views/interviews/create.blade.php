@extends('layouts.app')

@section('content')
<header class="masthead" style="background-image: url('{{ asset('/img/pc-gamer.webp') }}');">
    <div class="container">
        <div class="intro-text" style="padding-top: 119px; padding-bottom: 31px;">
            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-around">
                        <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                            <div class="card mb-5">
                                <div class="card-body p-sm-5">
                                    <h2 class="text-center mb-4">Create Interview</h2>
                                    <form action="{{ route('interview.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3"></div>
                                        <div class="mb-3"></div>
                                        <div class="mb-3"><textarea class="form-control" id="message-2" name="questions" rows="6" placeholder="Interview Questions" required></textarea></div>
                                        <div><button class="btn btn-primary d-block w-100" type="submit" style="background-color: rgb(229, 188, 49); border-color: rgb(229, 188, 49);"> Send </button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</header>
@endsection