<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Item extends Model
{
     
    use HasFactory;

    protected $table = "order_items";

    protected $fillable = ['order_id', 'product_id', 'quantity', 'price']; // Allow mass assignment for these fields

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
