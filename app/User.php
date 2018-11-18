<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable =['name', 'surname', 'email', 'password', 'address', 'city', 'postcode', 't_number'];

    public function orders()
    {
        return $this->hasMany('app\Order')->withTimestamps();
    }
    public function products()
    {
        return $this->hasMany('app\Product')->withTimestamps()->withPivot('amount');
    }
}
