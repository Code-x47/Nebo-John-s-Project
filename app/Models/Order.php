<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    

    
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    const CREATED_AT = 'created_at';
    const UPDATED_AT = null; 
}
