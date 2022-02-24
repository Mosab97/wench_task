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
    $co = new Checkout();
    /* Case1*/
//    $co->scan('FR1');
//    $co->scan('SR1');
//    $co->scan('FR1');
//    $co->scan('FR1');
//    $co->scan('CF1');
    /***************************************/
    /* Case2*/
//    $co->scan('FR1');
//    $co->scan('FR1');


    /***************************************/
    /* Case3*/
    $co->scan('SR1');
    $co->scan('SR1');
    $co->scan('FR1');
    $co->scan('SR1');
    dd($co->total, $co->cart);
});
