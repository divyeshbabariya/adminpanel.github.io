@extends('master')
@section('student_table')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Student Details</strong>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    {{-- <th scope="col">L_NAME</th> --}}
                    <th scope="col">E-MAIL</th>
                    <th scope="col">MOBILE</th>
                    <th scope="col">PROFILE PC</th>
                    <th scope="col">UPDATE</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{$student['s_id']}}</th>
                    <td>{{$student['f_name']." ".$student['l_name']}}</td>
                    {{-- <td>{{$student['l_name']}}</td> --}}
                    <td>{{$student['email']}}</td>
                    <td>{{$student['mobile_no']}}</td>
                    <td><img src='{{url("public/images/photo/student/$student->image")}}' style="height: 40px; width:45px;border-radius: 30%;"></td>
                    <td align="center"><a href={{ "update".$student['s_id'] }}><h4 class="text-primary"><span class="ti-pencil"></h4></a></td>
                    <td align="center"><a href={{ "delete".$student['s_id'] }}><h4 class="text-danger"><span class="ti-trash"></span></h4></a></td>
                </tr>    
                @endforeach
                                
              
            </tbody>
        </table>
        <div>{{$students->links()}}</div>

    </div>
</div>
      
@endsection

