@extends('dashboard.layout')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
       
        <form class="form-inline" method="post">
            @csrf
          <label class="sr-only" for="inlineFormInputName2">Name</label>
          <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="name" value="{{ $staff->name }}">
        
          <label class="sr-only" for="inlineFormInputGroupName2">Email</label>
          <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">@</div>
            </div>
            <input type="email" class="form-control" name="email" id="inlineFormInputGroupUsername2" value="{{ $staff->email }}">
          </div>
          <input type="hidden" name="type" value="staff">
          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
    
@endsection