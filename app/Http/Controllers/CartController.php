<?php

namespace App\Http\Controllers;
use App\Notifications\Telegram;
use App\Models\CartProduct;
use Illuminate\Http\Request;
use Darryldecode\Cart\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    public function index(Request $request)
    {
        $sessionId = Session::getId();

        \Cart::session($sessionId);
        $cart = \Cart::getContent();

        $sum = \Cart::getTotal('new_price');

        return view("cart.index", [
            'cart' => $cart,
            'sum' => $sum,
        ]);
    }

    public function remove(Request $request)
    {
        $product = Product::query()->where(['id' => $request->id])->first();
        $sessionId = Session::getId();

        \Cart::session($sessionId);
        \Cart::session($sessionId)->remove([
            'id' => $product->id,
        ]);
        return redirect()->back();
    }


    public function update(Request $request)
    {
        $sessionId = Session::getId();
        $cart = \Cart::getContent();
        $product = Product::query()->where(['id' => $request->id])->first();

        
        \Cart::session($sessionId)->update($request->get("id"), [
            'id' => $product->id, // ! передал id  в надежде что будет понимать что нажимаю
            'quantity' => -1,
        ]);
        $sum = \Cart::session($sessionId)->getTotal('new_price');
        $cartTotalQuantity = \Cart::session($sessionId)->getTotalQuantity() ; // если не отнимать 1 отстает на 1
        return response()->json(['quantity' => -1, 'totalCount' => $sum, 'cart' => $cart, 'totalQuantity' => $cartTotalQuantity]);
    }

    // ------------------------------------------ Store -----------------------------------------------------------

    public function store(Request $request)
    {
        // -------------------------------------
        $validate = $request->validate([
            "address" => "required",
            "phone" => "required",
            "username" => "required",
        ]);

        $order = new CartProduct();
        $order->productname = $request->productname;
        $order->telegram_user_id = $request->telegram_user_id;
        $order->username = $request->username;
        $order->price = $request->price;
        $order->countprod = $request->countprod;
        
        $order->address = $request->address;
        $order->phone = $request->phone;
        
        // telegram_bot
        Notification::send($order, new Telegram); 

        $order->save();

        return redirect()->action("\App\Http\Controllers\CartController@clear")
            ->with("message", $order->id );
    }

    public function create()
    {
        
        $order = CartProduct::all();

        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $allproduct = \Cart::session($sessionId)->getTotalQuantity(); 
        $cart = \Cart::getContent();

        $sum = \Cart::getTotal('new_price');

        return view("cart.order", [
            'cart' => $cart,
            'sum' => $sum,
            'order' => $order,
            'allproduct' => $allproduct,
        ]);
    }


    public function clear(Request $request)
    {
        $sessionId = Session::getId();
        $cart = \Cart::getContent();
        \Cart::session($sessionId);
        \Cart::session($sessionId)->clear($cart);

        return redirect()->back();
    }
}
