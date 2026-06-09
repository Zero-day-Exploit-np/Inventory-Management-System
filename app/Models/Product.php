<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = [
        'category_id',
        'name',
        'sku',
        'purchase_price',
        'selling_price',
        'stock',
        'description',
        'image'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
