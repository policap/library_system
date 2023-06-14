@extends('dashboard.layout')
@section('content')
<div>
    <input type="search" id="__search" class="form-control container-fluid d-block" placeholder="Search Book By Author Or Title" onkeyup="searcher(event)">
</div>
<table class="">
    <thead>
        <th>S/N</th>
        <th>Title</th>
        <th>Author</th>
        <th>Size</th>
        <th></th>
    </thead>
    <tbody id="search_table">
        
    </tbody>

@endsection
@section('script')
<script>
    let searcher= function(event){
    let val = event.target.value;
    $('#__search').toggleClass('bg-dark');
    $('#__search').toggleClass('text-white');
    let url ="{{ route('admin.books.do_search') }}";
    $.ajax({
        method:'get', url:url, data:{'search_data':val},
        success:function(data){
            console.log(data);
            let html='';
            let sn=1;
            data.data.forEach(element => {
                html += `<tr><td>${sn}</td>
                <td>${element.title}</td>
                <td>${element.author}</td>
                <td>${element.size}</td>
                <td><a href="{{ route('admin.books.show', '__bid__') }}" class="btn btn-primary btn-xs">Show</a></td></tr>`.replace('__bid__', element.id);
                sn++;
            });
            $('#search_table').html(html);
            
        }
    })
}
//selecting using 
</script>
    
@endsection