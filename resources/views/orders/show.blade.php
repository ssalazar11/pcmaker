@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order Details</h2>
    <!-- Detalles de la orden -->
    <table class="table">
        <tr>
            <th>Order ID</th>
            <td>{{ $order->getId() }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order->getStatus() }}</td>
        </tr>
        <tr>
            <th>Total</th>
            <td>${{ $order->getTotal() }}</td>
        </tr>
    </table>
</div>
@endsection
