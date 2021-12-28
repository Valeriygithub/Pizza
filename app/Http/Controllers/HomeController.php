<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{

    public function index()
    {

        $product = Product::all();
        // !-------------------Сессия--------------------------------
        $sessionId = Session::getId();
        \Cart::session($sessionId);
        $cart = \Cart::getContent();
        // !-------------------Сессия--------------------------------

        return view("home.index", [
            "product" => $product,
            'cart' => $cart,
            // 'sum' => $sum,
        ]);
    }

    public function create()
    {
        $product = Product::all();
        return view("home.create", ["product" => $product]);
    }

    // ------------------------------------------ Store -----------------------------------------------------------

    public function store(Request $request)
    {
        $validate = $request->validate([
            "productname" => "required|max:100",
            "price" => "required|max:100",
            "description" => "required",
            "new_price" => 'required',
        ]);

        $product = new Product();
        $product->productname = $request->productname;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->description = $request->description;

        $requestFile = $request->file('imagesPath');
        if ($requestFile != null) {
            $originalName = time() . '-' . $requestFile->getClientOriginalName(); // формирование имя файла
            $requestFile->move(public_path() . "/images", $originalName); //
            $product->imagePath = "/images/" . $originalName;
        }

        $product->save();

        return redirect()->action("\App\Http\Controllers\HomeController@create")
            ->with("message", "New block " . $product->id . " has been add completed!!!");
    }

    // ----------------- Show ----------------------


    public function show($id)
    {
        $product = Product::query()->where("id", $id)->first();
        return view("home.show", ['product' => $product]);
    }


    // ---------------------------------- EDITE -----------------------------

    public function edit($id)
    {
        $product = Product::query()->where("id", $id)->first();
        return view("home.edit", ["product" => $product]);
    }

    // ---------------------------------- Update -----------------------------

    public function update(Request $request, $id)
    {
        $product = Product::query()->where("id", $id)->first();

        $product->productname = $request->productname;
        $product->price = $request->price;
        $product->new_price = $request->new_price;
        $product->description = $request->description;

        $requestFile = $request->file('imagesPath');
        if ($requestFile != null) {
            $originalName = time() . '-' . $requestFile->getClientOriginalName();
            $requestFile->move(public_path() . "/images", $originalName);
            $product->imagePath = "/images/" . $originalName;
        }
        $product->save();

        return redirect()->action("\App\Http\Controllers\HomeController@index")
            ->with("message", "Product " . $product->id . " has been update completed!!!");
    }

    // ---------------------------------- DELETE  работает-----------------------------
    public function destroy($id)
    {
        $product = Product::query()->where("id", $id)->first();
        if ($product != null) {
            $product->delete();
            $fileName = public_path() . $product->imagePath;
            if (file_exists($fileName)) {
                unlink($fileName);
            }
        }
        return redirect()->action("\App\Http\Controllers\HomeController@index")
            ->with("message", "Delete Product " . $product->id . " completed!!!");
    }


    // ------------------ Второй метод ----------------------
    public function addCart(Request $request)
    {
        $sessionId = Session::getId();
        $product = Product::query()->where(['id' => $request->id])->first();
        $cart = \Cart::getContent();
        
        // $summedPrice  =  \Cart::get($sessionId)->getPriceSum();  // попробовать
        
        $cartTotalQuantity = \Cart::session($sessionId)->getTotalQuantity() + 1; // Количество (добывил +1 чтоб не отставалло от реальной цифры) но тогда тоже тупит
        $qty = 1;
        
        \Cart::session($sessionId)->add([
            'id' => $product->id,
            'name' => $product->productname,
            'price' => $product->new_price ? $product->new_price : $product->price,
            'imagePath' => $product->imagePath,
            'quantity' => $qty,
            'attributes' => [
                'image' => $product->imagePath,
                'description' => $product->description,
                ]
            ]);
            
            $sum = \Cart::session($sessionId)->getTotal('new_price'); // Общя сумма
        return response()->json([
            'quantity' => $qty,
            'id' => $product->id,
            'totalCount' => $sum,
            'totalQuantity' => $cartTotalQuantity,
            'cart' => $cart,
            // 'cartTotalQuantity' => $cartTotalQuantity
        ]);
    }


    public function contact()
    {
        return view("home.contact");
    }
}
