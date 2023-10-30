<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        $viewData["products"] = Product::all();
        return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            'image' => 'image',
        ]);

        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setAvailability($request->input('availability'));
        $imageFile = $request->file('image');
        if ($imageFile && $imageFile->isValid()) {
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs('products', $imageName, 'public');
            $newProduct->setImage($imagePath);
        }
        $newProduct->save();

        return back();
    }

    public function update(Request $request, $id){
        $product=Product::find($id);
        if ($product) {
            $request->validate([
                "name" => "required|max:255",
                "description" => "required",
                "price" => "required|numeric|gt:0",
                'image' => 'image',  // Asegúrate de manejar la subida de la imagen en el futuro
            ]);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->save();
        return redirect()->route('admin.product.index');
        }
        return back()->withErrors('Product not found.');
    }

    public function destroy($id){
        $product=Product::find($id);
        if($product && $product->getId()==$id){
            $product->delete();
            return redirect()->route('admin.product.index');
        }
        return redirect()->withErrors('product not found');
    }
}
