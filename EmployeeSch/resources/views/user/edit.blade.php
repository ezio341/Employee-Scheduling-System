@extends('layouts/app')
@section('title', 'Edit Form')
@section('title-page', 'Edit Employee Information')

@section('content')


    @if (count($errors)>0)
    <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
    @endif
    @foreach ($emp as $emp)
        <form action="/Users/update/{{$emp->user_id}}" method="post">
            {{ csrf_field() }}
            <table style="width: 100%;">
                <thead class="border-bottom">
                    <th><h4>Account</h4></th>
                    <th><h4>Profile</h4><br></th>
                </thead>
                <tbody>
                    <tr>
                        <td><br>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="username"><h6>User Name</h6></label>
                            <input type="text" name="username" class="form-control" value="{{$acc->username}}"><br>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="name"><h6>Name</h6></label>
                            <input type="text" name="name" class="form-control" value="{{$emp->name}}" ><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="password"><h6>Password</h6></label><br>
                            <a href="/Users/resetpass/user/{{$emp->user_id}}" class="btn btn-danger">Reset Password</a>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="position"><h6>Position</h6></label>
                            <input type="text" name="position" class="form-control" value="{{$emp->position}}" ><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="email"><h6>Email</h6></label>
                            <input type="email" name="email" class="form-control" value="{{$acc->email}}"><br>
                            </div>
                        </td>
                        <td>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="age"><h6>Age</h6></label>
                            <input type="number" name="age" class="form-control" value="{{$emp->age}}" ><br>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="form-group" style="max-width: 25rem;">
                            <label for="address"><h6>Address</h6></label>
                            <input type="text" name="address" class="form-control" value="{{$emp->address}}" ><br>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group" style="max-width: 100%;">
            <button type="submit" name='save' class="btn btn-primary float-right">Modify Data</button>
            <a href="/Users/details/{{$emp->user_id}}" class="btn btn-danger float-left">Back</a>
            </div>
        </form>
    @endforeach
@endsection