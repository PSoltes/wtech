<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('app\Product')->withTimestamps();
    }
    public function owner()
    {
        return $this->belongsTo('app\User');
    }
}
