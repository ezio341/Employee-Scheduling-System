@extends('layouts/app')
@section('title', 'Employee Schedule')
@section('title-page', 'Schedule List')

@section('content')
<h4>{{$emp->name}}</h4><br>
<a href="/EmpSchedule/emp/{{$user_id}}/add" class='btn btn-primary'>Add Schedule</a>
    <br><br>
    <table id="list" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Day</th>
                <th>Entry Hours</th>
                <th>Out Hours</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter=0;?>
            @foreach ($data as $emp)
            <?php $counter++?>
            <tr>
                <td>{{$counter}}</td>
                <td>{{$emp->day}}</td>
                <td>{{date('h:i A',strtotime($emp->entry_hour))}}</td>
                <td>{{date('h:i A',strtotime($emp->out_hour))}}</td>
                <td>
                    <a href="/EmpSchedule/emp/{{$emp->user_id}}/edit/{{$emp->id}}" class="badge badge-warning">Edit</a>
                    <a href="/EmpSchedule/emp/{{$emp->user_id}}/delete/{{$emp->id}}" class="badge badge-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>        
            @endforeach
            @if ($counter == 0)
                <td colspan="5" class="text-center">Empty Records</td>
            @endif
        </tbody>
    </table>
    <a href="/Users" class="btn btn-primary">Back</a>
@endsection