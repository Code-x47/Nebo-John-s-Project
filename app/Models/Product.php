<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Protected $fillable = [
        "name",
        "price",
        "stock"
    ];
}
