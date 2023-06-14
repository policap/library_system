@extends('dashboard.layout')
@section('content')
<div class="d-flex justify-content-center py-5 my-5">
    <img id="preview" width="200" height="200" class="rounded-md">
</div>
<form  method="post" class="form" enctype="multipart/form-data">
    @csrf
    <label for="">Upload Photo:</label>
    <input type="file" required class="form-control" accept="mimes:png,jpeg,jpg" name="profile_photo" onchange="preview(event)">
    <input type="submit" class="btn btn-primary btn-xs" value="submit">
</form>
    
@endsection
@section('script')
    <script>
    function preview(event){
        let element=event.target;
        let file=element.files[0];
        console.log(file);
        if(file){
            $('#preview').prop('src', URL.createObjectURL(file));
        }

    }
    </script>
@endsection