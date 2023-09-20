@extends('layouts.app') {{-- Esto asume que tienes un diseño base llamado "app.blade.php" en la carpeta "layouts" --}}

@section('content')
    <div class="container">
        <h1>{{ $viewData['title'] }}</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">User ID:</label>
                <input type="text" name="user_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="product_id">Product ID:</label>
                <select name="product_id" class="form-control" required>
                    @foreach ($viewData['products'] as $product)
                        <option value="{{ $product->getId() }}">{{ $product->getName() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="availability">availability:</label>
                <input type="number" name="availability" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Order</button>
        </form>
    </div>
@endsection
