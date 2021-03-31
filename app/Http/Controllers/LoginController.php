<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Student;

class LoginController extends Controller
{
    function loginAdmin(Request $req)
    {

        $username = $req->username;
        $password = $req->password;
        $data = Admin::Where('username', $username)->Where('password', $password)->first();

        if (!empty($data)) {

           $req->session()->put('data',$req->input());
                

                return redirect('home');
            }else {
                echo "Incorrect username or password";
                return redirect('form');
            }
        
    }


    function logout()
    {
        session()->forget('data');
        return view('login/form');
    }

    function home(){

        // $count_student= (Student::all()); 
        $count_student=count(Student::all());

        if (session()->has('data')) {
            return view('home',compact('count_student'));
          } else {
            return view('form');
          }
    }


    function form(){
       
        // $count_student= count(Student::all());
        if (session()->has('data')) {
            return redirect('home');
          } else {
            return view('login/form');
          }
    }
}
