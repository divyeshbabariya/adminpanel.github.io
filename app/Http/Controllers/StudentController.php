<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Illuminate\Support\Facades\Validator;

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

        $pic = $req->file('image');
        $fileArray = array('image' => $pic);
        $rules = array('image' => 'mimes:jpeg,jpg,png,gif|required');
        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails()) {
            echo "fail";
        } else {
            $s_max = student::max('s_id');
            if (empty($s_max)) {
                $new_file = "student_." . $pic->getClientOriginalExtension();
            } else {
                $new_file = "student_." . $s_max . "." . $pic->getClientOriginalExtension();
            }
            $pic->move("public/images/photo/student", $new_file);
            $student->image = $new_file;


            if ($student->save()) {
                return  json_encode([
                    "message" => "Data has been Saved successfully",
                    "status" => "1",
                    "f_name" => "$req->f_name",
                    "l_name" => "$req->l_name",
                    "email" => "$req->email",
                    "password" => "$req->password",
                    "mobile_no" => "$req->mobile_no",
                    


                ]);
            } else {
                return  json_encode(["message" => "Operation Failed", "status" => "0"]);
            }
        }
    }

    //API
    function listdata()
    {

        return student::all();
    }


    function student_table()
    {

        $data = student::paginate(7);
        return view('student/student_table', ["students" => $data]);
    }

    function delete_student($s_id)
    {
        // $data = student::find($s_id);
        // //echo "$data"
        // $data->delete();
        // return redirect("student_table");
        
        $data = student::find($s_id);
    
        		$Path ='public/images/photo/student/'.$data->image;
        		unlink($Path);
    
        student::where('s_id',$data->s_id)->delete();
        	$data->delete();
            return redirect("student_table");
        
    }

    function add(Request $req)
    {
        $this->validate($req, [

            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile_no' => 'required',
            // 'image.*'=>'required|image|mimes:jpg,png,jpeg|max:2048'

        ]);

        $student = new student;

        $student->f_name = $req->f_name;
        $student->l_name = $req->l_name;
        $student->email = $req->email;
        $student->password = base64_encode($req->password);
        $student->mobile_no = $req->mobile_no;
        // $student->image = $req->image;

        $pic = $req->file('image');
        $fileArray = array('image' => $pic);
        $rules = array('image' => 'mimes:jpeg,jpg,png,gif|required');
        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails()) {
            echo "fail";
        } else {
            $s_max = student::max('s_id');
            if (empty($s_max)) {
                $new_file = "student_." . $pic->getClientOriginalExtension();
            } else {
                $new_file = "student_." . $s_max . "." . $pic->getClientOriginalExtension();
            }
            $pic->move("public/images/photo/student", $new_file);
            
            $student->image = $new_file;
            if ($student->save()) {
                $status = ['message' => "Inserted Successfully", 'status' => 1];
            } else {
                $status = ['message' => "Not Inserted", 'status' => 0];
            }
        }
        return view('student/student_form');
    }

    function show_update_data($s_id)
    {

        $data = student::find($s_id);
        return view("student/update_student", ['updatedata' => $data]);
    }

    function update_student(Request $req)
    {
        $this->validate($req, [

            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'mobile_no' => 'required',


        ]);

        $data = student::find($req->s_id);

        $data->f_name = $req->f_name;
        $data->l_name = $req->l_name;
        $data->email = $req->email;
        $data->password = base64_encode($req->password);
        $data->mobile_no = $req->mobile_no;


        //$data->image = $req->image;
        $pic = $req->file('image');
        $fileArray = array('image' => $pic);
        $rules = array('image' => 'mimes:jpeg,jpg,png,gif|required');
        $validator = Validator::make($fileArray, $rules);
        if ($validator->fails()) {
            echo "fail";
        } else {

            if (empty($req->image)) {
                $new_file = "student_." . $pic->getClientOriginalExtension();
            } else {
                $new_file = "student_." . $req->s_id . "." . $pic->getClientOriginalExtension();
            }
            $pic->move("public/images/photo/student", $new_file);
            $data->image = $new_file;
        }

        if ($data->save()) {
            return redirect("student_table");
        } else {
            echo "Error";
        }
    }







    // public function destroy(Request $request)
    // {
    // 	$objProperty=Property::find($request->id);

    // 		$Path ='public/admin/images/property_gallary/'.$objProperty->photo;
    // 		unlink($Path);

    // 	PropertyGallary::where('property_id',$objProperty->id)->delete();
    // 	$objProperty->delete();
    // }
}
