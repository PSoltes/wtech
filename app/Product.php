<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users()
    {
        return $this->belongsToMany('app\User')->withTimestamps()->withPivot('amount');
    }

    public function orders()
    {
        return $this->belongsToMany('app\Order')->withTimestamps()->withPivot('amount');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
