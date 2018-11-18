<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->hasMany('app\Product')->withTimestamps()->withPivot('amount');
    }
    public function owner()
    {
        return $this->belongsTo('app\User');
    }
}
