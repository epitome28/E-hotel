@extends('layouts.app')
@section('title')
Edit Team
@endsection
@section('pagetitle')
Edit Team
@endsection

@section('adcontent')
<div class="row">
            <div class="card">
            <div class="card-header">Edit Team   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('team.index')}}" class="btn btn-outline-info btn-sm float-end">Back</a></div>
                            <div class="card-body">
                                   @include('includes.errors')
                               <div class="row justify-content-center">
                                 
                               <form action="{{route('team.update',['id' => $edt->id])}}" method="post" enctype="multipart/form-data" onsubmit="thisform(this)">
                                @csrf
                                        <div class="form-group mb-3">
                                            <label>Name</label>
                                        <input type="text" name="name" class="form-control border px-2" placeholder="Enter Name" required value="{{$edt->name}}">
                                         </div>

                                         
                                         <div class="from-group mb-3">
                                            <label for="destails">Position</label>
                                           <input type="text" name="position" id="position" placeholder="Enter Position" class="form-control border px-2" value="{{$edt->position}}">
                                        </div> 
                                         <div class="form-group mb-3">
                                            <label>Select Image</label><br>
                                            <img src="{{asset($edt->image)}}" width="80" height="80" alt="">
                                             <input type="file" name="file" class="form-control border px-3" id="" accept=".jpg,.jpeg,.png">
                                         </div>
                                       
                                         <div class="form-group">
                                             <button type="submit" id="btn" class="btn btn-primary">Update</button>
                                         </div>
                                </form>
                               </div>
                            </div>
                        </div>
                        </div>
@endsection
@section('adscript')
    <script>
         CKEDITOR.replace('details');
</script>
@endsection
