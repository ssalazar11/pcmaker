<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
{
    // Aquí debes obtener la lista de órdenes y pasarla a la vista
    $viewData = [];
        $viewData["title"] = "Your Orders";
        $viewData["subtitle"] =  "List of orders";
        $viewData["orders"] = Order::all();
        return view('orders.index')->with("viewData", $viewData);

}


    public function create()
    {
        $viewData = [];
        $viewData["title"] = "Create Order";
        $viewData["products"] = Product::all();

        return view('orders.create')->with("viewData",$viewData);
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'availability' => 'required|integer|min:1',
        ]);

        // Crea una nueva instancia de Order
        $order = new Order();
        $order->user_id = $request->input('user_id');
        $order->status = 'pendiente'; // Puedes establecer un estado predeterminado
        $order->total = 0; // Puedes establecer el total inicial en 0

        // Guarda la orden en la base de datos
        $order->save();

        // Asocia un producto a la orden
        $product = Product::findOrFail($request->input('name'));
        $availability = $request->input('availability');
        $order->products()->attach($product, ['availability' => $availability, 'price' => $product->getPrice(),]);

        // Actualiza el total de la orden
        $order->updateTotal();

        // Redirecciona a la vista de detalles de la orden
        return redirect()->route('orders.show', ['order' => $order]);
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }
}
