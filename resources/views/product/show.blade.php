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
                                        <div class="card mb-3">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {{ $viewData["product"]->getName() }} (${{ $viewData["product"]->getPrice() }})
                                                        </h5>
                                                        <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
                                                        <p class="card-text">
                                                            <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                                                                <div class="row">
                                                                    @csrf
                                                                    <div class="col-auto">
                                                                        <div class="input-group col-auto">
                                                                            <div class="input-group-text">Quantity</div>
                                                                            <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Go Back</a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </p> 
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
