@extends('layouts.app')
@section('title')
  User Profile
@endsection
@section('pagetitle')
  User Profile
@endsection
@section('adcontent')
<div class="row">
        <div class="card">
          <div class="card-header">
         User Profile
          </div>
          <div class="card-body">
            @include('includes.errors')
            @include('includes.success')
           <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
           
              <h4>Change Profile</h4>
              <form action="{{route('updateprofile')}}" method="post" onsubmit="thisform(this)">
                  @csrf
                 
                  <div class="form-group mb-3 col-md-8">
                      <input type="text" name="name" id="name" class="form-control border px-2 col-8" required placeholder="Enter Name" autofocus value="{{Auth::guard('admin')->user()->name}}">
                      </div>
                  <div class="form-group mb-3 col-md-8">
                      <input type="text" name="username" id="username" class="form-control border px-2 col-8" required placeholder="Enter Username" value="{{Auth::guard('admin')->user()->username}}">
                      </div>     
                      <input type="hidden" name="id" id="id" value="{{Auth::guard('admin')->user()->id}}"> 
                       <div class="form-group">
                           <button type="submit" id="btn" class="btn btn-primary bts">Update Profile</button>
                       
                   </div>                          
              </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <h4>Change Password</h4>
              <form action="{{route('change.pass')}}" method="post" onsubmit="thisform(this)">
                @csrf
                
                 <div class="form-group mb-3 col-md-8">
                 <input type="password" name="password" id="password" class="form-control border px-2" @error('password') is-invalid @enderror" placeholder="Enter Password" autofocus>
                 
                     </div> 
                      <div class="form-group mb-3 col-md-8">
                 <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border px-2"  placeholder="Enter Comfirm Password">
                     </div>
                    <input type="hidden" name="id" id="id" value="{{Auth::guard('admin')->user()->id}}"> 
                     <div class="form-group">
                         <button type="submit"  class="btn btn-outline-primary bts">Change Password</button>
                 </div>                          
            </form>
            </div>
           </div>
          </div>
        </div>
    
</div>
@endsection