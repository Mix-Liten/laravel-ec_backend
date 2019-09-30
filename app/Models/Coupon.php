<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';

    protected $fillable = [
        'name', 'amount', 'usage_limit', 'expiry_date', 'is_active'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}
