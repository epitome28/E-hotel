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
      <div class="card-header">Edit Gallery</div>
      <div class="card-body">
        @include('includes.errors')
        <form action="{{route('gallery.update',['id' => $edt->id])}}" method="post" enctype="multipart/form-data" onsubmit="thisform(this)">
              @csrf
                              
              <div class="form-group mb-3 col-md-5">
              <input type="text" name="caption" id="password" class="form-control border px-2 col-md-5" placeholder="Enter Caption" required autofocus value="{{$edt->caption}}">
              
                  </div> 
                  <div class="form-group mb-3 col-md-5">
                  <img src="{{asset($edt->imagefile)}}" width="60px" height="60px" class="img-fluid mb-3" alt="">
                    <input type="file" name="imagefile" id="" class="form-control border px-2 col-md-5" accept=".jpg,.jpeg,.png">
                  </div>
                  
                
     <div class="form-group"> 
       <button type="submit" class="btn btn-success" id="btn">Update</button>
  </div>
      </form>
      </div>
     </div>
 </div>
@endsection
