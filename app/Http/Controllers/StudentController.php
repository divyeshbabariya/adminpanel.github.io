<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentController extends Controller
{
    function addStudent(Request $req)
    {

        $student = new student;

        $student->f_name = $req->f_name;
        $student->l_name = $req->l_name;
        $student->email = $req->email;
        $student->password = base64_encode($req->password);
        $student->mobile_no = $req->mobile_no;
        $student->image = $req->image;
        //$student->save();

        if ($student->save()) {
            return  json_encode(["result" => "Data has been Saved"]);
        } else {
            return  json_encode(["result" => "Operation Failed"]);
        }
    }

    function listdata()
    {

        return student::all();
    } //


    function student_table(){

        $data=student::all();
         return view('student/student_table',["students"=>$data]);
        
    }




}


 