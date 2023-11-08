@extends('layouts.app')

@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])

@section('content')
<header class="masthead" style="background-image: url('{{ asset('/img/pc-gamer.webp') }}');">
    <div class="container">
        <div class="intro-text" style="padding-top: 119px; padding-bottom: 31px;">
            <div class="container position-relative">
                <div class="card">
                    <div class="card-body bg-info">
                        <h1>Order Details #{{ $viewData["order"]->getId() }}</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Item ID</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viewData["order"]->getItems() as $item)
                                    <tr>
                                        <td>{{ $item->getId() }}</td>
                                        <td>{{ $item->getProduct()->getName() }}</td>
                                        <td>${{ number_format($item->getSubtotal(), 2) }}</td>
                                        <td>{{ $item->getQuantity() }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            <h3>Total: ${{ number_format($viewData["order"]->getTotal(), 2) }}</h3>
                            <p>Date: {{ $viewData["order"]->getCreatedAt()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@endsection
