<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users()
    {
        return $this->belongsToMany('app\User')->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany('app\Order')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
