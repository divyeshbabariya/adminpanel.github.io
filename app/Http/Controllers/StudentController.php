<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentController extends Controller
{
    //API
    function addStudent(Request $req)
    {

        $student = new student;

        $student->f_name = $req->f_name;
        $student->l_name = $req->l_name;
        $student->email = $req->email;
        $student->password = base64_encode($req->password);
        $student->mobile_no = $req->mobile_no;
        $student->image = $req->image;
       // $pic=$req->image;
     //   $req->file('image')->store('img');
        //$student->save();

        if ($student->save()) {
            return  json_encode(["message" => "Data has been Saved successfully", "status" => "1"]);
        } else {
            return  json_encode(["message" => "Operation Failed", "status" => "0"]);
        }
    }

    //API
    function listdata()
    {

        return student::all();
    }


    function student_table()
    {

        $data = student::all();
        return view('student/student_table', ["students" => $data]);
    }

    function delete_student($s_id)
    {
        $data = student::find($s_id);
        //echo "$data"
        $data->delete();
        return redirect("student_table");
    }

    function add(Request $req)
    {
        $this->validate($req,[
            
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile_no'=>'required',
            'image.*'=>'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        $student = new student;

        $student->f_name = $req->f_name;
        $student->l_name = $req->l_name;
        $student->email = $req->email;
        $student->password = base64_encode($req->password);
        $student->mobile_no = $req->mobile_no;
        //$student->image = $req->image;
        
        $files=array();
        if($req->hasFile('image')){
            $image=$req->file('image');
            
            foreach($image as $k =>$val)
            {
                $path=public_path('/images');
                $filename=time().$k.'.'.$val->extension();
                $val->move($path,$filename);
                $files[]=$filename;
            }
        }





        if ($student->save()) {
            return view('student/student_form');
        } else {
            echo "Error";
        }
    }

    function show_update_data($s_id)
    {

        $data = student::find($s_id);
        return view("student/update_student", ['updatedata' => $data]);
    }

    function update_student(Request $req)
    {
        $this->validate($req,[
            
            'f_name'=>'required',
            'l_name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'mobile_no'=>'required',
            'image.*'=>'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);
        
        $data = student::find($req->s_id);

        $data->f_name = $req->f_name;
        $data->l_name = $req->l_name;
        $data->email = $req->email;
        $data->password = base64_encode($req->password);
        $data->mobile_no = $req->mobile_no;
        if (isset($req->image)) {
            $data->image = $req->image;
        }

        if ($data->save()) {
            return redirect("student_table");
        } else {
            echo "Error";
        }
    }
}
