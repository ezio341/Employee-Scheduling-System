@extends('layouts/app')
@section('title', 'Registration Form')
@section('title-page', 'Add New Employee')

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
    <form action="/Users/save" method="post">
        {{ csrf_field() }}
        <table style="width: 100%;" class="border-bottom">
            <thead class="border-bottom">
                <th><h4>Account</h4></th>
                <th><h4>Profile</h4></th>
            </thead>
            <tbody>
                <tr>
                    <td><br>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="username"><h6>User Name</h6></label>
                        <input type="text" name="username" class="form-control"><br>
                        </div>
                    </td>
                    <td><br>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="name"><h6>Name</h6></label>
                        <input type="text" name="name" class="form-control"><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="empid"><h6>Employee ID</h6></label>
                        <input type="number" name="empid" class="form-control" value="{{$latestid->emp_id + 1}}" disabled><br>
                        </div>
                    </td>
                    <td>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="age"><h6>Age</h6></label>
                        <input type="number" name="age" class="form-control"><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="email"><h6>Email</h6></label>
                        <input type="email" name="email" class="form-control"><br>
                        </div>
                    </td>
                    <td>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="position"><h6>Position</h6></label>
                        <input type="text" name="position" class="form-control"><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <div class="form-group" style="max-width: 25rem;">
                        <label for="address"><h6>Address</h6></label>
                        <input type="text" name="address" class="form-control"><br>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="form-group" style="max-width: 100%;">
        <button type="submit" name='save' class="btn btn-success float-right">Add Data</button>
        <a href="/Users" class="btn btn-danger float-left">Back</a>
        </div>
    </form>
@endsection