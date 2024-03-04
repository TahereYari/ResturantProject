<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBasket extends Model
{
    protected $fillable=['product_id','count','resturant_id','user_id','is_payng'];

  
    use HasFactory;

    
    public function resturant()
    {
        return $this->belongsTo(resturant::class)->first();
    }

    public function product()
    {
        return $this->belongsTo(product::class)->first();
    }
}
