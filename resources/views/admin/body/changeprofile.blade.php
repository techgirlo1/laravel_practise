@extends('admin.admin_master')
@section('admin')
<div>
@if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  
  @endif
  </div>
<div class="card card-default">
<div class="card-header card-header-border-bottom">
<h2>Update Profile</h2>
</div>

<div class="card-body">

<form class="form-pill" method="post" action="{{url('/update_profile')}}" enctype="multipart/form-data">
  @csrf

 
        <div class="form-group">
        <label for="exampleFormControlPassword3">Username</label>
        <input type="text" class="form-control"  name='username' value="{{$user->name}}">
        
        </div>


        <div class="form-group">
        <label for="exampleFormControlPassword3">Email</label>
        <input type="email" class="form-control"  name='email' value="{{$user->email}}">
        
        </div>


        <div class="form-group">
        <label for="exampleFormControlPassword3">Profile photo</label>
        <input type="file" class="form-control"  name='pics'>
        
        </div>



       


        
            <div><button type="submit" class="btn btn-primary btn-default">Update</button></div>
        </form>
    </div>
</div>
@endsection