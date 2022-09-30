<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class EcomController extends Controller
{
    function home(){

        // $cartItems = \Cart::getContent()->toArray();

        // $products = Product::all()->reverse();

        // $bestProducts = Product::all();

        // $laptopProducts = Product::where('type', 1)->get()->reverse();

        // $desktopProducts = Product::where('type', 2)->get()->reverse();

        // $accessoriesProducts = Product::where('type', 3)->get()->reverse();

        //return view('welcome',compact('products', 'laptopProducts', 'desktopProducts', 'accessoriesProducts', 'bestProducts', 'cartItems'));

        return view('home');
    }

    function getDetails($id){

        $product = Product::find($id);

        $bestProducts = Product::all();

        return view('product',compact('product', 'bestProducts'));
    }

    function getCheckout(){

        return view('checkout');
    }

    public function cartList()
    {
        return view('cart');
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function pay(Request $request)
    {
            $cartItems = \Cart::getContent()->toArray();
            $commande = "";
            foreach($cartItems as $cart){
                $commande = $commande .' ' . $cart['name'] .' '. $cart['price'];
            }

            $commande = $commande .' avec un total de : FCFA ' . \Cart::getTotal();

            \Cart::clear();

            return redirect()->away('https://api.whatsapp.com/send?phone=+237676293719&text=Le client ' . $request->name . ' est intéréssé par cette commande : ' . $commande);
    }

    public function getPurchases(){
        if(Auth::user()){
            $products = Product::all();
            // dd($products);
            // return view('user/static/purchases', compact('products'));
            return view('user/static/purchases');
        }
    }

}
