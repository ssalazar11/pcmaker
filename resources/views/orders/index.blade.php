@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>
    <h2>{{ $viewData['subtitle'] }}</h2>

    <ul>
        @foreach ($viewData['orders'] as $order)
            <li>
                <a href="{{ route('orders.show', ['order' => $order]) }}">
                    Order ID: {{ $order->id }}
                </a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('orders.create') }}">Create New Order</a>
@endsection
