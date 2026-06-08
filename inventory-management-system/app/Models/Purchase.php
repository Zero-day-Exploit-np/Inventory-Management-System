<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id',
        'product_id',
        'quantity',
        'purchase_price',
        'purchase_date',
    ];
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
