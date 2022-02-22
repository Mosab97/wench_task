<?php

use App\services\Checkout;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cart1 = [
        'FR1' => 3,
        'SR1' => 1,
        'CF1' => 1,
    ];
    $cart2 = [
        'FR1' => 2,
        'SR1' => 0,
        'CF1' => 0,
    ];
    $cart3 = [
        'FR1' => 1,
        'SR1' => 3,
        'CF1' => 0,
    ];
    $co = new Checkout();
    $cart1_total = $co->getTotal($cart1);
    $cart2_total = $co->getTotal($cart2);
    $cart3_total = $co->getTotal($cart3);
    return [
        'cart1' => [
            'items' => $cart1,
            'total' => $cart1_total,
        ],
        'cart2' => [
            'items' => $cart2,
            'total' => $cart2_total,
        ],
        'cart3' => [
            'items' => $cart3,
            'total' => $cart3_total,
        ],
    ];
    dd($cart1_total, $cart2_total, $cart3_total);
    $item = $co->scan('FR1');
    return $item;
});
