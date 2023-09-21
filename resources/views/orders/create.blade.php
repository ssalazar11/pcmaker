@extends('layouts.app')

@section('content')
    <h1>{{ $viewData['title'] }}</h1>

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf

        <input type="hidden" name="user_id" value="{{ $viewData['user']->id }}">

        <div class="form-group">
            <label for="product_id">Select a Product:</label>
            <select name="product_id" id="product_id" class="form-control">
                @foreach ($viewData['products'] as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="availability">availability:</label>
            <input type="number" name="availability" id="availability" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
@endsection
