<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData["title"] = "My Orders - PCMaker";
        $viewData["subtitle"] = "My Orders";
        $viewData["orders"] = Order::where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }

    public function showOrderDetails(Order $order)
    {
        $viewData = [];
        $viewData["title"] = "Order Details - PCMaker";
        $viewData["subtitle"] = "Order Details";
        $viewData["order"] = $order;
        
        return view('myaccount.order_details')->with("viewData", $viewData);
    }

    public function downloadInvoice(Order $order)
    {
        $pdf = PDF::loadView('myaccount.invoice', ['order' => $order]);
        return $pdf->download('invoice-' . $order->getId() . '.pdf');
    }
}
