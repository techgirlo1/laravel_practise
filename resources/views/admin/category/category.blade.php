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
            <div class="card-header">All Category</div>
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
  
  @foreach($cat as $cats)
    <tr>
      <th scope="row">{{$cat->firstItem() +$loop->index}}</th>
      <td>{{$cats->product_category}}</td>
      <td>{{$cats->user_id}}</td>
      <td>{{$cats->created_at->diffForHumans()}}</td>
      <td>
        <a href="{{url('/edit/'.$cats->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{url('/delete/'.$cats->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
    
</table>
<div>{{$cat->links()}}</div>
    </div>
    </div>


<div class='col-md-4'>
<div class='card'>
<div class='card-header'>Add Category</div>
<div class='card-body'>
<form action="insert" method="post">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category</label>
    <input type="text" name="product">
    @error('product')
     <span class="text-danger">{{$message}}</span>
     @enderror
  </div>
  
 
  
  
  <button type="submit" class="btn btn-primary"> Add Category</button>
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
      <th scope="col">product category</th>
      <th scope="col">user</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($trash as $trashs)
    <tr>
      <th scope="row">{{$trash->firstItem() +$loop->index}}</th>
      <td>{{$trashs->product_category}}</td>
      <td>{{$trashs->user_id}}</td>
      <td>{{$trashs->created_at}}</td>
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



</x-app-layout>
