<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false; // loại bỏ created_at, updated_at
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price'
    ];
}
