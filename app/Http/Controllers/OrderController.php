<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Obtener las órdenes asociadas al usuario autenticado
        $orders = $user->orders;

        $viewData = [
            'title' => 'List of Your Orders',
            'subtitle' => 'Your Orders',
            'orders' => $orders,
        ];

        return view('orders.index')->with('viewData', $viewData);
    }

    public function create()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        $viewData = [
            'title' => 'Create Order',
            'products' => Product::all(),
            'user' => $user, // Pasar el usuario autenticado a la vista
        ];

        return view('orders.create')->with('viewData', $viewData);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'availability' => 'required|integer|min:1',
            'dateOrder' => 'required|date',
            'totalOrder' => 'required|numeric|min:0',
        ]);

        $order = new Order();
        $order->user_id = $user->id;
        $order->dateOrder = $request->input('dateOrder');
        $order->totalOrder = $request->input('totalOrder');
        $order->save();

        $product = Product::findOrFail($request->input('product_id'));
        $availability = $request->input('availability');

        // Disminuye la cantidad de disponibilidad del producto
        $product->decreaseAvailability($availability);

        $order->products()->attach($product, [
            'availability' => $availability,
            'price' => $product->getPrice(),
        ]);

        $order->updateTotal();

        // Generar el PDF
        $pdf = PDF::loadView('pdf.order', ['order' => $order]);

        // Guardar el PDF en una ubicación específica (opcional)
        $pdfPath = storage_path('app/orders/order_' . $order->id . '.pdf');
        $pdf->save($pdfPath);

        // Envía el PDF como respuesta al usuario
        return $pdf->stream('order_' . $order->id . '.pdf');
    }
}