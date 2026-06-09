<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    protected $table = 'sales'; // MUST be this

    //
    protected $fillable = [
        'product_id',
        'quantity',
        'selling_price',
        'sale_date',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function getProfitAttribute()
    {
        return ($this->selling_price - $this->product->cost_price) * $this->quantity;
    }
}
