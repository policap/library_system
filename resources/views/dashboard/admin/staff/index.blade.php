@extends('dashboard.layout')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
       
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  Name
                </th>
                <th>
                  Email
                </th>
                <th>
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($staff as $_staff )
                <tr>
                    <td class="py-1">
                        {{ $_staff->name }}
                    </td>
                    <td>
                      {{ $_staff->email }}
                    </td>
                    <td>
                      
                        <a href="{{ route('admin.staff.edit',['id'=>$_staff->id]) }}" class="btn btn-primary btn-xs">edit</a>|
                        <a href="{{ route('admin.staff.show',['id'=>$_staff->id]) }}" class="btn btn-success btn-xs">view</a>|
                        <a href="{{ route('admin.staff.delete',['id'=>$_staff->id]) }}" class="btn btn-danger btn-xs">delete</a>|
                      
                    </td>
                   
                  </tr>
                    
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection