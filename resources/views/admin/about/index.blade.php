@extends('admin.admin_master')
    @section('admin')

    
    <div class="py-12">
          <div class="row">
          
          <h4>About</h4>
        <a href="{{url('create')}}"><button class="btn btn-info">Add About</button></a>
        
      
           <div class=col-md-12>
           @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           @endif
            <div class="card">
            <div class="card-header">About</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" width="15px">S/N</th>
      <th scope="col"width="15px">About Title</th>
      <th scope="col"width="15px">About Short_desc</th>
      <th scope="col"width="15px">About Long_desc</th>
      <th scope="col"width="15px">Created at</th>
      <th scope="col"width="15px">Action</th>
    </tr>
  </thead>
  
  @foreach($about as $abouts)
    <tr>
      <th scope="row"></th>
      <td>{{ $abouts->title}}</td>
      <td>{{ $abouts->short_desc}}</td>
      <td>{{ $abouts->long_desc}}</td>
      @if($abouts->created_at == NULL)
        <span class="text-danger">No Date Set</span>
      @else
      <td>{{$abouts->created_at}}</td>
    @endif
      <td>
        <a href="{{url('/edit/'.$abouts->id)}}"  class="btn btn-primary btn-sm">Edit</a>
        <a href="{{url('/deleteme/'.$abouts->id)}}" onclick="return confirm('Are you sure u want to delete this brand')" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    @endforeach
    
</table>
<div></div>
    </div>
    </div>








            

    

</div>

@endsection




