<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class resturant extends Model
{
    protected $fillable = ['title' ,'address' ,'image' ,'counter' ,'description' ];
    public function resturant()
    {
        return $this->hasMany(resturant::class)->get();
    }
}
