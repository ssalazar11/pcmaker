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
                                                <h1>Orders</h1>
                                                @forelse ($viewData["orders"] as $order)
                                                    <div class="card mb-4">
                                                        <div class="card-header bg-primary text-white">
                                                            Order #{{ $order->getId() }}
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">Item ID</th>
                                                                            <th scope="col">Product Name</th>
                                                                            <th scope="col">Price</th>
                                                                            <th scope="col">Quantity</th>
                                                                            <th scope="col">Total</th>
                                                                            <th scope="col">Date</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($order->getItems() as $item)
                                                                            <tr>
                                                                                <td>{{ $item->getId() }}</td>
                                                                                <td>
                                                                                    <a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
                                                                                        {{ $item->getProduct()->getName() }}
                                                                                    </a>
                                                                                </td>
                                                                                <td>${{ $item->getSubtotal() }}</td>
                                                                                <td>{{ $item->getQuantity() }}</td>
                                                                                <td>${{ $order->getTotal() }}</td>
                                                                                <td>{{ $order->getCreatedAt()}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <a href="{{ route('orders.show', $order->getId()) }}" class="btn btn-info">View Details</a>
                                                            <a href="{{ route('orders.downloadInvoice', $order->getId()) }}" class="btn btn-success">Download Invoice</a>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <div class="alert alert-danger" role="alert">
                                                        Seems like you haven't purchased anything in our store yet. =(
                                                    </div>
                                                @endforelse
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