<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Http\Request;
use PDF;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{


    protected $table = 'sales'; // MUST be this

    //

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $fillable = [
        'product_id',
        'quantity',
        'selling_price',
        'sale_date',
    ];


    public function getTotalAttribute()
    {
        return $this->quantity * $this->selling_price;
    }


    public function getProfitAttribute()
    {
        return ($this->selling_price - $this->product->purchase_price) * $this->quantity;
    }
}
