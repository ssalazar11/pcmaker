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
                                        <div class="card">
                                            <div class="card-body bg-info">
                                                <h1>Products in Cart</h1>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Name</th>
                                                                <th>Price</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($viewData["products"] as $product)
                                                                <tr>
                                                                    <td>{{ $product->getId() }}</td>
                                                                    <td>{{ $product->getName() }}</td>
                                                                    <td>${{ $product->getPrice() }}</td>
                                                                    <td>{{ session('products')[$product->getId()] }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="row">
                                                    <div class="text-end">
                                                        <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData["total"] }}</a>
                                                        @if (count($viewData["products"]) > 0) 
                                                            <a href="{{ route('cart.purchase') }}" class="btn bg-primary text-white mb-2">Purchase</a>
                                                            <a href="{{ route('cart.delete') }}">
                                                                <button class="btn btn-danger mb-2">
                                                                    Remove all products from Cart
                                                                </button>
                                                            </a>
                                                        @endif 
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
