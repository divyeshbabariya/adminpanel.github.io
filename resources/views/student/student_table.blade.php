@extends('master')
@section('student_table')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Table Head</strong>
    </div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">S_ID</th>
                    <th scope="col">F_NAME</th>
                    <th scope="col">L_NAME</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">MOBILE_NO</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{$student['s_id']}}</th>
                    <td>{{$student['f_name']}}</td>
                    <td>{{$student['l_name']}}</td>
                    <td>{{$student['email']}}</td>
                    <td>{{$student['mobile_no']}}</td>
                    <td>{{$student['image']}}</td>
                    
                </tr>    
                @endforeach
                
              
            </tbody>
        </table>

    </div>
</div>
      
@endsection

