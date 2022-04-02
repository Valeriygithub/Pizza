<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\AdminCome;
use App\Models\CartProduct;

class AdminController extends Controller
{


    public function index()
    {
        $product = Product::all();
        $admin = AdminCome::all();
        return view("admin.index", ["product" => $product, "admin" => $admin]);
    }

    public function create()
    {
        // -------------------------------------
        $admin = AdminCome::all();
        foreach ($admin as $ad) {
            $ad->name;
            $ad->password;
        };
        $session = session();
        $session->put('name', $ad->name);
        $session->put('password',  $ad->password);
        // -------------------------------------
        $product = Product::all();
        return view("admin.create", ["product" => $product]);
    }
    // ------------------------------------------ Store -----------------------------------------------------------

    public function store(Request $request)
    {

        // -------------------------------------
        $admin = AdminCome::all();
        foreach ($admin as $ad) {
            $ad->name;
            $ad->password;
        };
        $session = session();
        $session->put('name', $ad->name);
        $session->put('password',  $ad->password);
        // -------------------------------------

        $validate = $request->validate([
            "productname" => "required|max:100",
            "price" => "required|max:100",
            "description" => "required|max:132",
            "imagesPath" => "required",
            "new_price" => 'nullable',
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

        return redirect()->action("\App\Http\Controllers\AdminController@create")
            ->with("message",  "Новый продукт " . $product->id . " Добавлен");
    }

    // ----------------- Show ----------------------

    public function show($id)
    {
        // -------------------------------------
        $admin = AdminCome::all();
        foreach ($admin as $ad) {
            $ad->name;
            $ad->password;
        };
        $session = session();
        $session->put('name', $ad->name);
        $session->put('password',  $ad->password);
        // -------------------------------------

        $product = Product::query()->where("id", $id)->first();
        return view("admin.show", ['product' => $product]);
    }
    // ---------------------------------- EDITE -----------------------------

    public function edit($id)
    {
        $product = Product::query()->where("id", $id)->first();
        return view("admin.edit", ["product" => $product]);
    }
    // ---------------------------------- Update -----------------------------

    public function update(Request $request, $id)
    {
        // -------------------------------------
        $admin = AdminCome::all();
        foreach ($admin as $ad) {
            $ad->name;
            $ad->password;
        };
        $session = session();
        $session->put('name', $ad->name);
        $session->put('password',  $ad->password);
        // -------------------------------------

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

        return redirect()->action("\App\Http\Controllers\AdminController@index")
            ->with("message", "Product " . $product->id . " has been update completed!!!");
    }
    // ---------------------------------- DELETE-----------------------------
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
        return redirect()->action("\App\Http\Controllers\AdminController@index")
        ->with("message", "Delete Product " . $product->id . " completed!!!");
    }
    
    // ! ---------------------------------- CartProduct -----------------------------

    public function cartProduct()
    {
        $product = CartProduct::all();
        return view("admin.cartProduct", ["product" => $product]);
       
    }
}
