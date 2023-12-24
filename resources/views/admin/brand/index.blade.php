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
            <div class="card-header">All Brands</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Brand name</th>
      <th scope="col">Brand image</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($brand as $brands)
    <tr>
      <th scope="row">{{$brand->firstItem() +$loop->index}}</th>
      <td>{{$brands->brand_name}}</td>
      <td><img src="{{$brands->brand_img}}" alt="my img" style="height:60px;weight:60px"></td>
      @if($brands->created_at==NULL)
        <span class="text-danger">No Date Set</span>
      @else
      <td>{{$brands->created_at->diffforHumans()}}</td>
    @endif
      <td>
        <a href="{{url('/brandedit/'.$brands->id)}}"  class="btn btn-primary btn-sm">Edit</a>
        <a href="{{url('/branddelete/'.$brands->id)}}" onclick="return confirm('Are you sure u want to delete this brand')" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    @endforeach
    
</table>
<div>{{$brand->links()}}</div>
    </div>
    </div>


<div class='col-md-4'>
<div class='card'>
<div class='card-header'>Add Brand</div>
<div class='card-body'>
<form action="{{url('insert_brand')}}" method="post" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
    <input type="text" name="brand">
    @error('brand')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
    <input type="file" name="image">
    @error('image')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  
 
  
  
  <button type="submit" class="btn btn-primary"> Add Brand</button>
</form>
         
</div>
  

  
  

  </div>
  

</div>


</div>
    
@endsection






            

<div class="col-md-8">
        
            <div class="card">
            <div class="card-header">Trash list</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">product category</th>
      <th scope="col">user</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($trash as $trashs)
    <tr>
      <th scope="row">{{$trash->firstItem() +$loop->index}}</th>
      <td>{{$trashs->brand_name}}</td>
      <td><img src='{{$trashs->brand_img}}'></td>
      <td>{{$trashs->created_at->diffforHumans()}}</td>
      <td>
        <a href="{{url('/restore/'.$trashs->id)}}" class="btn btn-primary">Restore</a>
        <a href="{{url('/pdelete/'.$trashs->id)}}" class="btn btn-danger">PDelete</a>
      </td>
    </tr>
    @endforeach
</table>

    </div>
    </div>




    <div class='col-md-4'>
        
    
    
        </div>
           </div>
    

</div>




