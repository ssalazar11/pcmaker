<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $viewData = [];
        $viewData['title'] = 'Products - PCMaker';
        $viewData['subtitle'] = 'List of products';
        if ($request->has('orderByPrice') && $request->get('orderByPrice') == 'asc') {
            $viewData['products'] = Product::orderBy('price', 'asc')->get();
        } else {
            $viewData['products'] = Product::all();
        }

        return view('product.index')->with('viewData', $viewData);

    }

    public function show(string $id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName().' - PCMaker';
        $viewData['subtitle'] = $product->getName().' - Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);

    }
    
}
