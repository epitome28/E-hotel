@extends('layouts.app')
@section('title')
  Users
@endsection
@section('pagetitle')
  Users
@endsection
@section('adcontent')
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('user.create')}}" class="btn btn-outline-info btn-sm float-end">Create</a></h4>
          </div>
          <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="users">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Account Type</th>
                                      <th>Permission</th>
                                      <th>See Password</th>
                                      <th></th>
                                  </tr>
                              </thead>
                            
                              <tbody>
                                  <?php $i=0;?>
                                   @foreach ($adusers as $user)
                                    <tr>
                                   <td>{{$i+1}} </td>
                                  <td>{{$user->name}} </td>
                                  <td><span class="{{$user->roles == '1' ? 'text-success' : ($user->roles == '2' ? 'text-info' : 'text-primary')}}">{{$user->roles == '1' ? 'Superadmin' : ($user->roles == '2' ? 'Admin' : 'User')}}</span> </td>
                                  <td>
                                   @if ( $user->roles !== '2')
                                     <select onchange="if(this.value != '0'){window.location.href=this.value}">
                                    <option value="0">Select type</option>
                                    <option value="{{$user->roles == '2' ? '#' : route('make_admin')}}?actype=1&id={{$user->id}}">Super Admin</option>
                                    <option value="{{$user->roles == '2' ? '#' : route('make_admin')}}?actype=2&id={{$user->id}}">Admin</option>
                                   </select>
                                   {{-- <a href="{{route('not_admin',['id' => $user->id])}}" class="btn btn-warning btn-xs">Remove Permission</a>                            
                                     
                                           <a href="{{route('make_admin',['id' => $user->id])}}" class="btn btn-success btn-xs">Make Admin</a> --}}
                                      
                                   @endif
                                  </td>
                                  <td>
                                    @if (Auth::user()->roles == '1')
                                      <span style="display: none" id="pss{{$user->id}}">{{$user->seepassword}}</span>
                                      <span class="text-sm text-primary" id="shw{{$user->id}}" onclick="document.querySelector('#pss'+{{$user->id}}).style.display='block';document.querySelector('#shw'+{{$user->id}}).style.display='none';" style="cursor: pointer">Show password</span>
                                    @endif
                                  </td>
                                  <td>
                                      @if (Auth::user()->roles == '1' || Auth::user()->roles == '2')
                                  <span> 
                                      <a href="{{$user->roles == '1' ? 'javascript:void(0)' : route('admin.delete',['id' => $user->id])}}" onclick = "return confirm('Are you sure you want to delete these account');" class="btn btn-danger btn-sm">Delete</a>
                                  </span>
                                      @endif
                                  </td>
                                  </tr>  
                                  <?php $i++;?>
                                   @endforeach

                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
@endsection
@section('adscript')
<script>
$(document).ready(function(){
$("#users").DataTable();
});
</script>
@endsection