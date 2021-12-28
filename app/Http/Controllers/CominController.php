<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\AdminCome;

class CominController extends Controller
{

    public function index(Request $request)
    {

        $admin = AdminCome::all();
        $name = session()->get('name');
        $password = session()->get('password');

        return view("admin_come.index", ["admin" => $admin], ["admin" => $name, $password]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "name" => "required|max:100",
            "password" => "required",
        ]);

        $admin = new AdminCome();
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);  //проверка на идентичность хешированного пароля с тем что ввели;
        // $admin->password = $request->password; // не захешированный пароль
        $admin->save();

        return redirect()->action("\App\Http\Controllers\CominController@index")
            ->with("message", "Новый Пользователь Добавлен");
    }
}
