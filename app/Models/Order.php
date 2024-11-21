<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_name',
        'address',
        'payment_details',
    ];

  
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity'); // Quantity is stored in pivot table
    }
}
