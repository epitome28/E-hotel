@extends('layouts.app')
@section('title')
    Gallery
@endsection
@section('pagetitle')
    Gallery
@endsection
@section('adcontent')
<div class="row">
 <div class="card">
    <div class="card-header">Gallery   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-outline-info float-end" onclick="opengallery()">Add New</button></div>
        <div class="card-body">
              @include('includes.errors')
      <div class="table-responsive">
        <table class="table table-striped table-sm" id="whtwedo">
          <thead>
            <tr>
              <th>image</th>
              <th>Caption</th>
              
              <th></th>
            </tr>
          </thead>
          <tbody>
             
            @foreach ($galleries as $item)
                <tr>
                <td><img src="{{asset($item->imagefile)}}" width="60px" height="60px" alt=""></td>
                <td>{{$item->caption}}</td>
               
              <td>
                <a class="btn btn-info btn-sm" href="{{route('gallery.edit',['id' => $item->id])}}" title="edit gallery">Edit</a>
                <a class="btn btn-danger btn-sm" href="{{route('gallery.delete',['id' => $item->id])}}" onclick="return confirm('Are you sure you want to delete this Record')" title="delete news">Delete</a>
              </td>
            </tr>
            @endforeach          
          </tbody>
        </table>
           
      </div>
       </div>
     </div>
  </div>
@endsection
 <div class="modal fade" id="watwe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close text-dark font-wieght-bold fs-3" data-bs-dismiss="modal" aria-label="Close">&times;</button>
      </div>
      <div class="modal-body">
        <form action="{{route('newgallery')}}" method="post" enctype="multipart/form-data" onsubmit="thisform(this)">
                @csrf
                                
                <div class="form-group">
                <input type="text" name="caption" id="password" class="form-control border px-3 my-3" placeholder="Enter Caption" required autofocus value="{{old('caption')}}">
                
                    </div> 
                    <div class="form-group">
                      <input type="file" name="imagefile[]" id="" class="form-control border px-2 my-3" required accept=".jpg,.jpeg,.png" multiple>
                    </div>
                   
                                         
      </div>
      <div class="modal-footer">   
        <button type="submit" id="btn" class="btn btn-success">Save</button>
      </div>
        </form>
    </div>
  </div>
</div>
@section('adscript')
    <script>
    $(document).ready(function(){
       $("#whtwedo").DataTable();
    });
    
      CKEDITOR.replace('body');
    
</script>
<script>
  function opengallery(){
   $('#watwe').modal('show');
  }
</script>
@endsection