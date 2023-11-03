<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - PCMaker";
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
        $imageFile = $request->file('image');
        if ($imageFile && $imageFile->isValid()) {
            $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs('products', $imageName, 'public');
            $newProduct->setImage($imagePath);
        }
        $newProduct->save();

        return back();
    }

    public function edit($id)
{
    $product = Product::find($id);
    if (!$product) {
        return redirect()->route('admin.product.index')->withErrors('Product not found.');
    }
    $viewData = [
        'title' => 'Edit Product - ' . $product->getName(),
        'product' => $product
    ];
    return view('admin.product.edit')->with("viewData", $viewData);
}


public function update(Request $request, $id)
{
    $product = Product::findOrfail($id);  // Si el producto no existe, Laravel arrojará automáticamente una excepción.

    // Validar los datos recibidos del formulario
    $request->validate([
        "name" => "required|max:255",
        "description" => "required",
        "price" => "required|numeric|gt:0",
        'image' => 'image',
    ]);

    // Actualizar los atributos del producto
    $product->setName($request->input('name'));
    $product->setDescription($request->input('description'));
    $product->setPrice($request->input('price'));

    // Manejar la subida de una nueva imagen, si se proporciona
    $imageFile = $request->file('image');
    if ($imageFile && $imageFile->isValid()) {
        // Eliminar la imagen anterior si existe
        if ($product->getImage() && Storage::disk('public')->exists($product->getImage())) {
            Storage::disk('public')->delete($product->getImage());
        }
        
        $imageName = time() . '.' . $imageFile->getClientOriginalExtension();
        $imagePath = $imageFile->storeAs('products', $imageName, 'public');
        $product->setImage($imagePath);
    }

    // Guardar los cambios en la base de datos
    $product->save();

    return redirect()->route('admin.product.index');
}
    

    public function destroy($id){
        $product=Product::find($id);
        if($product && $product->getId()==$id){
            $product->delete();
            return redirect()->route('admin.product.index');
        }
        return back();
    }
}
