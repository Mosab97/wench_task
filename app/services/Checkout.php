<?php


namespace App\services;


class Checkout
{
    public $total = 0;
    public $cart = [
        'FR1' => 0,
        'SR1' => 0,
        'CF1' => 0,
    ];
    public $products = [
        'FR1' => [
            'product_code' => 'FR1',
            'name' => 'Fruit Tea',
            'price' => 3.11,
        ],
        'SR1' => [
            'product_code' => 'SR1',
            'name' => 'Strawberry',
            'price' => 5,
        ],
        'CF1' => [
            'product_code' => 'CF1',
            'name' => 'Coffee',
            'price' => 11.23,
        ],
    ];


    public function scan($item_code)
    {
        $this->cart[$item_code] = $this->cart[$item_code] + 1;
        if ($item_code == 'FR1') {
            $qty = $this->cart[$item_code];
            $qty = ($qty % 2 == 0) ? $qty / 2 : $qty - $qty % 2; // If you buy one Fruit Tea get another for free
            $this->total += ($this->products[$item_code]['price'] * $qty);
        } else {
            if ($this->cart['SR1'] >= 3) $this->products['SR1']['price'] = 4.5;
            else $this->products['SR1']['price'] = 5;
            $this->total += $this->products[$item_code]['price'];
        }
    }

    public function checkFR1Product()
    {

    }
}
