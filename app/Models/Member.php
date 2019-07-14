<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthday',
        'address', 'is_active'
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function carts()
    {
        return $this->hasMany('App\Models\Cart');
    }
}
