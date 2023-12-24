<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
</h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
            <div class="col-md-8">
            @if(session('success')) 
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      @endif 
            <div class="card">
            <div class="card-header">All Product</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">product name</th>
      <th scope="col">product category</th>
      <th scope="col">user</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($product as $products)
    <tr>
      <th scope="row">{{$product->firstItem() +$loop->index}}</th>
      <td>{{$products->product_name}}</td>
      <td>{{$products->product_category}}</td>
      <td>{{$products->use->name}}</td>
      <td>{{$products->created_at->diffForHumans()}}</td>
      <td>
        <a href="{{url('/eproduct/'.$products->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{url('/softdelete/'.$products->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
</table>
{{$product->links()}}
    </div>
    </div>


<div class='col-md-4'>
<div class='card'>
<div class='card-header'>Add Product</div>
<div class='card-body'>
<form action="insertproduct" method="post">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product</label>
    <input type="text" name="product">
    
  </div>
  @error('product')
     <span class="text-danger">{{$message}}</span>
     @enderror
 
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Product</label>
    <select name="cat" id="">
    <option value="Select Category" class="select-disabled">Select Category</option>
<option value="Electronics">Men</option>
<option value="Food">Women</option>
<option value="Utensils">Kids</option>

    </select>
    @error('cat')
     <span class="text-danger">{{$message}}</span>
     @enderror
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Image</label>
    <input type="file" name="image[]" multiple="">
    @error('image')
      <p class="text-danger">{{ $message }}</p>
    @enderror
  </div>
  
 
  
  <button type="submit" class="btn btn-primary"> Add Product</button>
</form>
         
</div>
  

  
  

  </div>
  

</div>


</div>
    







            

<div class="col-md-8">
        
            <div class="card">
            <div class="card-header">Trash list</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">product name</th>
      <th scope="col">product category</th>
      <th scope="col">user</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($trash as $trashes)
    <tr>
      <th scope="row">{{$trash->firstItem() +$loop->index}}</th>
      <td>{{$trashes->product_name}}</td>
      <td>{{$trashes->product_category}}</td>
      <td>{{$trashes->use->name}}</td>
      <td>{{$trashes->created_at->diffForHumans()}}</td>
      <td>
        <a href="{{url('/restore/'.$trashes->id)}}" class="btn btn-primary">Restore</a>
        <a href="{{url('/pdelete/'.$trashes->id)}}" class="btn btn-danger">PDelete</a>
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



</x-app-layout>
