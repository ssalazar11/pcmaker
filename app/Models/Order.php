<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'idUser',
        'dateOrder',
        'totalOrder',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getUserId(): int
    {
        return $this->attributes['idUser'];
    }

    public function setUserId($idUser): void
    {
        $this->attributes['idUser'] = $idUser;
    }

    public function getDateOrder(): string
    {
        return $this->attributes['dateOrder'];
    }

    public function setDateOrder($dateOrder): void
    {
        $this->attributes['dateOrder'] = $dateOrder;
    }

    public function getTotalOrder(): float
    {
        return $this->attributes['totalOrder'];
    }

    public function setTotalOrder($totalOrder): void
    {
        $this->attributes['totalOrder'] = $totalOrder;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'idOrder', 'idProduct')
            ->withPivot('availability', 'price');
    }

    public function calculateTotal()
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->pivot->availability * $product->pivot->price;
        }
        return $total;
    }
}
