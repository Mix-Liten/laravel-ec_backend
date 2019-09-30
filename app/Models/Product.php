<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $guarded = [];

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
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
