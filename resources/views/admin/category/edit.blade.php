<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         
</h2>
    </x-slot>

    <div class="py-12">
        <div class="row">
       
          





<div class='col-md-6'>
         
@if(session('success')) 
          <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      @endif 
<div class='card'>
<div class='card-header'>Edit Product</div>
<div class='card-body'>
<form action="{{url('/editMe/'.$edit->id)}}" method="post">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product</label>
    <input type="text" name="product" value="{{$edit->product_category}}">
    
  </div>
  @error('product')
     <span class="text-danger">{{$message}}</span>
     @enderror
 
  
  
  <button type="submit" class="btn btn-primary"> Edit Category</button>
</form>
         
</div>
  

  
  

  </div>
  

</div>








    </div>
    </div>
</x-app-layout>
