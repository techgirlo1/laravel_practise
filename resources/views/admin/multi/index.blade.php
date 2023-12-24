<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
</h2>
    </x-slot>

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
      <th scope="col">S/N</th>
      <th scope="col"> image</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  @foreach($pic as $pics)
    <tr>
      <th scope="row">{{$pic->firstItem() +$loop->index}}</th>
      <td><img src='{{asset($pics->image)}}'></td>
      
      
    </tr>
    @endforeach
    
</table>
<div>{{$pic->links()}}</div>
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



</x-app-layout>
