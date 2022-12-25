<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    public $timestamps = false; // loại bỏ created_at, updated_at
    protected $fillable = [
        'email',
        'token'
    ];
}