@extends('layouts/app')
@section('title', 'Employee Schedule')
@section('title-page', 'Add Schedule')

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

@foreach ($data as $item)
<div class="card" style="max-width: 25rem;">
    <div class="card-body bg-secondary text-white" >
        <center>
        <h4 class="card-title">{{$item->name}}</h4>
        </center>
    </div>
</div><br>
    <form action="/EmpSchedule/emp/{{$item->user_id}}/save" method="post">
        {{ csrf_field() }}
    <input type="hidden" name="user_id" value="{{$item->user_id}}">
        <div class="form-group" style="max-width: 25rem;">
        <label for="entry_hour"><h5>Entry Hour</h5></label><br>
        <input type="time" name="entry_hour" class="form-control" ><br>
        </div>
        <div class="form-group" style="max-width: 25rem;">
        <label for="out_hour"><h5>Out Hour</h5></label><br>
        <input type="time" name="out_hour" class="form-control" ><br>
        </div>
        <div class="form-group" style="max-width: 25rem;">
        <label for="day"><h5>Day</h5></label><br>
        <select class="form-control-lg" name="day" id="day">
            @foreach ($days as $days)
                <option value="{{$days}}">{{$days}}</option>
            @endforeach
        </select>
        </div>
        <div class="form-group" style="max-width: 25rem;">
        <button type="submit" name='save' class="btn btn-primary float-right">Add Data</button>
        <a href="/EmpSchedule/schedule/{{$item->user_id}}" class="btn btn-danger float-left">Back</a>
        </div>
    </form>
</script>
@endforeach
@endsection