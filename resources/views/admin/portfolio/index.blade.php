@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="row">
           <div class=col-md-8>
           @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           @endif
            <div class="card">
            <div class="card-header">All Images</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" >S/N</th>
      <th scope="col"> image</th>
      
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($pic as $pics)
    <tr>
      <th scope="row"></th>
      <td><img src='{{asset($pics->image)}}' width="200px" height="200px"></td>
      
      <td>{{$pics->created_at->diffForHumans()}}</td>
      <td>
        <a href="{{url('/eproduct/'.$pics->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{url('/softdelete/'.$pics->id)}}" class="btn btn-danger">Delete</a>
      </td>
      
    </tr>
    @endforeach
    
</table>

    </div>
    </div>


<div class='col-md-4'>
<div class='card'>
<div class='card-header'>Add Pics</div>
<div class='card-body'>
<form action="{{url('insert')}}" method="post" enctype="multipart/form-data">
        @csrf
  
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Image</label>
    <input type="file" name="image[]" multiple="">
    @error('image')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  
  
  
 
  
  
  <button type="submit" class="btn btn-primary"> Add Pics</button>
</form>
         
</div>
  
</div>
  </div>
</div>
    
</div>



@endsection