@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>
    <h2>{{ $viewData['subtitle'] }}</h2>

    <p>Order ID: {{ $viewData['order']->id }}</p>
    <p>User ID: {{ $viewData['order']->user_id }}</p>
    <p>Status: {{ $viewData['order']->status }}</p>
    <p>Total: ${{ $viewData['order']->total }}</p>

    <h3>Order Details:</h3>
    <ul>
        @foreach ($viewData['order']->products as $product)
            <li>
                Product Name: {{ $product->name }}
                <br>
                availability: {{ $product->pivot->availability }}
                <br>
                Price: ${{ $product->pivot->price }}
            </li>
        @endforeach
    </ul>


    <a href="{{ route('orders.index') }}">Back to Orders</a>
@endsection
