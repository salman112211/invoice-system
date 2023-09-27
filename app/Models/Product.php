<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name'];

    // public function userVerifications()
    // {
    //     return $this->hasMany(UserVerification::class, 'status', 'product_name');
    // }

    
}

