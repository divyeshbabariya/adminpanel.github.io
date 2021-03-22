@extends('master')
@section('student_form')

    <div class="card">
        <div class="card-header">
            <strong class="card-title">Register New Student </strong>
        </div>
        <div class="card-body">
          

            <form method="POST" action="{{ url('add') }}">
                @csrf
                <table class="table table-hover">
                    <tr>
                        <td><label>First Name :</label></td>
                        <td><input class="form-control" type="text" name="f_name" placeholder="Enter First Name">
                           
                           <h6 class="text-danger">
                            {{ $errors->first('f_name') }}
                           </h6>
                           
                        </td>
                    </tr>
                    <tr>
                        <td><label>Last Name :</label></td>
                        <td> <input class="form-control" type="text" name="l_name" placeholder="Enter Last Name">
                            <h6 class="text-danger">
                            {{ $errors->first('l_name') }}
                        </h6>
                        </td>
                    </tr>
                    <tr>
                        <td><label>E-mail :</label></td>
                        <td> <input class="form-control " type="text" name="email" placeholder="Enter E-mail">
                            <h6 class="text-danger">
                            {{ $errors->first('email') }}
                        </h6>
                        </td>

                    </tr>
                    <tr>
                        <td><label>Password :</label></td>
                        <td><input class="form-control" type="password" name="password" placeholder="Enter password">
                            <h6 class="text-danger">
                            {{ $errors->first('password') }}
                        </h6>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Mobile No :</label></td>
                        <td><input class="form-control" type="tel" name="mobile_no" placeholder="Enter mobile Number">
                            <h6 class="text-danger">
                            {{ $errors->first('mobile_no') }}
                        </h6>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Image :</label></td>
                        <td><input type="file" name="image" placeholder="Uplode image">
                            <h6 class="text-danger">
                            {{ $errors->first('image') }}
                        </h6>
                        </td>

                    </tr>
                </table>



                <button class="btn btn-secondary btn-lg btn-block" type="submit">Submit</button>

            </form>
        </div>
    </div>

    {{-- @isset($status)
    @if ($status[status] == 1)
    <p class="alert alert-success">{{$status['message']}}</p>
    @else
    <p class="alert alert-danger">{{$status['message']}}</p>
@endif
@endisset --}}
@endsection
