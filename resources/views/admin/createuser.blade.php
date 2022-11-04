@extends('layouts.app')
@section('title')
    Create User Account
@endsection
@section('pagetitle')
    Create User Account
@endsection
@section('adcontent')
<div class="row">
        <div class="card">
          <div class="card-header">
            Create User Account
          </div>
          <div class="card-body">
            @include('includes.errors')
            <form action="{{route('newuser.store')}}" method="post" onsubmit="thisform(this)">
                @csrf
                <div class="form-group mb-3">
                     <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control border px-2" placeholder="Enter Name" required value="{{old('name')}}">
                        </div>
                      <div class="form-group mb-3">
                           <label>Username</label>
                 <input type="text" name="username" id="username" class="form-control border px-2" placeholder="Enter Username" required value="{{old('username') ?? 'autograph_user'}}">
                     </div> 
               
                      <div class="form-group mb-3">
                           <label>Password</label>
                 <input type="password" name="password" id="password" class="form-control border px-2" placeholder="Enter Password" required value="autographpass">
                     </div> 
                       <div class="form-group mb-3">
                        <label>Confirm Password</label>
                 <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Enter Password Comfirmation" required class="form-control border px-2" value="autographpass">
                     </div> 
                                                          
                     <div class="form-group">
                         <button type="submit" id="btn" class="btn btn-success bts">Create User</button>
                 </div>                          
                </form>
          </div>
        </div>
</div>
@endsection