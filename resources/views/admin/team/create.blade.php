@extends('layouts.app')
@section('title')
Create Team
@endsection
@section('pagetitle')
Create Team
@endsection
@section('adcontent')
<div class="row">
            <div class="card mb-4 mt-4">
            <div class="card-header">Create New   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('team.index')}}" class="btn btn-outline-info btn-sm float-end">Back</a></div>
                            <div class="card-body">
                                  @include('includes.errors')
                               <div class="row justify-content-center">
                                  
                               <form action="{{route('team.store')}}" method="post" enctype="multipart/form-data" onsubmit="thisform(this)">
                                @csrf
                                        <div class="form-group mb-3">
                                            <label>Name</label>
                                        <input type="text" name="name" class="form-control border px-2" placeholder="Enter  Name" required id=""value="{{old('name')}}">
                                        </div>

                                         <div class="from-group mb-3">
                                             <label>Position</label>
                                            <input type="text" name="position" id="position" placeholder="Enter Position" class="form-control border px-2" value="{{old('position')}}">
                                         </div> 

                                         <div class="form-group mb-3">
                                            <label>Select Image</label>
                                             <input type="file" name="file" class="form-control border px-3" id="" accept=".jpg,.jpeg,.png">
                                         </div>
                                       
                                         <div class="form-group">
                                             <button type="submit" id="btn" class="btn btn-primary">Create</button>
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
