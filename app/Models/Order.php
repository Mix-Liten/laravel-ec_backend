<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'member_id', 'coupon_id', 'price_total', 'name_receive',
        'phone_receive', 'address_receive'
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon');
    }
}
