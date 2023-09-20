@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Orders</h2>
    <!-- Lista de órdenes del usuario autenticado -->
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Status</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData["orders"] as $order)
            <tr>
                <td>{{ $order->getStatus() }}</td>
                <td>${{ $order->getTotal() }}</td>
                <td>
                    <a href="{{ route('orders.show', $order) }}" class="btn btn-info">View Details</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
