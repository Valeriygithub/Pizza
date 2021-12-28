<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\AdminCome;

class LoockController extends Controller
{
   
    
    public function autentent(Request $request)
    {
        $admin = AdminCome::all();
        foreach($admin as $ad) {
            $ad->name;
            $ad->password;
        };

        $session = session();
        $session->put('name',  $ad->name);
        $session->put('password',  $ad->password);

        if (Hash::check('password', $ad->password)) {
            // The passwords match...
            return redirect()->action("\App\Http\Controllers\AdminController@index")
                ->with("password",   $ad->name );
        }

        // return redirect()->action("\App\Http\Controllers\CominController@index")
        //     ->with("name", "password " .  $ad->name . '<br>' .  $ad->password);

    }

    public function index(Request $request)
    {

        $admin = AdminCome::all();
        $name = session()->get('name');
        $password = session()->get('password');
        if($test = session('password')){
            $test = session('password');
        }
        // dd($name, $password);


        return view("lock.index", ["admin" => $admin], ["admin" => $name, $password]);

        // return redirect()->action("\App\Http\Controllers\AdminController@index")
        //     ->with("mymesege", "ПЕРЕДАЮ СЕСИЮ $admin")
    }

    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     "name" => "required|max:100",
        //     "password" => "required",
        // ]);

        $admin = AdminCome::all();
        foreach($admin as $ad) {
            $ad->name;
            $ad->password;
       
        // $admin = $request->password;

        $session = session();
        $session->put('name',  $ad->name);
        $session->put('password',  $ad->password);

        if (Hash::check($request->password, $ad->password)) {
            // The passwords match...
            return redirect()->action("\App\Http\Controllers\AdminController@index")
                ->with("password", "Вернуло " . $ad->name,  $ad->password );
                $session->put('name',  $ad->name);
                $session->put('password',  $ad->password);
        }
    };
        return redirect()->action("\App\Http\Controllers\LoockController@index")
            ->with("password", "$ad->password");
    }
    
}
