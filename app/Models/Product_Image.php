<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id', 'name'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
