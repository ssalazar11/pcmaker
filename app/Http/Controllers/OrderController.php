<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

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
        $user = Auth::user(); // Obtener el usuario autenticado

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'availability' => 'required|integer|min:1',
        ]);

        $order = new Order();
        $order->user_id = $user->id; // Asociar la orden al usuario autenticado
        $order->status = 'pending';
        $order->total = 0;
        $order->save();

        $product = Product::findOrFail($request->input('product_id'));
        $availability = $request->input('availability');
        $order->products()->attach($product, [
            'availability' => $availability,
            'price' => $product->getPrice(),
        ]);

        $order->updateTotal();

        return redirect()->route('orders.show', ['order' => $order]);
   
    }
}