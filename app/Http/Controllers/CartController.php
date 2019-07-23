<?php

namespace App\Http\Controllers;

use App\Product;
use App\Testcart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function index(){
        return view('cart.cart');
    }

    public function cartContent(){

        $newCart=[];

        foreach (Cart::content() as $cartItem){
            array_push($newCart, $cartItem);
        }

//        dump(Cart::content());
        return response()->json(Cart::content());
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

    public function destroyItem(){
        Cart::remove(request()->rowId);
        return response()->json(Cart::content());
    }

    public function updateQty(){
        Cart::update(request()->rowId, request()->qty);
        return response()->json(Cart::content());
    }
}
