@extends('layouts\app')
@section('title', 'Employee List')
@section('title-page', 'Employee List')

@section('content')
    <a href="/Users/add" class='btn btn-primary'>Add User</a>
    <br><br>
    <table id="list" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Name</th>
                <th class="text-center">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter=0;?>
            @foreach ($empInfo as $user)  
            <?php $counter++;?>
            <tr>
                <td>{{$user->username}}</td>
                <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                <td>{{$user->name}}</td>
                <td class="text-center">
                    <a href="/EmpSchedule/schedule/{{$user->id}}" class="badge badge-info mr-2">Schedule</a>
                    <a href="/Users/details/{{$user->id}}" class="badge badge-warning mr-2"> Details</a>
                    <a href="/Users/delete/user/{{$user->id}}" class="badge badge-danger" onclick="return confirm('Are you sure to delete {{$user->name}}\' account?')">Delete</a>
                </td>
            </tr>
            @endforeach
            @if ($counter == 0)
                <td colspan="3">Empty Records</td>
            @endif
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
        $('#list').DataTable();
        } );
    </script>
@endsection