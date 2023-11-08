{{-- resources/views/myaccount/invoice.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->getId() }}</title>
    <!-- Aquí puedes incluir estilos adicionales si es necesario -->
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Invoice #{{ $order->getId() }}
            </div>
            <div class="card-body bg-light">
                <h5 class="card-title">Date: {{ $order->getCreatedAt()}}</h5>
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
                            @foreach ($order->getItems() as $item)
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
                <div class="card-footer">
                    <strong>Total: ${{ number_format($order->getTotal(), 2) }}</strong>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
