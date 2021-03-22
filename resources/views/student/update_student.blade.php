@extends('master')
@section('update_student')
    
<div class="card">
    <div class="card-header">
        <strong class="card-title">Update Student Details </strong>
    </div>
    <div class="card-body">
        <form method="POST" action="{{url('update')}}">
            @csrf
            <table class="table table-hover">
                <tr>
                    <td><label >First Name :</label></td>
                    <td><input class="form-control" type="text" name="f_name" placeholder="Enter First Name" value="{{$updatedata['f_name']}}">
                        <h6 class="text-danger">
                            {{ $errors->first('f_name') }}
                           </h6>
                           
                    </td>
                </tr>
                <input type="hidden" name="s_id" value="{{$updatedata['s_id']}}">
                <tr>
                    <td><label >Last Name :</label></td>
                   <td> <input class="form-control" type="text" name="l_name" placeholder="Enter Last Name" value="{{$updatedata['l_name']}}">
                    <h6 class="text-danger">
                        {{ $errors->first('l_name') }}
                    </h6></td>
                </tr>
                <tr>
                    <td><label >E-mail :</label></td>
                    <td> <input class="form-control" type="email" name="email" placeholder="Enter E-mail" value="{{$updatedata['email']}}">
                        <h6 class="text-danger">
                            {{ $errors->first('email') }}
                        </h6></td>
                </tr>
                <tr>
                    <td><label >Password :</label></td>
                    <td><input class="form-control" type="password" name="password" placeholder="Enter password" value="{{$updatedata['password']}}">
                        <h6 class="text-danger">
                            {{ $errors->first('password') }}
                        </h6></td>
                </tr>
                <tr>
                    <td><label >Mobile No :</label></td>
                    <td><input class="form-control" type="tel" name="mobile_no" placeholder="Enter mobile Number" value="{{$updatedata['mobile_no']}}">
                        <h6 class="text-danger">
                            {{ $errors->first('mobile_no') }}
                        </h6></td>
                </tr>
                <tr>
                    <td><label >Image :</label></td>
                    <td><input class="form-control" type="file" name="image" placeholder="Uplode image" value="{{$updatedata['image']}}">
                        <h6 class="text-danger">
                            {{ $errors->first('image') }}
                        </h6></td>
         
                </tr>
            </table>
            
            
        
               <button class="btn btn-secondary btn-lg btn-block" type="submit">UPDATE</button>
        
        </form>
    </div>
</div>


{{-- @isset($status)
    @if($status[status]==1)
    <p class="alert alert-success">{{$status['message']}}</p>
    @else
    <p class="alert alert-danger">{{$status['message']}}</p>
@endif
@endisset --}}
@endsection