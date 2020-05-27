@extends('layouts\app')
@section('title', 'Employee List')
@section('title-page', 'Employee Details')

@section('content')
      <div class="card-body">
        @foreach ($emp as $emp)
        <a href="/Users/edit/{{$emp->user_id}}">
            <svg class="bi bi-pencil float-right" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
            <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
          </svg>
        </a>
        <br>
        <p class="card-text">
            <table class="table table-hover">
                <tr>
                    <td><h4>Name</h4></td>
                    <td><h4>:</h4></td>
                    <td><h5>{{$emp->name}}</h5></td>
                </tr> 
                <tr>
                    <td><h4>Position:</h4></td>
                    <td><h4>:</h4></td>
                    <td><h5>{{$emp->position}}</h5></td>
                </tr>
                <tr>
                    <td><h4>Age</h4></td>
                    <td><h4>:</h4></td>
                    <td><h5>{{$emp->age}}</h5></td>
                </tr>
                <tr>
                    <td><h4>Address</h4></td>
                    <td><h4>:</h4></td>
                    <td><h5>{{$emp->address}}</h5></td>
                </tr>
            </table>
            @endforeach
        </p>
      </div>
    <br>
    <a href="/Users" class="btn btn-primary float-left" style="width: 100%"> Back</a>
@endsection