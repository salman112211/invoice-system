<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{


    use HasFactory;

    
    
    protected $fillable = [
        'invoice_date', // Add invoice_date to the fillable array
        'name',
        'email',
        'phone',
        'address',
        'status',
        'description',
        'price',
        'quantity',
        'total',
        'vat',
        'sub_total',
        'dynamic_data', // If you have a dynamic_data field in your table
    ];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class, 'status', 'product_name');
    // }
    
        
}

