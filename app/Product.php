<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->as('cart')->withTimestamps()->withPivot('amount');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withTimestamps()->withPivot('amount');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
