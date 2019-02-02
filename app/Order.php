<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'user_id', 'name', 'address', 'city', 'postcode', 't_number'];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('amount');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
