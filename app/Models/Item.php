<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

     /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the product quantity
     * $this->attributes['subtotal'] - int - contains the product subtotal price
    */


    protected $fillable = [
        'quantity',
        'subtotal',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getSubtotal(): int
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal(): void
    {
        $this->attributes['subtotal'] = $subtotal;
    }

}
