@extends('dashboard.layout')
@section('content')
<div class="container-fluid mx-auto justify-content-center py-4 my-4">
    <img id="preview" width="200" height="200" class="rounded-md">
</div>
<button class="btn btn-success btn-xs mx-auto d-block"><a href="{{ route('admin.export_organizations') }}">Export</button></a>
<form class="form" method="post" enctype="multipart/form-data">
    @csrf
    <label for="import file">Import File(csv, pdf,excel,ppt,docs)</label>
    <input type="file" required class="form-control" accept="mimes:csv, pdf, ppt, excel, docs" name="file">
    <input type="submit" class="btn btn-success btn-xs" value="submit">
</form>
    
@endsection