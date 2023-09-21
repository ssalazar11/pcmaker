<!-- resources/views/pdf/order.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orden #{{ $order->id }}</title>
</head>
<body>
    <h1>Detalles de la Orden #{{ $order->id }}</h1>
    
    <!-- Mostrar información de la orden, productos, descripciones, etc. aquí -->
    
    <p>Producto: {{ $order->products[0]->name }}</p>
    <p>Descripción: {{ $order->products[0]->description }}</p>
    
    <!-- Agrega más detalles de la orden si es necesario -->

</body>
</html>
