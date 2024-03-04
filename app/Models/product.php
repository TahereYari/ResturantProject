<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable =['name' ,'price','category_id' , 'resturant_id'];

    public function category()
    {
       return $this->belongsTo(category::class)->first();
    }

    public function resturant()
    {
        return $this->belongsTo(resturant::class)->first();
    }
}
