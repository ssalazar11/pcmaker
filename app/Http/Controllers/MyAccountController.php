<?php

namespace App\Http\Controllers;

use App\Contracts\PDFGeneratorInterface;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use PDF;

class MyAccountController extends Controller
{
    protected $pdfGenerator;

    public function __construct(PDFGeneratorInterface $pdfGenerator){
        $this->pdfGenerator=$pdfGenerator;
    }

    public function orders()
    {
        $viewData = [];
        $viewData['title'] = 'My Orders - PCMaker';
        $viewData['subtitle'] = 'My Orders';
        $viewData['orders'] = Order::where('user_id', Auth::user()->getId())->get();

        return view('myaccount.orders')->with('viewData', $viewData);
    }

    public function showOrderDetails(Order $order)
    {
        $viewData = [];
        $viewData['title'] = 'Order Details - PCMaker';
        $viewData['subtitle'] = 'Order Details';
        $viewData['order'] = $order;

        return view('myaccount.order_details')->with('viewData', $viewData);
    }

    public function downloadInvoice(Order $order)
    {
        $this->pdfGenerator->loadView('myaccount.invoice', ['order'=>$order]);
        return $this->pdfGenerator->download('invoice-'. $order->getId(). '.pdf');
    }
}
