@extends('admin.admin_master')
    @section('admin')

    
    <div class="py-12">
          <div class="row">
          
          <h4>Home Slider</h4>
        <a href="{{url('create')}}"><button class="btn btn-info">Add Slider</button></a>
        
      
           <div class=col-md-12>
           @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
           @endif
            <div class="card">
            <div class="card-header">All Slider</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col" width="15px">S/N</th>
      <th scope="col"width="15px">Slider Tile</th>
      <th scope="col"width="15px">Slider Description</th>
      <th scope="col"width="15px">Slider image</th>
      <th scope="col"width="15px">Created at</th>
      <th scope="col"width="15px">Action</th>
    </tr>
  </thead>
  
  @foreach($slider as $sliders)
    <tr>
      <th scope="row"></th>
      <td>{{$sliders->title}}</td>
      <td>{{$sliders->description}}</td>
      <td><img src="{{$sliders->image}}" alt="my img" style="height:60px;weight:60px"></td>
      @if($sliders->created_at == NULL)
        <span class="text-danger">No Date Set</span>
      @else
      <td>{{$sliders->created_at}}</td>
    @endif
      <td>
        <a href="{{url('/edit/'.$sliders->id)}}"  class="btn btn-primary btn-sm">Edit</a>
        <a href="{{url('/deleteme/'.$sliders->id)}}" onclick="return confirm('Are you sure u want to delete this brand')" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
    @endforeach
    
</table>
<div></div>
    </div>
    </div>








            

    

</div>

@endsection




