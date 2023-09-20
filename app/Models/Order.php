<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
    return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('availability');
    }


    public function getStatus()
    {
        return $this->attributes['status']; 
    }

    public function setStatus($status)
    {
       
        $this->attributes['status'] = $status;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = round($total, 2); 
    }
}
