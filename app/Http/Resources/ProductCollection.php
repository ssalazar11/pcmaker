<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($product) {
                return [
                    'id' => $product->getId(),
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'productLink' => route('product.show', ['id' => $product->getId()]),
                ];
            }),
            'additionalData' => [
                'storeName' => 'PCMaker',
                'storeProductsLink' => 'http://127.0.0.1:8000/products',
            ],
        ];
    }
}