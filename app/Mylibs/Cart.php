<?php

namespace App\Mylibs;

class Cart
{

    public $product, $amount;

    /**
     * @param integer
     * @param integer
     * @return mixed
     */
    public function __construct($product, $amount)
    {
        $this->product = $product;
        $this->amount = $amount;
    }


}