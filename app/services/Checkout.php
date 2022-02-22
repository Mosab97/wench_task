<?php


namespace App\services;


class Checkout
{
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
            'name' => 'Strawberry',
            'price' => 11.23,
        ],
    ];

    public function scan($item_code)
    {
        return $this->products[$item_code];
    }

    public function getTotal(array $cart)
    {
        if ($cart['SR1'] >= 3) $this->products['SR1']['price'] = 4.5;
        else $this->products['SR1']['price'] = 5;
        $total = 0;
        foreach ($cart as $item_code => $item_amount) {
            $product = $this->scan($item_code);
            if ($item_code == 'FR1') $total += $this->getFR1Total($product, $item_amount, $total);
            else $total += ($product['price'] * $item_amount);
        }
        return $total;

    }

    private function getFR1Total($product, $item_amount, $total)
    {
        if ($item_amount > 1) {
            $total += $product['price'] * ($item_amount - 1);
        } else {
            $total += $product['price'];
        }
        return $total;

    }

}
