<?php

namespace App\Http\Controllers;

use App\Product;
use App\Testcart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class TestcartController extends Controller
{
    public function index(){

        $test = Testcart::find(1);

        if(\request()->expectsJson()){
            return response()->json($test->toArray());
        }

        return view('welcome', [
           'test' => $test,
        ]);
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

//        $test = Testcart::find(1);
//
//        $test -> update([
//            'total' => $test->total + $request->price
//        ]);
//
//        if(\request()->expectsJson()){
//            return response()->json($test->toArray());
//        }
//
//        return view('welcome', [
//            'test' => $test,
//        ]);
    }
}
