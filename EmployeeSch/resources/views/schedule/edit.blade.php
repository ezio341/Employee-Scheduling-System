@extends('layouts/app')
@section('title', 'Employee Schedule')
@section('title-page', 'Edit Schedule')

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
        @foreach ($schedule as $item)
        <div class="card" style="max-width: 25rem;">
            <div class="card-body bg-secondary text-white" >
                <center>
                <h4 class="card-title">{{$emp->name}}</h4>
                </center>
            </div>
        </div><br>
        <form action="/EmpSchedule/emp/{{$emp->user_id}}/update" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="form-group" style="max-width: 25rem;">
            <label for="entry_hour"><h4>Entry Hour</h4></label>
            <input type="time" name="entry_hour" class="form-control" value="{{$item->entry_hour}}" ><br>
            </div>
            <div class="form-group" style="max-width: 25rem;">
            <label for="out_hour"><h4>Out Hour</h4></label>
            <input type="time" name="out_hour" class="form-control" value="{{$item->out_hour}}" ><br>
            </div>
            <div class="form-group" style="max-width: 25rem;">
            <label for="day"><h4>Day</h4></label><br>
            <select class="form-control-lg" name="day" id="day">
                @foreach ($days as $days)
                @if ($item->day==$days) 
                    <option value="{{$days}}" selected>{{$days}}</option>
                @endif
                <option value="{{$days}}">{{$days}}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group" style="max-width: 25rem;">
            <button type="submit" name='save' class="btn btn-primary float-right">Modify Data</button>
            <a href="/EmpSchedule/schedule/{{$emp->user_id}}" class="btn btn-danger float-left">Back</a>
            </div>
        </form>
        @endforeach
    @endforeach
@endsection