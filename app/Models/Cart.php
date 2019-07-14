<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'product_id', 'quantity', 'is_next'
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
