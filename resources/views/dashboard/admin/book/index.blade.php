@extends('dashboard.layout')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">{{ $title }}</h4>
        <div class="d-flex justify-content-end py-3">
            <a class="btn btn-xs btn-primary" href="{{ route('admin.books.search') }}">Find Book</a>
        </div>
       
        <div class="table-responsive">
          <table class="table table-striped">
            <!--<thead>
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
            </thead>--------->
            <tbody>
                
                @foreach ($books as $_book )
                <x-book-item :book="$_book"/>
                
                    
                @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection