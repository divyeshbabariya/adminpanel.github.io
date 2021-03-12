<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    function addStudent(Request $req){

        $student= new Student;

        $student->f_name=$req->f_name;
        $student->l_name=$req->l_name;
        $student->email =$req->email;
        $student->password =base64_encode($req->password);
        $student->mobile_no =$req->mobile_no;
        $student->image= $req->image;
        //$student->save();
        if($student->save()) {
            return ["result" => "Data has been Saved"];
        } else {
            return ["result" => "Operation Failed"];
        }

    }

    function listdata()
    {

        return Student::all();
    } //
}
