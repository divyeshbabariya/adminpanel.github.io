<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class LoginController extends Controller
{
    function loginAdmin(Request $req)
    {

        $username = $req->username;
        $password = $req->password;
        $data = Admin::Where('username', $username)->Where('password', $password)->first();

        if (!empty($data)) {

            $data=$req->session()->get('users');
                

                return view('home');
            }else {
                echo "Incorrect username or password";
                return view('login/form');
            }
        
    }


    function logout()
    {
        session()->flush();
        return view('login/form');
    }
}
