<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Item; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get("products");
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }

        $viewData = [];
        $viewData["title"] = "Cart - PCMaker";
        $viewData["subtitle"] = "Shopping Cart";
        $viewData["total"] = $total;
        $viewData["products"] = $productsInCart;
        return view('cart.index')->with("viewData", $viewData);
    }
    
    public function add(Request $request, $id)
    {
        $products = $request->session()->get("products");
        $products[$id] = $request->input('quantity');
        $request->session()->put('products', $products);
        return redirect()->route('cart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('products');
        return back();
    }

    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get("products");

        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $user = Auth::user();
            
            // Verificar si el balance es suficiente
            $total = $this->calculateTotal($productsInSession);
            if ($user->getBalance() < $total) {
                // Puedes personalizar el mensaje de error según tus necesidades
                return redirect()->route('cart.index')->with('error', 'Insufficient balance to make the purchase.');
            }

            $order = new Order();
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setSubtotal($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);
            }

            $order->setTotal($total);
            $order->save();
            $newBalance = $user->getBalance() - $total;
            $user->setBalance($newBalance); 
            $user->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData["title"] = "Purchase - PCMaker";
            $viewData["subtitle"] = "Purchase Status";
            $viewData["order"] = $order;
            return view('cart.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }

    private function calculateTotal($productsInSession)
    {
        $total = 0;
        $productsInCart = Product::findMany(array_keys($productsInSession));
        foreach ($productsInCart as $product) {
            $quantity = $productsInSession[$product->getId()];
            $total += $product->getPrice() * $quantity;
        }
        return $total;
    }

}
   