@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

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
                                        <!-- Products section -->
                                        <div class="row">
                                        <a href="{{ request()->fullUrlWithQuery(['orderByPrice' => 'asc']) }}" class="btn btn-primary" >Ordenar por precio</a>
                                            @foreach ($viewData["products"] as $product)
                                                <div class="col-md-4 col-lg-3 mb-4">
                                                    <div class="card">
                                                        <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top">
                                                        <div class="card-body text-center">
                                                            <a href="{{ route('product.show', ['id'=> $product->getId()]) }}" class="btn bg-primary text-white">
                                                                {{ $product->getName() }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <!-- interview section" -->
                                        <div class="row mt-4">
                                            <div class="col-md-6 offset-md-3 text-center" >
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Don't you have the necessary knowledge?</h4>
                                                        <p class="card-text">If you want to request an interview, click here!</p>
                                                        <a href="{{ route('interview.create') }}" class="btn btn-primary">Click Here!</a>
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
