
@extends('admin.admin_master')
    @section('admin')

    
<div class='col-md-6'>
@if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           @endif
           
<div class='card'>
<div class='card-header'>Add Slider</div>
<div class='card-body'>
<form action="{{url('/editme/'.$edit->id)}}" method="post" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title" class='form-control' value="{{$edit->title}}">
    @error('title')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea name="desc" class='form-control'>{{$edit->description}}</textarea>
    @error('desc')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Slider Image</label>
    <input type="file" name="image[]" class='form-control' multiple="">
    <img src="{{asset($edit->image)}}" class="img-fluid">
    @error('image')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  
 
  
  
  <button type="submit" class="btn btn-primary"> Edit Slider</button>
</form>

</div>
  

  
  

  </div>
  

</div>
@endsection


    