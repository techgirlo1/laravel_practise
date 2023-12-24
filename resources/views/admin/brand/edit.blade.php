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
<div class='card-header'>Edit Brand</div>
<div class='card-body'>
<form action="{{url('/editme/'.$edit->id)}}" method="post" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand</label>
    <input type="text" name="brand" value="{{$edit->brand_name}}">
    
  </div>
  @error('brand')
     <span class="text-danger">{{$message}}</span>
     @enderror
 

     <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
    <input type="file" name="image">
    <div>
    <img src="{{asset($edit->brand_img)}}" style="height:60px;width:60px">
    </div>
    
  </div>
  @error('img')
     <span class="text-danger">{{$message}}</span>
     @enderror
  
  
  <button type="submit" class="btn btn-primary"> Edit Brand</button>
</form>
         
</div>
  

  
  

  </div>
  

</div>

 </div>
    </div>

    @endsection
