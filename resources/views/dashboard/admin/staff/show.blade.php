@extends('dashboard.layout')
@section('content')
<div class="container w-75 rounded-xl border-2 border-primary py-4 px-3 row mx-auto">
    <div class="col-sm-12 col-md-8 d-flex flex-column justify-content-center align-content-middle">
        <h4 class="text-center">{{ $title}}</h4>
        <div class=""style="height:200px; width:200px; border:1px solid black; border-radius:2rem; margin-inline:auto">
        </div>
        <h5 class="text-center ">{{ $staff->name }}</h5>
        <h6 class="text-center">{{ $staff->email }}</h6>
    </div>
    <div class="col-sm-12 col-md-4 border-left border-dark">
        <span class="d-block">Contact: 670334577/693146326</span>
        <span class="d-flex justify-content-center py-4"><a href="{{ route('admin.staff.photo', $staff->id) }}" class="btn btn-default btn-xs">Set Profile Photo</a></span>
    </div>

</div>
    
@endsection