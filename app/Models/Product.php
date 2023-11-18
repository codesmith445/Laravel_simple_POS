<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
       'product_name',
       'description',
       'brand',
       'price',
       'quantity',
       'barcode',
       'qrcode',
       'product_image',
       'alert_stock'
    ];

    public function orderdetail() {
        return $this->hasMany('App\Models\Order_Detail');
    }

    public function cart() {
        return $this->hasMany('App\Models\Cart');
    }
}
