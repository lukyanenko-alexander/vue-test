<?php

namespace App\Http\Controllers;

use App\Product;
use App\Testcart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function home(){
        $test = Testcart::find(1);

        return view('welcome', [
           'test' => $test,
        ]);
    }

    public function index(){
    }

    public function getCart(){
        return response()->json([
            'total'=>Cart::total(),
            'count'=>Cart::count()
        ]);
    }

    public function addCart(){
        $product = Product::find(request()->id);
        Cart::add($product->id, $product->title, 1, $product->price);

        return response()->json([
            'total'=>Cart::total(),
            'count'=>Cart::count()
        ]);
    }
}
