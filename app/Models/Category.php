<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;    

    protected $fillable = ['image','name','status'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id','id');
    }

    public function scopeIsActive($query)
    {
        return $this;
    }
    
}
