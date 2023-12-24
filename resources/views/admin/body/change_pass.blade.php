@extends('admin.admin_master')
@section('admin')


<div class="card card-default">
<div class="card-header card-header-border-bottom">
<h2>Change Password</h2>
</div>
<div class="card-body">
<form class="form-pill" method="post" action="{{url('/update_password')}}">
  @csrf
        <div class="form-group">
        <label for="exampleFormControlPassword3">Current Password</label>
        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
        @error('current_password')
        <p class='text-danger'>{{$message}}</p>
        @enderror
        </div>


        <div class="form-group">
        <label for="exampleFormControlPassword3"> New Password</label>
        <input type="password" class="form-control" id="password"  name="password" placeholder="New Password">
        @error('password')
        <p class='text-danger'>{{$message}}</p>
        @enderror
        </div>


        <div class="form-group">
        <label for="exampleFormControlPassword3">Comfirm Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Comfirmation Password">
        @error('password_confirmation')
        <p class='text-danger'>{{$message}}</p>
        @enderror
        </div>
            <div><button type="submit" class="btn btn-primary btn-default">Save</button></div>
        </form>
    </div>
</div>
@endsection