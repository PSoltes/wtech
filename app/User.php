<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['id', 'name', 'surname', 'email', 'password', 'address', 'city', 'postcode', 't_number'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->as('cart')->withTimestamps()->withPivot('amount')->orderBy('product_id');
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function hasProduct($id)
    {
        $user = $this;
        foreach ($user->products as $product) {
            if ($product->id == $id) {
                return $product->cart->amount;
            }
        }

        return 0;
    }
}
