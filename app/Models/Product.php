<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id', 'name', 'price', 'price_origin', 'unit',
        'qty', 'description', 'content', 'is_active'
    ];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Product_Image');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}
